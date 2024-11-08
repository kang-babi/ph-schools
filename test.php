<?php

require 'vendor/autoload.php';

use KangBabi\PhSchools\PhSchool;


echo '<pre>';
print_r(
  PhSchool::extraAttributes()->where('school_id', '111864')
);
echo '</pre>';
