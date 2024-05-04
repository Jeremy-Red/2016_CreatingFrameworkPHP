<?php
namespace fw\libs;

class Cache
{
    public function __construct()
    {

    }
    public function set($key, $data, $seconds = 3600)
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        $file = CACHE . '/';
        $file .= md5($key) . '.txt';
        if (file_put_contents($file, serialize($content))) {
            return true;
        }
        return false;
    }
    public function get($key)
    {
        $file = CACHE . '/';
        $file .= md5($key) . '.txt';
        if (file_exists($file)) {
            $fileContent = file_get_contents($file);
            $content = unserialize($fileContent);
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }
    public function delete($key)
    {
        $file = CACHE . '/';
        $file .= md5($key) . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }
}