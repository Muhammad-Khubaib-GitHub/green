<?php

if (!function_exists('getSVG')) {
    function getSVG($path, $class = '') {
        $filePath = public_path($path);

        if (file_exists($filePath)) {
            $svg = file_get_contents($filePath);
            return '<svg class="' . $class . '">' . $svg . '</svg>';
        }

        return '';
    }
}
