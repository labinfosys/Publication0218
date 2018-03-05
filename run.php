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

// require_once 'Publication.php';
// require_once 'News.php';

use sk\Publications\News;

$n  = new News('Новость 1', 'Пришла весна.');
// $n1 = new Article('Новость 2', 'Пришла весна.');

echo $n->title . "\n";
// echo $n1->title . "\n";
