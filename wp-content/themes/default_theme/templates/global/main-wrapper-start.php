<?php
if (is_string($args)) {
    $classes = array_unique(array_filter(explode(' ', $args)));
}
elseif (is_array($args) && array_is_list($args)) {
    $classes = array_unique(array_filter($args));
}
elseif (is_array($args) && !array_is_list($args) && array_key_exists('classes', $args)) {
    $classes = array_unique(array_filter(array_values($args['classes'])));
}
else {
    $classes = [];
}

$classes = !empty($classes) ? 'class="'. (implode(' ', $classes)) .'"' : '';

// echo '<pre>'; var_dump($classes); echo '</pre>';
?>
<main <?php echo $classes; ?> role="main">