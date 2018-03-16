<?php
namespace sk\Publications;

class ActiveRecord 
{
    public $db;
    public $attributes;
    public $table;
    static public $className;

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
        $obj = new static::$className($db);
        $sql = "select * from " . $obj->table . " where id = $id";
        $result = [];
        foreach($db->query($sql, \PDO::FETCH_ASSOC) as $row) {
            $result = $row;
        }
        if (empty($result)) return null;
        $obj->attributes = $result;
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
        $fieldsList = [];
        foreach ($this->attributes as $field => $value) {
            $fieldsList[] = " $field = '$value'";
        }
        $fieldsList = implode(', ', $fieldsList);
        // UPDATE news SET title = 'Заголовок', content = 'Контент' WHERE id = 1
        $sql = "UPDATE {$this->table} SET $fieldsList WHERE id = {$this->id}";
        $this->db->exec($sql);
    }
    protected function insert()
    {
        $fieldsList = implode(', ', array_keys($this->attributes));
        $valuesList = '\'' . implode('\', \'', $this->attributes) . '\'';
        $valuesList = "'" . implode("', '", $this->attributes) . "'";
        // INSERT INTO news (title, content) VALUES ('Заголовок', 'Контент')
        $sql = "INSERT INTO {$this->table} ({$fieldsList}) VALUES ({$valuesList})";
        $this->db->exec($sql);
        $this->id = $this->db->lastInsertId();
    }

}