<?php

require_once 'Publication.php';

$publ1 = new Publication('Публикация 1');

$publ2 = new Publication();
$publ2->title = 'Публикация 2';

$publ1->print();
$publ2->print();