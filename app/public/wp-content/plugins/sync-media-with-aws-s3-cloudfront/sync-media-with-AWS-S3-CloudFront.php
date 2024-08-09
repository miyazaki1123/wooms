<?php
/*
    Plugin Name: Sync media with AWS S3 CloudFront
    Plugin URI: https://softsprint.net/sync-media-with-aws-s3-cloudfront/
    Description: Plugin uploads the files from WordPress media upload directory to AWS S3 bucket and replaces their initial URLs with the new URLs of AWS S3 bucket (changes src attribute)
    Author: SoftSprint
    Version: 1.0.5
    Author URI: https://softsprint.net/
*/
register_activation_hook(__FILE__, array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'create_save_options_file'));
add_action('admin_menu', array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'add_item_menu'));
add_action('admin_enqueue_scripts', array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'link_scripts_styles'));
global $wpdb;
if (!is_admin()) {
    $table = $wpdb->prefix . 's3_sync_smwas3c';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
        return false;
    }

    $check_cloud = $wpdb->get_row("SELECT cloudfront FROM $table WHERE id=1", ARRAY_A);
    if (isset($check_cloud['cloudfront']) && $check_cloud['cloudfront'] == 1) {
        add_filter('pre_option_upload_url_path', array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'change_featured_img_url'));
    }elseif (isset($check_cloud['cloudfront']) && $check_cloud['cloudfront'] == 0){
        add_filter('pre_option_upload_url_path', array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'change_featured_img_url_no_cloudfront'));
    }
}

class Sync_media_with_AWS_S3_CloudFront_smwas3c
{

