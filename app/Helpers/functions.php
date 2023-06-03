<?php

if (!function_exists('formatDate')) {
  function formatDate($date)
  {
    $formatDates = explode("T", $date);
    $elements = explode(" ", $formatDates[0]);
    $elements2 = explode("-", $elements[0]);
    $date = $elements2[2] . "-" . $elements2[1] . "-" . $elements2[0] . " " . $elements[1];
    return $date;
  }
}