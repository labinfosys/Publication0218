<?php
namespace sk\Publications;

class News extends ActiveRecord
{
    static public $type = 'NEWS';
    static protected $table = 'news';
    private $field = ['title', 'content', 'news_date'];

    public function print()
    {
        echo "{$this->date} : {$this->title} : {$this->content}\n";
    }
}

/*
CREATE TABLE `php02`.`news` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(100) NOT NULL , `content` TEXT NULL , `news_date` DATE NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
*/