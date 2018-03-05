<?php
namespace sk\Publications;

class Publication 
{
    static public $type = 'PUBL';

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

    static public function create()
    {
        $p = new Publication('Автопубликация', 'Контент', date('d.m.Y'));
        return $p;
    }
}