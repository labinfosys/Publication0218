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


Publication::create()->print();

// echo "\n";

// $n  = new News('Новость 1', 'Пришла весна.');
// echo $n->title . "\n";
// echo $n1->title . "\n";
