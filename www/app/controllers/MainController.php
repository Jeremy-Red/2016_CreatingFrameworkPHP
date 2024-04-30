<?php
namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main();
        // \R::fancyDebug(true);
        $posts = App::$app->cache->get('posts');
        if ($posts === false) {
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts', $posts, 10);
        }
        $menu = $this->menu;
        $title = 'Page title';
        $this->set(compact('title', 'posts', 'menu'));
    }
    public function testAction()
    {
        if ($this->isAjax()) {
            echo 'async';
            die;
        }
        echo 'sync';
        $this->layout = false;
    }
}