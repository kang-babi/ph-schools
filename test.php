<?php

require 'vendor/autoload.php';

use KangBabi\PhSchools\PhSchool;


echo '<pre>';
print_r(
  PhSchool::data(true)
    ->where('region', 'NCR')
    ->map(fn($i) => '"province" => ' . '"' . strtoupper($i['province']) . '"' . ', "municipality" => ' . '"' . strtoupper($i['municipality']) . '"' . ',')
    ->map(fn($i) => '[' . $i . '],')
    ->unique()
    ->values()
    ->toArray()
);
echo '</pre>';
