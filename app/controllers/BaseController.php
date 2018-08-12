<?php
/**
 * Created by PhpStorm.
 * User: ahernand53
 * Date: 12/08/18
 * Time: 04:16 PM
 */

namespace App\controllers;


class BaseController
{
    protected $templateEngine;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem('../resources/views/');
        $this->templateEngine = new \Twig_Environment($loader, [
            'debug' => true,
            'cache' => false,
        ]);

        $this->templateEngine->addFilter(new \Twig_SimpleFilter('url', function ($path) {
            return BASE_URL . $path;
        }));
    }

    public function render($fileName, $data = []){
        return $this->templateEngine->render($fileName, $data);
    }

}