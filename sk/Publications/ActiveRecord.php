<?php
namespace sk\Publications;

class ActiveRecord 
{
    static protected $table = 'news';
    public $db;
    public $attributes;

    public function __construct($db) 
    {
        $this->db = $db;
    }

    public function __get($name)
    {
        if (isset($this->attributes[$name]))
            return $this->attributes[$name];
        return null;
    }
    
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    static public function get($db, $id)
    {
        $sql = "select * from " . self::$table . " where id = $id";
        $result = [];
        foreach($db->query($sql) as $row) {
            $result = $row;
        }
        $obj = new News($db);
        $obj->id = $result['id'];
        $obj->title = $result['title'];
        $obj->content = $result['content'];
        $obj->date = $result['news_date'];
        return $obj;
    }

    public function save() 
    {
        if (!is_null($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    protected function update()
    {
        $fields = '';
        foreach($this->fields as $field) {
            $fields .= " {$field} = '" . $this->$field . "' ";
        }
        // . " title = '{$this->title}', "
        // . " content = '{$this->content}', "
        // . " news_date = '{$this->date}' "
        $sql = "UPDATE " . self::$table  . " SET "
            . $fields
            . " where id = '{$this->id}' ";
        var_dump($sql);
        $this->db->exec($sql);
    }
    protected function insert()
    {
        $sql = "INSERT INTO " . self::$table 
            . " (`title`, `content`, `news_date`)"
            . " VALUES ('{$this->title}', '{$this->content}', '{$this->date}')";
        $this->db->exec($sql);
        $this->id = $this->db->lastInsertId();
    }

}