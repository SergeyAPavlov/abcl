<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 16.11.2017
 * Time: 22:55
 */

namespace abcl;

use abcl\model\Paths;

class App
{
    public $config;
    public $content;
    public $debug;

    public $paths;
    public $log = [];


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
        $this->paths = new Paths($content);
        $this->debug = $this->config->debug;
    }

    public function logIt($log, $type = '', $errorlevel = 0)
    {
        $this->log[] = [$log, $type, $errorlevel, time()];
    }

}