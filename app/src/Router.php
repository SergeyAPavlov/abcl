<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 02.11.2017
 * Time: 20:44
 */

namespace abcl;


class Router
{
    public $rout;
    private $app;

    public $routList;
    public $path;

    public function __construct(App $app, $path = false)
    {
        $this->app = $app;
        $this->routList = $app->config->routList;
        if ($path !== false){
            $this->path = $path;
            $this->selectRout($path);
        }
    }

    /**
     * @return string
     */
    public function getRout()
    {
        return $this->rout;
    }

    public function selectRout($path = '')
    {
        if ($path == '') $path = $this->path;
        $bestRout = null;
        $filtered = [];
        foreach ($this->routList as $rout=>$value){
            if (fnmatch( $rout, $path)){
                $filtered[$rout] = strlen($rout);
            }
        }
        if (count ($filtered) == 0) return false;
        $best = array_keys( $filtered, max( $filtered));
        if (count ($best) > 0){
            $bestRout = current($best);
        }
        if (!is_null($bestRout)) {
            $this->rout = $this->routList[$bestRout];
            $this->app->currentPath = $path;
            return $this->rout;
        }
        else return false;
    }






}