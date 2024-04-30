<?php
namespace vendor\core\base;

class View
{
    public $route = [];
    public $view;
    public $layout;
    public $scripts = [];
    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }
    public function render($vars)
    {
        if (is_array($vars))
            extract($vars);
        $file_view = APP . "/views/";
        $file_view .= "{$this->route['controller']}/";
        $file_view .= "{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "<pre>View <b>{$file_view}</b> is not found.</pre>";
        }
        $content = ob_get_clean();

        if ($this->layout !== false) {
            $file_layout = APP . "/views/layouts/";
            $file_layout .= "{$this->layout}.php";
            if (is_file($file_layout)) {
                $content = $this->getScript($content);
                $scripts = $this->scripts;
                require $file_layout;
            } else {
                echo "<pre>Layout <b>{$file_layout}</b> is not found.</pre>";
            }
        }
    }
    protected function getScript($content)
    {
        $pattern = '#<script.*?>.*?</script>#si';
        preg_match_all($pattern, $content, $scripts);
        $this->scripts = $scripts[0];
        if (!empty($scripts[0])) {
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }
}