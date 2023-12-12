<?php
// app/Helpers/StringHelper.php

if (!function_exists('truncateString')) {
    function truncateString($string, $maxLength) {
        if (strlen($string) <= $maxLength) {
            return $string; // No truncation needed
        }

        // Find the last space within the desired length
        $lastSpace = strrpos(substr($string, 0, $maxLength), ' ');

        // Truncate the string
        $truncatedString = substr($string, 0, $lastSpace);

        return $truncatedString;
    }
}
