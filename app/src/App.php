<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 16.11.2017
 * Time: 22:55
 */

namespace abcl;

use abcl\model\Cells;
use abcl\model\Paths;

class App
{
    public $config;
    public $root;
    public $content;
    public $debug;

    public $paths;
    public $log = [];
    public $currentPath;
    public $cells;


    /**
     * App constructor.
     * @param string $content
     */
    public function __construct($content = '')
    {
        $this->config = new Config();
        if ($content) {
            $this->content = $content;
        }
        else {
            $this->content = $this->config->content;
        }
        $this->root =  $this->config->root;
        $this->paths = new Paths($content);
        $this->debug = $this->config->debug;
        $this->cells = new Cells($this);
    }

    public function logIt($log, $type = '', $errorlevel = 0)
    {
        $this->log[] = [$log, $type, $errorlevel, time()];
    }

}