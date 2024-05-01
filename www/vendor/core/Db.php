<?php
namespace vendor\core;

use PDO;
use R;

class Db
{
    use TSingletone;
    protected $pdo;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $config = ROOT . '/config/config_db.php';
        $db = require $config;
        require LIBS . '/rb.php';
        R::setup($db['dsn'], $db['user'], $db['password']);
        R::freeze(true);
    }

}