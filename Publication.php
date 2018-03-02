<?php

class Publication 
{
    public $title;
    public $content;
    public $author;
    public $date;

    public function __construct($title = '') 
    {
        $this->title = $title;
    }

    public function print() 
    {
        echo $this->title . "\n";
    }
}