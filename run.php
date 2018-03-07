<?php

function my_autoload($className)
{    
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    if (file_exists($file))
        include_once $file;
    else
        var_dump($className);
}
spl_autoload_register('my_autoload');

use sk\Publications\News;
use sk\Publications\Publication;

$db = new PDO('mysql:host=localhost;dbname=php02', 'root', '');

$news = News::get($db, 4);

$news->title = $news->title . ' #4';
$news->save();
$news->print();

// $n1 = new News($db);
// $n1->title = 'Ручная новость';
// $n1->content = 'Ручная новость';
// $n1->date = date('Y-m-d');
// $n1->save();
// $n1->print();