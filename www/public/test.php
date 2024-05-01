<?php
// phpinfo();
// error_reporting(E_ALL);
// require_once 'rb.php';
// $dsn = 'mysql:host=mysql;dbname=framework;charset=utf8';
// R::setup($dsn, 'user', 'password');
// R::freeze(true);
// R::fancyDebug(true);
// var_dump(R::testConnection());

// === Create
// $cat = R::dispense('category'); // Create table if it is not exist.
// $cat->title = 'TVs'; // add field
// echo '<pre>' . print_r($cat, true) . '</pre>';
// $id = R::store($cat); // send to db
// var_dump($id);

// === Read
// $cat = R::load('category', 3);
// echo $cat->title;    // as Object
// echo $cat['title'];  // as Array
// echo '<pre>' . print_r($cat, true) . '</pre>';

// === Update. way 1
// $cat = R::load('category', 3);
// echo $cat->title . '<br>'; // output: 'Laptops'
// $cat->title = 'CPU'; // Update;
// R::store($cat); // Now it is 'CPU' in database

// === Update. way 2
// $cat = R::dispense('category');
// $cat->title = 'Mouses';
// $cat->id = '3';
// R::store($cat);

// === Delete
// $cat = R::load('category', 7);
// R::trash($cat); // remove one line
// R::trashAll($array); // remove some lines
// R::wipe('category'); // recreate all table, ids start at '1'

// === Finds
// $cats = R::findAll('category'); // without rules (all table)
// $cats = R::findAll('category', 'id > ?', [2]); // with rules (some lines)
// $cats = R::findAll('category', 'title LIKE ?', ['%es%']); // with rules as above
// echo '<pre>' . print_r($cats, true) . '</pre>';
// echo $cats[3]['title']; // index of array is id value

// $cat = R::findOne('category', 'id = 3');
// echo '<pre>' . print_r($cat, true) . '</pre>';

// echo $cats[3]['title'];

// === Find all with rules

// class SingleTone_1
// {
//     use SingleTone;
//     private function __construct()
//     {
//         echo 'It is construct into one';
//     }

// }
// class SingleTone_2
// {
//     use SingleTone;
//     private function __construct()
//     {
//         echo 'It is construct in two';
//     }
// }
// trait SingleTone
// {
//     private static $instance;
//     public static function instance()
//     {
//         if (self::$instance === null)
//             self::$instance = new self;
//         return self::$instance;
//     }
// }
// SingleTone_1::instance();
// echo '<br>';
// SingleTone_2::instance();