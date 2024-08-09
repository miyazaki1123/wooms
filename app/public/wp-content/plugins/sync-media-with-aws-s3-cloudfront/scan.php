<?php

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Aws\S3\Transfer;
use \Aws\Command;
use Aws\Exception\AwsException;
use Aws\CloudFront\CloudFrontClient;
use MediaCloud\Vendor\Google\Cloud\Storage\Bucket;

class Load_files_to_smwas3c
{

    public $path;
    public $upload_path;
    public $options;
    public $photos_names;
    public $response_message = [
        'bucketname' => 'Enter bucket name',
        'access_key' => 'Enter access key',
        'secret_key' => 'Enter secret key',
        'end_points' => 'Choose location',
        'directories' => 'Choose directories',
        'file_types' => 'Choose file types'
    ];
    public $counter_files = 0;

    function __construct()
    {
        require 'aws/aws-autoloader.php';
        $this->upload_path = wp_upload_dir()['basedir'];
        $this->path = str_replace(ABSPATH, '../', $this->upload_path);
        $this->options = $this->get_data();
    }

    function get_data()
    {
        global $wpdb;
        $table = $wpdb->prefix . 's3_sync_smwas3c';
        if ($options = $wpdb->get_row("SELECT * FROM $table WHERE id=1", ARRAY_A)) {
            return $options;
        }
    }

    function higher_level_directories()
    {
        foreach (json_decode($this->options['directories']) as $dir) {
            $this->inner_level_directories($dir);
        }
        return $this->counter_files;
    }

    function inner_level_directories($dir)
    {
        $general_path = $this->path . '/' . $dir;
        if (is_dir($general_path)) {
            $count_directories = scandir($general_path);
            foreach ($count_directories as $item) {
                if ($item == '.' || $item == '..') {
                    continue;
                }
                if (is_file("$general_path/$item") && $this->check_file_type($item)) {
                    $this->counter_files++;
                    $this->photos_names[] = "$this->path/$dir/$item";
                } else $this->inner_level_directories("$dir/$item");
            }
        }
    }

    function check_file_type($file)
    {
        $compare_arr = json_decode($this->options['file_types']);
        if (in_array('image', $compare_arr)) {
            $types = ['gif', 'png', 'jpg', 'jpeg', 'svg', 'webp'];
        }
        if (in_array('css', $compare_arr)) {
            $types[] = 'css';
        }
        if (in_array('js', $compare_arr)) {
            $types[] = 'js';
        }
        $file_end = explode('.', $file);
        $file_type = end($file_end);
        if (in_array($file_type, $types)) {
            return true;
        } else {
            return false;
        }
    }

    function check_input_info()
    {
        foreach ($this->response_message as $key => $value) {
            if (!(isset($this->options[$key]) && trim($this->options[$key]) && $this->options[$key] != 'null')) {
                echo _(json_encode(['status' => false, 'errors' => ['message' => $value]]));
                exit;
            }
        }
    }

    function check_location()
    {
        try {
            $client = new \Aws\S3\S3Client([
                'region'  => 'us-west-2',
                'version' => '2006-03-01',
                'credentials' => [
                    'key' => $this->options['access_key'],
                    'secret' => $this->options['secret_key']
                ]
            ]);
        } catch (S3Exception $e) {
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            exit;
        }
        try {
            $result = $client->getBucketLocation([
                'Bucket' => $this->options['bucketname'],
            ]);
        } catch (S3Exception $e) {
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            exit;
        }
        if ($result['LocationConstraint'] != $this->options['end_points']) {
            echo _(json_encode(['status' => false, 'errors' => ['message' => 'Wrong location']]));
            exit;
        };
    }

