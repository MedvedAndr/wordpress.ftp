<?php
$version	= '0.0.1';
$theme_path	= get_stylesheet_directory_uri();

// Регистрация стилей и скриптов для дальнейшего подключения
add_action('wp_enqueue_scripts', 'register_styles');
add_action('wp_enqueue_scripts', 'register_scripts');

function register_styles() {
	global $version, $theme_path;

	wp_register_style('main', $theme_path .'/style.css', [], $version);
}

function register_scripts() {
	global $version, $theme_path;

	if (!wp_script_is('jquery', 'registered')) {
		wp_register_script('jquery', $theme_path .'/assets/vendor/jquery/jquery-3.7.1.min.js', [], '3.7.1');
	}

	wp_register_script('jquery-data-attributes', $theme_path .'/assets/vendor/jquery/jquery-extensions/DataAttributes.js', ['jquery'], '1.0');
	wp_register_script('main', $theme_path .'/assets/js/main.js', ['jquery', 'jquery-data-attributes'], $version);
}

// Подключаем стили и скрипты
add_action('wp_enqueue_scripts', 'include_assets');

function include_assets() {
	wp_enqueue_style('main');

	wp_enqueue_script('main');
}
?>