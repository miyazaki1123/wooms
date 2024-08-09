<?php
if( ! defined('WP_UNINSTALL_PLUGIN') )
	exit;
// проверка пройдена успешно. Начиная отсюда удаляем опции и все остальное.
delete_option_smwas3c();
function delete_option_smwas3c() {
    global $wpdb;
	
    $table = $wpdb->prefix . 's3_sync_smwas3c';
    if ($wpdb->get_var("SHOW TABLES LIKE '$table'") == $table) {
		$wpdb->query("DROP TABLE $table");
  }
  $options_table = $wpdb->prefix . 'options';
  $wpdb->delete($options_table, ['option_name'=> 'option_smwas3c'], ['%s']);
  //$wpdb->query("DELETE FROM $options_table WHERE 'option_name' LIKE 'option_smwas3c'");
};