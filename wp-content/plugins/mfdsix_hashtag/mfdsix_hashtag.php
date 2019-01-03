<?php 

/* 
Plugin Name: Mfdsix Hashtag
Plugin URI: http://www.mfdsix-hashtag.com
Author: mfdsixCode
Author URI: https://www.mfdsix.com
Description: Just like IDN
*/ 


add_action( 'admin_menu', 'mfdsix_hashtag_menu', 7);

function mfdsix_hashtag_menu()
{	
	add_menu_page(__("Mfdsix Hashtag",'acf'), __("Mfdsix Hashtag",'acf'), 'manage_options', 'mfdsix_hashtag_page', 'mfdsix_hashtag_page', 'dashicons-', '80.025');
}

function mfdsix_hashtag_page()
{
	include "page.php";
}

 ?>