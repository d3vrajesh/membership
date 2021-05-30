<?php

/*
  Plugin Name: NNHS-Membership
  Description: This plugin allows users to Insert, Update and Delete membership details in the database. 
  Version: 1.0
  Author: Rajesh
  Author URI: http://codeplanet.in
 */

//creating database table

global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
    global $wpdb;
    global $jal_db_version;

    $nnhs_table_name = $wpdb->prefix . 'members_list'; 
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $nnhs_table_name (
		s_no mediumint(9) NOT NULL AUTO_INCREMENT,
		m_id text(30) default,
        membership_type text(30) default,
        app_status varchar(20) default,
        applicant_name varchar(25) NOT NULL,   
		dob date default,
        contct_address text(100) NOT NULL,
        tel_res varchar(15) NOT NULL,
        tel_off varchar(15) NOT NULL,
        mob varchar(10) NOT NULL,
        email varchar(50) NOT NULL,
        profession varchar(40) NOT NULL,
        name_ins varchar(50) NOT NULL,
        place_ins varchar(50) NOT NULL,
        designation varchar(40) NOT NULL,
        interest varchar(220) NOT NULL,
        ref_name varchar(30) NOT NULL,
        ref_detail varchar(50) NOT NULL,
        id_proof_type text NOT NULL,
        id_proof_no text NOT NULL,
        amount text NOT NULL,
        pay_status text NOT NULL,
        transaction_type text NOT NULL,
        transaction_id text NOT NULL,
        upload text NOT NULL,
        place text NOT NULL,
        app_date date 
		PRIMARY KEY  (s_no)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install' );
//adding in menu
add_action('admin_menu', 'at_try_menu');

function at_try_menu() {
    //adding plugin in menu
    add_menu_page('members_list', //page title
        'Membership', //menu title
        'manage_options', //capabilities
        'Members_Listing', //menu slug
        'members_list' //function
    );
    //adding submenu to a menu
    add_submenu_page('Members_Listing',//parent page slug
        'member_insert',//page title
        'Add Member',//menu titel
        'manage_options',//manage optios
        'Member_Insert',//slug
        'member_insert'//function
    );
    add_submenu_page( null,//parent page slug
        'member_update',//$page_title
        'Member Update',// $menu_title
        'manage_options',// $capability
        'Member_Update',// $menu_slug,
        'member_update'// $function
    );
    add_submenu_page( null,//parent page slug
        'member_delete',//$page_title
        'Member Delete',// $menu_title
        'manage_options',// $capability
        'Member_Delete',// $menu_slug,
        'member_delete'// $function
    );
}
// returns the root directory path of particular plugin
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'members_list.php');
require_once (ROOTDIR.'member_insert.php');
require_once (ROOTDIR.'member_update.php');
require_once (ROOTDIR.'member_delete.php');
?>