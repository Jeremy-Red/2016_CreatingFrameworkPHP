<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main();
        $posts = \R::findAll('posts');
        $menu = $this->menu;
        $title = 'Page title';
        $this->set(compact('title', 'posts', 'menu'));
    }
}