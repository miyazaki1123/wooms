<?php

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\CloudFront\CloudFrontClient;

class Test_links_smwas3c
{

    public $bucketname;
    public $end_points;
    public $access_key;
    public $secret_key;
    public $cloudfront_id;
    public $cloudfront;

    function __construct() {
        require 'aws/aws-autoloader.php';
    }

    function test_keys_and_bucket()
    {
        try {
            $client = new \Aws\S3\S3Client([
                'region'  => $this->end_points,
                'version' => '2006-03-01',
                'credentials' => [
                    'key' => $this->access_key,
                    'secret' => $this->secret_key
                ]
            ]);
            
        } catch (S3Exception $e) {
            //Exception ocurred, 
            //"SignatureDoesNotMatch" for bad secret access key
            //"InvalidAccessKeyId" for invalid access key id
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            return;
            // echo json_encode($e->getAwsErrorCode());
        }
        
        //Go through every bucket
        try {
            
            $buckets = $client->listBuckets([]);
            foreach ($buckets['Buckets'] as $key => $obj) {
                //Check if the bucket I'm going to use exists
                if ($buckets['Buckets'][$key]['Name'] === $this->bucketname) {
                    //If exists, return true, everything is fine
                    if (!$this->cloudfront) { 
                        echo _(json_encode(['status' => true, 'errors' => ['message' => 'Access key and secret key are valid for accessing bucket']]));
                        return;
                    }
                    return;
                }
            } 
            //Bucket doesn't exists but access key id and secret are correct.
            echo _(json_encode(['status' => false, 'errors' => ['message' => 'Bucket doesn\'t exists']]));
            exit;
        } catch (S3Exception $e) {
            //Exception ocurred, 
            //"SignatureDoesNotMatch" for bad secret access key
            //"InvalidAccessKeyId" for invalid access key id
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            exit;
        }
    }

    function check_domain_cloudfront()
    {
        try {
            $client = new \Aws\CloudFront\CloudFrontClient([
                'region'  => $this->end_points,
                'version' => '2019-03-26',
                'credentials' => [
                    'key' => $this->access_key,
                    'secret' => $this->secret_key
                ]
            ]);
        } catch (AwsException $e) {
            // output error message if fails
            echo _(json_encode(['status' => false, 'errors' => ['message' => $e->getAwsErrorCode()]]));
            exit;
        }
        try {
            $domain_name = $client->getDistribution([
                'Id' => $this->cloudfront_id, // REQUIRED
            ]);
            echo _(json_encode(['status' => true, 'errors' => ['message' => 'Access key and secret key are valid for accessing bucket, CloudfrontID is valid']]));
            return;
        } catch (AwsException $e) {
            // output error message if fails
            echo _(json_encode(['status' => false, 'errors' =>['message' => $e->getAwsErrorCode()]]));
            exit;
        }
    }
}