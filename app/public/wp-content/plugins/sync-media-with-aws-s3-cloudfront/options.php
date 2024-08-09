<?php

use Aws\CloudFront\CloudFrontClient;
use Aws\Exception\AwsException;

class Set_configuration_smwas3c
{

    public $options = array();
    // $set_configure->options[] = sanitize_text_field($_POST['bucketname']); 0
    // $set_configure->options[] = sanitize_text_field($_POST['access_key']); 1
    // $set_configure->options[] = sanitize_text_field($_POST['secret_key']); 2
    // $set_configure->options[] = sanitize_text_field($_POST['end_points']); 3
    // $set_configure->options[] = sanitize_text_field($_POST['cloudfront']); 4
    // $set_configure->options[] = sanitize_text_field($_POST['cloudfront_id']); 5
    // $set_configure->options[] = sanitize_text_field(json_encode($_POST['directories'])); 6
    // $set_configure->options[] = sanitize_text_field(json_encode($_POST['file_types'])); 7


    function __construct()
    {
        require 'aws/aws-autoloader.php';
    }

    function update_table()
    {
        global $wpdb;
        $table = $wpdb->prefix . 's3_sync_smwas3c';
        $sql = "SELECT * FROM $table WHERE id=1";
        if (!$wpdb->query($sql)) {
            array_unshift($this->options, 1);
            $sql = "INSERT INTO  $table (id, bucketname, access_key, secret_key, end_points, cloudfront, cloudfront_id, directories, file_types) VALUES (%d, %s, %s, %s, %s, %d, %s, %s, %s)";
            return $wpdb->query(
                $wpdb->prepare($sql, $this->options)
            );
        } else {
            $sql = "UPDATE $table SET bucketname=%s, access_key=%s, secret_key=%s, end_points=%s, cloudfront=%d, cloudfront_id=%s, directories=%s, file_types=%s WHERE id=1";
            return $wpdb->query(
                $wpdb->prepare($sql, $this->options)
            );
        }
    }

    function get_cloudfront_domain()
    {
        try {
            $client = new \Aws\CloudFront\CloudFrontClient([
                'region'  => $this->options[3],
                'version' => '2019-03-26',
                'credentials' => [
                    'key' => $this->options[1],
                    'secret' => $this->options[2]
                ]
            ]);
        } catch (AwsException $e) {
            // output error message if fails
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorMessage()]]));
            // echo "\n";
            exit;
        }

        try {
            $list_distribution = $client->getDistribution([
                'Id' => $this->options[5], // REQUIRED
            ]);
            return $list_distribution['Distribution']['DomainName'];
        } catch (AwsException $e) {
            // output error message if fails
            echo _(json_encode(['cloudfront' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            exit;
        }
    }

    function set_cloudfront_domain()
    {
        global $wpdb;
        $table = $wpdb->prefix . 's3_sync_smwas3c';
        $cloudfront_domain = $this->get_cloudfront_domain();
        $sql = "UPDATE $table SET cloudfront_domain=%s WHERE id=1";
        $arr = [$cloudfront_domain];
        $wpdb->query(
            $wpdb->prepare($sql, $arr)
        );
    }
}