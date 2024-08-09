<?php
class Render_main_page_smwas3c
{

    public $path;
    public $upload_path;
    public $directories;
    public $display_options;
    public $file_types = ['image', 'css', 'js'];
    public $end_points = [
        'us-east-2' => 'US East (Ohio)',
        'us-east-1' => 'US East (N. Virginia)',
        'us-west-1' => 'US West (N. California)',
        'us-west-2' => 'US West (Oregon)',
        'ap-east-1' => 'Asia Pacific (Hong Kong)',
        'ap-south-1' => 'Asia Pacific (Mumbai)',
        'ap-northeast-3' => 'Asia Pacific (Osaka-Local)',
        'ap-northeast-2' => 'Asia Pacific (Seoul)',
        'ap-southeast-1' => 'Asia Pacific (Singapore)',
        'ap-southeast-2' => 'Asia Pacific (Sydney)',
        'ap-northeast-1' => 'Asia Pacific (Tokyo)',
        'ca-central-1' => 'Canada (Central)',
        'eu-central-1' => 'Europe (Frankfurt)',
        'eu-west-1' => 'Europe (Ireland)',
        'eu-west-2' => 'Europe (London)',
        'eu-west-3' => 'Europe (Paris)',
        'eu-north-1' => 'Europe (Stockholm)',
        'me-south-1' => 'Middle East (Bahrain)',
        'sa-east-1' => 'South America (São Paulo)'
    ];

    function __construct()
    {
        $this->upload_path = wp_upload_dir()['basedir'];
        $this->path = str_replace(ABSPATH, '../', $this->upload_path);
        $this->directories = $this->find_directories();
        $this->display_options = $this->set_data();
    }

    function set_data()
    {
        global $wpdb;
        $table = $wpdb->prefix . 's3_sync_smwas3c';
        return $wpdb->get_row("SELECT * FROM $table WHERE id=1", ARRAY_A);
    }

    function is_option_select($item, $arr)
    {
        if (!isset($arr)) return;
        $selected_values = json_decode($arr);
        if (isset($selected_values) && is_array($selected_values)) {
            if (in_array($item, $selected_values)) {
                return 'selected';
            }
        }
    }

    function find_directories()
    {
        $result[] = '.';
        $dir = scandir($this->path);
        $skip = ['.', '..'];
        foreach ($dir as $directory) {
            if (!in_array($directory, $skip)) {
                if (is_dir("$this->path/$directory")) {
                    $result[] = $directory;
                }
            }
        }
        //error_log(print_r($result,true));
        return $result;
    }
}
$render_smwas3c = new Render_main_page_smwas3c();

if (isset($_GET['tab'])) {
    $active_tab_smwas3c = $get_tab_smwas3c = sanitize_text_field($_GET['tab']);
}
$active_tab_smwas3c = isset($get_tab_smwas3c) ? $get_tab_smwas3c : 'options_s3';
?>


