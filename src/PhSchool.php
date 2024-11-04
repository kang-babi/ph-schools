<?php

namespace KangBabi\PhSchools;

class PhSchool
{
  protected $data;
  protected static $instance;

  protected static function fetch()
  {
    # get all folders in the data directory
    $folders = glob(__DIR__ . '/regions/*', GLOB_ONLYDIR);

    $data = [];

    foreach ($folders as $folder) {
      $region = basename($folder);
      $schools = file_get_contents($folder . '/schools.php');

      $data[$region] = $schools;
    }

    return $data;
  }

  public static function get()
  {
    return static::fetch();
  }
}
