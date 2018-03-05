<?php
namespace sk\Publications;

class News extends Publication
{
    public function __construct($title, $content) 
    {
        $date = date('d.m.Y');
        parent::__construct($title, $content, $date);
    }

    public function print()
    {
        echo "{$this->date} : {$this->title} : {$this->content}";
    }
}