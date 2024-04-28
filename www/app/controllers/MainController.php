<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main();
        $posts = $model->findAll();
        // $post = $model->findOne('Text post', 'title');
        // $data = $model->findBySql('SELECT id, title FROM posts ORDER BY id DESC LIMIT 2');
        // $data = $model->findBySql("SELECT * FROM {$model->table} WHERE title LIKE ?", ['%ost%']);
        // $data = $model->findLike('post', 'title');
        // debug($data);
        $title = 'Page title';
        $this->set(compact('title', 'posts'));
    }
}