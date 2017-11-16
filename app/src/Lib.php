<?php

/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 16.11.2017
 * Time: 21:46
 */

    /**
     *  Some functions, without dependencies, used in all parts of code
     *
     */
namespace abcl;

class Lib
{
    public static function shortClassName($obj)
    {
        $longname = get_class($obj);
        $ar = explode("\\", $longname);
        $last = count($ar)-1 ;
        return $ar[$last];
    }

    public static function getJson($filename)
    {
        $json = file_get_contents($filename);
        $r = json_decode($json, true);
        return $r;
    }

    public static function canonicalize($address)
    {
        $address = str_replace(DIRECTORY_SEPARATOR, '/', $address);
        $address = explode('/', $address);
        $keys = array_keys($address, '..');

        foreach ($keys as $keypos => $key) {
            array_splice($address, $key - ($keypos * 2 + 1), 2);
        }

        $address = implode('/', $address);
        $address = str_replace('./', '', $address);

        return $address;
    }

    public static function sliceDir ($dir, $level)
    {
        $pathArray = explode(DIRECTORY_SEPARATOR, $dir);
        $new = array_slice ( $pathArray, 0, -$level);
        return implode(DIRECTORY_SEPARATOR, $new);
    }
}

