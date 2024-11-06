<?php

namespace KangBabi\PhSchools;

use Illuminate\Support\Collection;

class PhSchool extends Collection
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

  public static function data($isFlat = false)
  {
    if ($isFlat) {
      return collect(call_user_func_array('array_merge', static::fetch()));
    }

    return collect(static::fetch());
  }
}
