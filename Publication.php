<?php

class Publication 
{
    public $title;
    public $content;
    public $author;
    public $date;

    public function __construct($title = '', $content = '') 
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function print() 
    {
        echo $this->title . "\n";
    }
}