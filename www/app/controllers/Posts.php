<?php
namespace app\controllers;

class Posts extends \vendor\core\base\Controller
{
    public function indexAction()
    {
        echo __METHOD__;
    }
    public function testAction()
    {
        debug($this->route);
        echo __METHOD__;
    }
}