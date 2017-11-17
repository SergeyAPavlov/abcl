<?php

namespace abcl\model;
use abcl\Helper;

/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 16.11.2017
 * Time: 21:18
 */
class Paths
{
    public $root;

    /**
     * Paths constructor.
     * @param $root
     */
    public function __construct($root)
    {
        $this->root = $root;
    }

    public function checkRoot($root = '')
    {
        if (!$root) $root = $this->root;
        return file_exists($root);
    }

    public function rel2real($path, $root = '')
    {
        if (!$root) $root = $this->root;
        return realpath($root.$path);
    }

    public function absPath($url)
        // url - путь от точки монтирования. Записывается начиная с /
    {
        $res = Helper::canonicalize($this->root.$url);
        return ($res);
    }

    public function listNodes($url)
    {
        if ($url == '/') $url = '';
        $abs = $this->rel2real($url);
        $list = [];
        foreach (new \DirectoryIterator($abs) as $fileInfo) {
            if(!$fileInfo->isDir() OR $fileInfo->isDot()) continue;
            $list[] = $url.'/'.$fileInfo->getFilename();
        }
        return $list;

    }

}