<div class="wpbody-content">
    <div class="wrap ">

        <h2 class="nav-tab-wrapper">
            <a href="?page=sync-media-with-aws-s3-cloudfront/templates/main_page_s3.php&tab=general_s3" class="nav-tab <?php echo
                                                                                                            $active_tab_smwas3c == 'general_s3' ? 'nav-active-tab' : '' ?>">General</a>
            <a href="?page=sync-media-with-aws-s3-cloudfront/templates/main_page_s3.php&tab=options_s3" class="nav-tab <?php echo
                                                                                                            $active_tab_smwas3c == 'options_s3' ? 'nav-active-tab' : '' ?>">Configuration</a>
        </h2>
        <?php
        if ($active_tab_smwas3c == 'general_s3') :
        ?>
            <h1>Sync media with AWS S3 CloudFront</h1>
            <div id="invalidation_id_smwas3c"></div>
            <p class="submit">
                <input type="submit" name="submit" id="submit_for_s3_general" class="button button-primary" value="Upload files to S3">
                <input type="submit" name="submit" id="submit_for_s3_diff" class="button button-primary" value="Upload new added images">
                <input type="submit" name="submit" id="submit_for_s3_delete" class="button button-primary" value="Clear bucket">
                <div id="waiting_loader_outer_s3">
                    <div id="waiting_loader_inner_s3"></div>
                </div>
            </p>

            <p id="message_no_keys_s3"></p>
            <p><b id="legend_to_loader"> </b></p>
            <div class="loader_outer" id="loader_outer">
                <div id="loader_inner"></div>
            </div>
            <textarea id="photo_names_loading_s3" rows="10" col="50"></textarea>

        <?php else : ?>
            <h1>Sync media with AWS S3 CloudFront</h1>
            <?php /*  print_r(ABSPATH);
            echo '<br>';
            print_r('/');
            echo '<br>';
            print_r(wp_upload_dir()['basedir']);
            exit; */ ?>
            <form action="?page=S3_Sync/options.php" method="POST" id="form_options_s3" autocomplete="off">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row">Bucket name:</th>
                            <td>
                                <input type="text" class="regular-text" name="bucketname" value="<?php echo isset($render_smwas3c->display_options['bucketname']) ? $render_smwas3c->display_options['bucketname'] : ''; ?>" placeholder="Enter bucket name">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Access key:</th>
                            <td>
                                <input type="text" class="regular-text" name="access_key" value="<?php echo isset($render_smwas3c->display_options['access_key']) ? $render_smwas3c->display_options['access_key'] : ''; ?>" placeholder="Enter access_key">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Secret key:</th>
                            <td>
                                <input type="password" class="regular-text" name="secret_key" value="<?php echo isset($render_smwas3c->display_options['secret_key']) ? $render_smwas3c->display_options['secret_key'] : ''; ?>" placeholder="Enter secret_key">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Location:</th>
                            <td>
                                <select name="end_points" id="end_points">
                                    <?php
                                    foreach ($render_smwas3c->end_points as $point => $full_point) : ?>
                                        <option value="<?php echo $point; ?>" <?php if (isset($render_smwas3c->display_options['end_points']) && $render_smwas3c->display_options['end_points'] == $point) echo 'selected'; ?>><?php echo $full_point; ?> </option>';
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="cloudfront">Use Cloudfront:</label>
                            </th>
                            <td>
                                <input type="radio" name="cloudfront" value="1" <?php if (isset($render_smwas3c->display_options['cloudfront']) && $render_smwas3c->display_options['cloudfront'] == 1) echo 'checked' ?>>Yes
                                <input type="radio" name="cloudfront" value="0" <?php if (isset($render_smwas3c->display_options['cloudfront']) && $render_smwas3c->display_options['cloudfront'] == 0) echo 'checked' ?>>No
                            </td>
                        </tr>
                        <tr id="cloudfront_hide">
                            <th scope="row">Cloudfront ID:</th>
                            <td>
                                <input type="text" class="regular-text" name="cloudfront_id" value="<?php echo isset($render_smwas3c->display_options['cloudfront_id']) ? $render_smwas3c->display_options['cloudfront_id'] : ''; ?>" placeholder="Enter cloudfront ID">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="directories">Included directories:</label>
                            </th>
                            <td>
                                <select name="directories[]" id="directories" size="6" multiple>
                                    <?php foreach ($render_smwas3c->directories as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo $render_smwas3c->is_option_select($option, isset($render_smwas3c->display_options['directories']) ? $render_smwas3c->display_options['directories'] : '' ); ?>><?php echo str_replace('../', '', $render_smwas3c->path).'/'.$option ?>/</option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr hidden="true">
                            <th scope="row">
                                <label for="file_types">File types:</label>
                            </th>
                            <td>
                                <select name="file_types[]" id="file_types" multiple>
                                    <?php foreach ($render_smwas3c->file_types as $type) : ?>
                                        <option value="<?php echo $type; ?>" <?php echo $render_smwas3c->is_option_select($type, isset($render_smwas3c->display_options['file_types']) ? $render_smwas3c->display_options['file_types'] : ''); ?>><?php echo $type; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div id="waiting_loader_outer_s3" style="margin-bottom:10px">
                    <div id="waiting_loader_inner_s3"></div>
                </div>
                <p id="message_bucket_keys_s3"></p>
                <button id="check_keys_for_s3_bucket" type="button" class="button button-primary">Test link to AWS</button>
                <p id="save_options_s3"><b>Save success</b></p>
                <p class="submit">
                    <input type="button" name="submit" id="submit_options_s3" class="button button-primary" value="Save changes">
                </p>
            </form>
    </div>

<?php endif; ?>
</div>