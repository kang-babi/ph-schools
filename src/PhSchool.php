<?php

namespace KangBabi\PhSchools;

class PhSchool
{
  protected static $data;

  protected static function fetch()
  {
    # get all folders in the data directory
    $folders = glob(__DIR__ . '/regions/*', GLOB_ONLYDIR);

    static::$data = array_map(function ($folder) {
      return include $folder . '/schools.php';
    }, $folders);

    return static::$data;
  }

  public static function get($isFlat = false)
  {
    if ($isFlat) {
      return call_user_func_array('array_merge', static::fetch());
    }

    return static::fetch();
  }
}
