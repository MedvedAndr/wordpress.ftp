<?php
/**
 * "Обёртки" контента.
 *
 * @see custom_output_content_wrapper()
 * @see custom_output_content_wrapper_end()
 */
add_action('custom_before_main_content', 'custom_output_content_wrapper', 10);
add_action('custom_after_main_content', 'custom_output_content_wrapper_end', 10);
?>