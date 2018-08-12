<?php
namespace App\controllers;


class indexControllers extends BaseController
{
    public function getIndex(){
        $assest = new \Stolz\Assets\Manager();
        $assest->add([
            'bootstrap/bootstrap.min.js',
            'bootstrap/popper.min.js',
            'google-map/map-active.js',
            'jquery/jquery-2.2.4.min.js',
            'others/plugins.js',
            'active.js',
            'responsive/responsive.css',
            'style.css'

        ]);
        $links = [
            'css' => $assest->css(),
            'js' => $assest->js(),
        ];
        return $this->render('index.twig', ['links' => $links]);
    }

}