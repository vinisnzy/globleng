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

function formatAvaliationDate($date) {
    $traducaoMeses = [
            'January' => 'Janeiro',
            'February' => 'Fevereiro',
            'March' => 'Março',
            'April' => 'Abril',
            'May' => 'Maio',
            'June' => 'Junho',
            'July' => 'Julho',
            'August' => 'Agosto',
            'September' => 'Setembro',
            'October' => 'Outubro',
            'November' => 'Novembro',
            'December' => 'Dezembro'
    ];
    $date = new DateTime($date);
    $date = $date->format('d-F-Y');
    $date = explode("-", $date);
    return "{$date[0]} de {$traducaoMeses[$date[1]]} de {$date[2]}";
}

?>