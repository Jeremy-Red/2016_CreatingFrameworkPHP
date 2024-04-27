<?php
namespace app\controllers;

class MainController extends AppController
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