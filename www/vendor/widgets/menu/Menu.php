<?php
namespace vendor\widgets\menu;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container;
    protected $table;
    protected $cache;
    public function __construct()
    {
        $this->run();
    }
    protected function run()
    {
        $this->data = \R::getAssoc("SELECT * FROM `categories`");
        // debug($this->getTree());
        // $this->getTree();

        $this->tree = $this->getTree();
    }
    protected function getTree()
    {
        $tree = [];
        $testSource = [
            1 => ['parent' => '0'],
            2 => ['parent' => '1'],
            3 => ['parent' => '1'],
            4 => ['parent' => '2'],
            5 => ['parent' => '0'],
            6 => ['parent' => '5'],
        ];
        $testCopy = $testSource;
        foreach ($testCopy as $id => &$node) {
            if (!$node['parent']) {
                $tree[$id] = &$node;
            } else {
                $testCopy[$node['parent']]['child'][$id] = &$node;
            }
        }
        echo '<pre>' . print_r($tree, true) . '</pre>';


        // $data = $this->data;
        // foreach ($data as $id => &$node) {
        //     if (!$node['parent']) {
        //         $tree[$id] = &$node;
        //     } else {
        //         $data[$node['parent']]['childs'][$id] = &$node;
        //     }
        // }

        return $tree;
    }
}