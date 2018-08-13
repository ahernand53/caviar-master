<?php
namespace App\controllers;


use App\models\Plate;

class indexControllers extends BaseController
{
    public function getIndex(){
        /*$assest = new \Stolz\Assets\Manager();
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
        ];*/

        return $this->render('index.twig');
    }

    public function postIndex(){
        return $this->render('index.twig');
    }

    public function getMenu(){

        $plates = Plate::all();
        return$this->render('menu.twig', [
            'plates' => $plates,
        ]);

    }

    public function getContact(){

        return $this->render('contact.twig');

    }

}