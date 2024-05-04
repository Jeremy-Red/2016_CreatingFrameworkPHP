<?php
namespace app\controllers;

use fw\core\base\Controller;

class AppController extends Controller
{
    public $menu;
    public function __construct($route)
    {
        parent::__construct($route);
        new \app\models\Main;
        $this->menu = \R::findAll('category');
    }
}