<?php
if (!function_exists('custom_output_content_wrapper')) {
    /**
     * Вывести начало контейнера страницы (main)
     */
    function custom_output_content_wrapper($args) {
        locate_template(
            '/templates/global/main-wrapper-start.php',
            true,
            false,
            $args
        );
    }
}

if (!function_exists('custom_output_content_wrapper_end')) {
    /**
     * Вывести конец контейнера страницы (main)
     */
    function custom_output_content_wrapper_end() {
        locate_template(
            '/templates/global/main-wrapper-end.php',
            true,
            false
        );
    }
}