<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 16.11.2017
 * Time: 22:53
 */

namespace abcl\model;


use abcl\App;

class Cells
{
    private $app;
    private $cellExtension;
    private $paths;

    /**
     * Cells constructor.
     * @param App $app
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->cellExtension = $app->config->cellExtension;
        $this->paths = new Paths($app->config->content);
    }

    public function readCell($path, $name)
    {
        $fileName = $this->paths->rel2real($path.DIRECTORY_SEPARATOR.$name.$this->cellExtension);
        try{
            $cellText = file_get_contents($fileName);
        } catch (\Throwable $t) {
            $this->app->logIt($fileName, 'fileFail', 1);
            return false;
        }
        $this->app->logIt($fileName, 'fileName');
        return $cellText;
    }

    public function readCells($path, $names)
    {
        $cells = [];
        foreach ($names as $name)
        {
            $cellText = $this->readCell($path, $name);
            if ($cellText !== false) $cells[$name] = $cellText;
        }
        return $cells;
    }



}