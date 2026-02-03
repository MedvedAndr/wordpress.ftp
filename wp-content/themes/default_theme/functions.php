<?php
$version	= '0.0.1';
$theme_path = get_stylesheet_directory();
$theme_path_uri	= get_stylesheet_directory_uri();

require_once($theme_path .'/functions/custom_hooks.php');
require_once($theme_path .'/functions/custom_functions.php');

/**
 * Регистрация стилей и скриптов для дальнейшего подключения
 * 
 * @see register_styles()
 * @see register_scripts()
 */
add_action('wp_enqueue_scripts', 'register_styles');
add_action('wp_enqueue_scripts', 'register_scripts');

if (!function_exists('register_styles')) {
	/**
	 * Регистрация стилей темы
	 */
	function register_styles() {
		global $version, $theme_path_uri;
	
		wp_register_style('main', $theme_path_uri .'/style.css', [], $version);
	}
}

if (!function_exists('register_scripts')) {
	/**
	 * Регистрация скриптов темы
	 */
	function register_scripts() {
		global $version, $theme_path_uri;
	
		if (!wp_script_is('jquery', 'registered')) {
			wp_register_script('jquery', $theme_path_uri .'/assets/vendor/jquery/jquery-3.7.1.min.js', [], '3.7.1');
		}
	
		wp_register_script('jquery-data-attributes', $theme_path_uri .'/assets/vendor/jquery/jquery-extensions/DataAttributes.js', ['jquery'], '1.0');
		wp_register_script('main', $theme_path_uri .'/assets/js/main.js', ['jquery', 'jquery-data-attributes'], $version);
	}
}

/**
 * Подключение стилей и скриптов
 * 
 * @see include_assets()
 */
add_action('wp_enqueue_scripts', 'include_assets');

if (!function_exists('include_assets')) {
	/**
	 * Подключение стилей и скриптов к теме
	 */
	function include_assets() {
		wp_enqueue_style('main');
	
		wp_enqueue_script('main');
	}
}
?>