<?php
namespace app\controllers;

use app\models\Main;
use vendor\core\App;
use vendor\core\base\View;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main();
        // trigger_error('E_USER_ERROR', E_USER_ERROR);
        // \R::fancyDebug(true);
        $posts = App::$app->cache->get('posts');
        if ($posts === false) {
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts', $posts, 10);
        }
        $menu = $this->menu;
        $title = 'Page title';
        View::setMeta('Index', 'Description page', 'It is keywords');
        $this->set(compact('title', 'posts', 'menu'));
    }
    public function testAction()
    {
        if ($this->isAjax()) {
            $model = new Main();
            // $data = ['answer' => 'Answer from server', 'code' => 200];
            // echo json_encode($data);
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            die;
        }
        // echo 'sync';
        // $this->layout = false;
    }
}