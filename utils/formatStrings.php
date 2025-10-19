<?php

function removerAcentos($str) {
    $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $str = preg_replace('/[^A-Za-z0-9\s\-]/', '', $str);
    if (str_contains($str, " ")) {
         $str = str_replace(" ", "-", $str);
    }
    return strtolower($str);
}

function formatDate($date) {
    $date = new DateTime($date);
    return $date->format('d/m/Y');
}

function formatTime($time) {
    $time = explode(":", $time);
    $hours = $time[0];
    $minutes = $time[1];
    return $hours . "h" . " " . $minutes . "min";
}

function formatPrice($price) {
    return number_format($price, 2, ',', '.');
}

?>