    function load_files($file, $launch_invalidation)
    {
        try {
            $client = new \Aws\S3\S3Client([
                'region'  => $this->options['end_points'],
                'version' => '2006-03-01',
                'credentials' => [
                    'key' => $this->options['access_key'],
                    'secret' => $this->options['secret_key']
                ]
            ]);
        } catch (S3Exception $e) {
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            exit;
        }
        $item = sanitize_text_field($file);
        $launch_invalidation = sanitize_text_field($launch_invalidation);
        $base_dir = explode('/', $item);
        array_pop($base_dir);
        $base_dir = implode('/', $base_dir);
        $options = [
            "base_dir" => "$base_dir/",
            'before' => function (\Aws\Command $command) {
                if (in_array($command->getName(), ['PutObject', 'CreateMultipartUpload'])) {
                    $command['CacheControl'] = 'max-age=31536000';
                    $command['ACL'] = 'public-read';
                }
            }
        ];

        $source = new ArrayIterator(["$item"]);
        $dest = "s3://{$this->options['bucketname']}/$base_dir/";
        $manager = new \Aws\S3\Transfer($client, $source, $dest, $options);
        $manager->transfer();
        $return_path = ltrim($item, '/.');
        global $wpdb;
        $table = $wpdb->prefix . 's3_sync_smwas3c';
        $sql = "SELECT access_key, secret_key, end_points, cloudfront_id, cloudfront FROM $table WHERE id=1";
        $options_for_invalidation = $wpdb->get_row($sql, ARRAY_A);
        if ( !$options_for_invalidation['cloudfront']) {
            return json_encode(['status' => true, 'current' => $return_path]);
        } else {

            
                if ($launch_invalidation == 'true' && $options_for_invalidation['cloudfront']) {
                    $invalidation_id = $this->create_new_invalidation();
                    $cloudfront = true;
                    return json_encode(['status' => true, 'current' => $return_path, 'is_invalidation_id' => $cloudfront, 'invalidation_id' => $invalidation_id]);
                } else {
                    return json_encode(['status' => true, 'current' => $return_path]);
                }
            
        }
    }

    function create_new_invalidation()
    {
        $upload_path = wp_upload_dir()['basedir'];
        $path = str_replace(ABSPATH, '/', $upload_path);
        $client = new \Aws\CloudFront\CloudFrontClient([
            'region'  => $this->options['end_points'],
            'version' => '2019-03-26',
            'credentials' => [
                'key' => $this->options['access_key'],
                'secret' => $this->options['secret_key']
            ]
        ]);
        try {
            $result = $client->createInvalidation([
                'DistributionId' => $this->options['cloudfront_id'], // REQUIRED
                'InvalidationBatch' => [ // REQUIRED
                    'CallerReference' => time(), // REQUIRED
                    'Paths' => [ // REQUIRED
                        'Items' => [$path . '/*'], //['<string>', ...],
                        'Quantity' => 1 //<integer>, // REQUIRED
                    ],
                ],
            ]);
            return $result['Invalidation']['Id'];
        } catch (AwsException $e) {
            // output error message if fails
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            return;
        }
    }

    function get_all_object(){
        try {
            $client = new \Aws\S3\S3Client([
                'region'  => $this->options['end_points'],
                'version' => '2006-03-01',
                'credentials' => [
                    'key' => $this->options['access_key'],
                    'secret' => $this->options['secret_key']
                ]
            ]);
        } catch (S3Exception $e) {
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            exit;
        }

        try {
            $result = $client->listObjectsV2(['Bucket' => $this->options['bucketname']]);
            $array_object = $result->get('Contents');
           
            //дописати check file types
            if ($array_object != null) {
                for ($i=0; $i < count($array_object); $i++) { 
                    $array_object[$i] = '../'.$array_object[$i]['Key'];
                }
               
                $this->higher_level_directories();//update array
                $diff_object = array_diff($this->photos_names,$array_object);   
                $diff_object =array_values($diff_object);
    
                exit(json_encode(['status' => true, 'count' => count($diff_object), 'names' => $diff_object]));
            }else{
                exit(json_encode(['status' => true, 'count' => $this->higher_level_directories(), 'names' => $this->photos_names]));
            }

            

        } catch (S3Exception $e) {
            exit(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
        }
        // $result = $client->listObjectsV2(['Bucket' => $this->options['bucketname']]);
        // var_dump($result->get('Contents'));
        // exit();
    }

    function clear_bucket(){
        try {
            $client = new \Aws\S3\S3Client([
                'region'  => $this->options['end_points'],
                'version' => '2006-03-01',
                'credentials' => [
                    'key' => $this->options['access_key'],
                    'secret' => $this->options['secret_key']
                ]
            ]);
        } catch (S3Exception $e) {
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            
        }
        try{

            $keys = $client->listObjectsV2(['Bucket' => $this->options['bucketname']]);
            foreach ($keys['Contents'] as $key) {
                $client->deleteObjects([
                    'Bucket'  => $this->options['bucketname'],
                    'Delete' => [
                        'Objects' => [
                            [
                                'Key' => $key['Key']
                            ]
                        ]
                    ]
                ]);
            }
            // $listObjectsParams = ['Bucket' => $this->options['bucketname'], 'Prefix' => 'wp-content/'];
            // $delete = Aws\S3\BatchDelete::fromListObjects($client, $listObjectsParams);
            // $delete->promise();
            echo _(json_encode(['status' => true, 'message' => 'Bucket cleared']));
            exit;
        }catch(S3Exception $e){
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            exit;
        }
 
    }
}
