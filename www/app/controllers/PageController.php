<?php
namespace app\controllers;


class PageController extends AppController
{
    public function viewAction()
    {
        debug($this->route);
        debug($_GET);
        echo __METHOD__;
    }
}