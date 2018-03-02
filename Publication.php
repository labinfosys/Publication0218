<?php

class Publication 
{
    public $title;
    public $content;
    public $author;
    public $date;

    public function __construct($title, $content, $date) 
    {
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
    }

    public function print() 
    {
        echo $this->title . "\n";
    }
}