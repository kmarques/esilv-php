<?php 

if (!function_exists('str_starts_with')) {
    function str_starts_with(string $haystack, string $needle)
    {
        return $needle === "" || strpos($haystack, $needle) === 0;
    }
}

?>