    static function create_save_options_file()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 's3_sync_smwas3c';
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            $sql = "CREATE TABLE `$table_name` (
                            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            bucketname VARCHAR(255) DEFAULT NULL,
                            access_key VARCHAR(255) DEFAULT NULL,
                            secret_key VARCHAR(255) DEFAULT NULL,
                            end_points VARCHAR(32) DEFAULT NULL,
                            cloudfront TINYINT(1)  DEFAULT 0,
                            cloudfront_id VARCHAR(255) DEFAULT NULL,
                            cloudfront_domain VARCHAR(255) DEFAULT NULL,
                            directories TEXT DEFAULT NULL,
                            file_types  TEXT DEFAULT NULL
                              )";
            $wpdb->query($sql);
        }
        $option_table = $wpdb->prefix . 'options';
        $relative_path = str_replace(ABSPATH, '/', wp_upload_dir()['basedir']);
        $path_array = ['option_smwas3c', $relative_path];
        $sql_check = "SELECT `option_value` FROM $option_table WHERE `option_name` LIKE 'option_smwas3c'";

        if (!$wpdb->query($sql_check)) {
        $sql = "INSERT INTO $option_table (option_name, option_value) VALUES (%s, %s)";
             $wpdb->query(
                $wpdb->prepare($sql, $path_array)
            );
        } else {
            $update_arr = [$relative_path];
            $sql = "UPDATE $option_table SET option_value=%s WHERE 'option_name' LIKE 'option_smwas3c'";
            return $wpdb->query(
                $wpdb->prepare($sql, $update_arr)
            );
        }
    }
    static function add_item_menu()
    {
        add_submenu_page('tools.php', 'AWS_S3_Sync', 'AWS S3 Sync', 'manage_options', basename(dirname(__FILE__)) . '/templates/main_page_s3.php');
    }
    static function link_scripts_styles()
    {
        wp_enqueue_script('script_smwas3c', plugin_dir_url(__FILE__) . 'assets/script_smwas3c.js?v1.0.0.6.0', array('jquery'), NULL, true);
        wp_enqueue_style('style_smwas3c', plugin_dir_url(__FILE__) . 'assets/style_smwas3c.css', [], '?v1.0.2');
    }
    static function change_featured_img_url($arg)
    {
        global $wpdb;
        $table = $wpdb->prefix . 's3_sync_smwas3c';
        $path = $wpdb->get_row("SELECT cloudfront_domain FROM $table WHERE id=1", ARRAY_A);//hardcoce cloudfront
        $upload_table = $wpdb->prefix . 'options';
        $relative_path = $wpdb->get_row("SELECT `option_value` FROM $upload_table WHERE `option_name` LIKE 'option_smwas3c'", ARRAY_A);
        return 'https://' . $path['cloudfront_domain']. $relative_path['option_value'];
    }
    static function change_featured_img_url_no_cloudfront($arg)
    {
        //error_log('tt'.var_export($arg,true));

        global $wpdb;
        $table = $wpdb->prefix . 's3_sync_smwas3c';
        $path = $wpdb->get_row("SELECT bucketname, end_points FROM $table WHERE id=1", ARRAY_A);
        $upload_table = $wpdb->prefix . 'options';
        $relative_path = $wpdb->get_row("SELECT `option_value` FROM $upload_table WHERE `option_name` LIKE 'option_smwas3c'", ARRAY_A);
       
        return 'https://' . $path['bucketname'].'.s3.'.$path['end_points'].'.amazonaws.com'.$relative_path['option_value'];
    }

    static function test_link()
    {
        require_once('test_link.php');
        $test_link = new Test_links_smwas3c();
        $test_link->bucketname = sanitize_text_field($_POST['name']);
        $test_link->end_points = sanitize_text_field($_POST['end_points']);
        $test_link->access_key = sanitize_text_field($_POST['access_key']);
        $test_link->secret_key = sanitize_text_field($_POST['secret_key']);
        $test_link->cloudfront = sanitize_text_field($_POST['cloudfront']);
        if ($test_link->cloudfront) {
            $test_link->cloudfront_id = sanitize_text_field($_POST['cloudfront_id']);
        }

        $test_link->test_keys_and_bucket();
        if ($test_link->cloudfront) {
            $test_link->check_domain_cloudfront();
        }
        wp_die();
    }

    static function save_configuration()
    {
        require_once(__DIR__.'/options.php');
        
        $set_configure = new Set_configuration_smwas3c();
        $set_configure->options[] = sanitize_text_field($_POST['bucketname']);
        $set_configure->options[] = sanitize_text_field($_POST['access_key']);
        $set_configure->options[] = sanitize_text_field($_POST['secret_key']);
        $set_configure->options[] = sanitize_text_field($_POST['end_points']);
        $set_configure->options[] = sanitize_text_field($_POST['cloudfront']);
        $set_configure->options[] = sanitize_text_field($_POST['cloudfront_id']);
        $set_configure->options[] = sanitize_text_field(json_encode($_POST['directories']));
        $set_configure->options[] = sanitize_text_field(json_encode($_POST['file_types']));

        if (!empty($set_configure->options[4])) {
            $set_configure->set_cloudfront_domain();
        }

        if (!($set_configure->update_table() === false)) {
            echo json_encode(['status' => true, 'errors' => ['message' => null]]);
        } else {
            echo json_encode(['status' => false, 'errors' => ['message' => 'can\'t save data. Data base error']]);
        }
        wp_die();
    }

    static function choose_files()
    {
        require_once('scan.php');
        $load_files = new Load_files_to_smwas3c();
        $load_files->check_input_info();
        $load_files->check_location();

        $first_result = $load_files->higher_level_directories();
        if ($first_result == 0) {
            echo json_encode(['status' => false, 'errors' => ['message' => 'Files of this type not found']]);
        } else {
            echo json_encode(['status' => true, 'count' => $first_result, 'names' => $load_files->photos_names]);
        };
        wp_die();
    }

    static function load_files()
    {
        require_once('scan.php');
        $load_files = new Load_files_to_smwas3c();
        echo $load_files->load_files(sanitize_text_field($_POST['item']), sanitize_text_field($_POST['launch_invalidation']));
        wp_die();
    }

    static function get_diff_files()
    {
        require_once('scan.php');
        $get_files = new Load_files_to_smwas3c();
        echo $get_files->get_all_object();
        wp_die();
        //error_log("get diff ajax work");
    }
    static function clear_bucket(){
        require_once('scan.php');
        $result = new Load_files_to_smwas3c();
        echo $result->clear_bucket();
        wp_die();
    }
}


add_action('wp_ajax_test_smwas3c', array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'test_link'));
add_action('wp_ajax_save_configuration_smwas3c', array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'save_configuration'));
add_action('wp_ajax_choose_files_smwas3c', array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'choose_files'));
add_action('wp_ajax_load_files_smwas3c', array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'load_files'));
add_action('wp_ajax_get_diff_files_smwas3c',array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'get_diff_files'));
add_action('wp_ajax_clear_bucket_smwas3c',array('Sync_media_with_AWS_S3_CloudFront_smwas3c', 'clear_bucket'));
