<?php

require 'vendor/autoload.php';

use KangBabi\PhSchools\PhSchool;


echo '<pre>';
print_r(PhSchool::get(true));
echo '</pre>';
