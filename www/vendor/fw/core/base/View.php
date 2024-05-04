<?php
namespace fw\core\base;

class View
{
    public $route = [];
    public $view;
    public $layout;
    public $scripts = [];
    public static $meta = ['title' => '', 'description' => '', 'keywords' => ''];
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
        $file_view .= $this->route['prefix'];
        $file_view .= "{$this->route['controller']}/";
        $file_view .= "{$this->view}.php";
        $file_view = strtr($file_view, '\\', '/');
        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        } else {
            throw new \Exception("View <b>{$file_view}</b> is not found.", 404);
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
                throw new \Exception("Layout <b>{$file_layout}</b> is not found.", 404);
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
    public static function getMeta()
    {
        echo '<title>' . self::$meta['title'] . '</title>' . PHP_EOL;
        echo '<meta name="description" content="' . self::$meta['description'] . '">' . PHP_EOL;
        echo '<meta name="keywords" content="' . self::$meta['keywords'] . '">' . PHP_EOL;
    }
    public static function setMeta($title = '', $description = '', $keywords = '')
    {
        self::$meta['title'] = $title;
        self::$meta['description'] = $description;
        self::$meta['keywords'] = $keywords;
    }
}