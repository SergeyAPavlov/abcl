<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 03.11.2017
 * Time: 11:14
 */

namespace abcl;

abstract class Controller
{
    protected $app;
    /** @var string  */
    public $params = [];
    public $data = [];
    public $viewText;

    public $path;

    public $name;

    /**
     * Controller constructor.
     * @param App $app
     */
    public function __construct($app, $path = '')
    {
        $this->app = $app;
        if ($path){
            $this->path = $path;
        }
        $this->name = Helper::shortClassName($this);

    }

    public function requestRoute()
    {
        return $this;

    }

    public function requestParams()
    {
        return $this;
    }
    public function requestData()
    {
        return $this;
    }

    public function requestView()
    {
        return View::prepare($this->app, $this->name, $this->data);
    }

    public function requestAll()
    {
        return $this->requestRoute()->requestParams()->requestData()->requestView();
    }


}