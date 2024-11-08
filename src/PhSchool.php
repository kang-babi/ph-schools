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

  protected static function fetchExtra()
  {
    # get all files in the extra_attributes directory
    $files = glob(__DIR__ . '/extra_attributes/*.php');

    return array_map(function ($file) {
      return include $file;
    }, $files);
  }

  public static function extraAttributes()
  {
    return collect(call_user_func_array('array_merge', static::fetchExtra()));
  }

  public static function fetchExtraBySchoolId($schoolId)
  {
    return static::extraAttributes()->where('school_id', $schoolId)->first();
  }

  public static function data($isFlat = false)
  {
    if ($isFlat) {
      return collect(call_user_func_array('array_merge', static::fetch()));
    }

    return collect(static::fetch());
  }
}
