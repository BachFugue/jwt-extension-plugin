<?php

/*
 Plugin Name:  JWT Extender: Response Edition
 Plugin URI:   https://flatheadbeacon.com
 Description:  This extends JWT plugin to login thru flatheadbeacon.com
 Version:      2019.03.18
 Author:       Flathead Beacon
 Author URI:   https://flatheadbeacon.com
 License:      N/A
 License URI:  https://flatheadbeacon.com
*/


// Prevent people from accessing these files
if (!defined('ABSPATH'))
   exit;

//include("functions/api-shortcode.php");
//include("functions/extend_api.php");

function addAuthData($data,$user){
	$data["uid"] = $user->data->ID;
	$data["expires"] = get_expire_time($user->data->ID)[0]->expire_time;
	return $data;
}

function get_expire_time($id){
	$id = 100;
	global $wpdb;
	$results = $wpdb->get_results( "SELECT expire_time FROM {$wpdb->prefix}ihc_user_levels WHERE user_id = " . $id, OBJECT );
	return $results;
}

add_filter("jwt_auth_token_before_dispatch","addAuthData",10,2);
