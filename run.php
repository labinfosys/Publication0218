<?php

// require_once 'Publication.php';
require_once 'News.php';

$n = new News('Новость 1', 'Пришла весна.');
$n1 = new News('Новость 2', 'Пришла весна.');

echo $n->title . "\n";
echo $n1->title . "\n";

// $n->print();

// $publ1 = new Publication('Публикация 1');

// $publ2 = new Publication();
// $publ2->title = 'Публикация 2';

// $publ1->print();
// $publ2->print();