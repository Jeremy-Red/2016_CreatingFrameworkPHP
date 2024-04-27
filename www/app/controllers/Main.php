<?php
namespace app\controllers;

class Main extends App
{
    // public $layout = 'main';
    public function indexAction()
    {
        // $this->layout = false;
        // $this->layout = 'main';
        // $this->layout = 'default';
        // $this->view = 'test';
        $title = 'Page title';
        $this->set(compact('title'));
    }
}