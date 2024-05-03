<?php
namespace vendor\widgets\menu;

use vendor\libs\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'categories';
    protected $cache = 3600;
    protected $cacheKey = 'fw-menu';
    public function __construct($options = '')
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }
    protected function getOptions($options)
    {
        foreach ($options as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
    protected function run()
    {
        $cache = $this->cache ? new Cache() : null;
        if ($this->cache) { //
            $this->menuHtml = $cache->get($this->cacheKey);
        }
        if (!$this->menuHtml) {
            $this->data = \R::getAssoc("SELECT * FROM `{$this->table}`");
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if ($this->cache) {
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }
    protected function output()
    {
        echo '<' . $this->container . ' class="' . $this->class . '">' . PHP_EOL;
        echo $this->menuHtml;
        echo '</' . $this->container . '>' . PHP_EOL;
    }
    protected function getTree()
    {
        // $testSource = [
        //     1 => ['parent' => '0'],
        //     2 => ['parent' => '1'],
        //     3 => ['parent' => '1'],
        //     4 => ['parent' => '2'],
        //     5 => ['parent' => '0'],
        //     6 => ['parent' => '5'],
        // ];
        // $data = $testSource;
        $data = $this->data;
        $tree = [];
        foreach ($data as $id => &$node) {
            if (!$node['parent']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }
    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }
    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
    public function getHash()
    {
        return md5(serialize($this));
    }
}