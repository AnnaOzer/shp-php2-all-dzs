<?php

require_once __DIR__ . '/articleModel.php';

// функции для работы с данными
class newsModel
    extends article
{
    protected $table = 'news';
    protected $schema = ['title', 'text'];

    public function getAll()
    {
        return $this->connection->query('SELECT * FROM ' . $this->table);
    }

    public function getOne($id)
    {
        return $this->connection->queryOne('SELECT * FROM ' . $this->table . ' WHERE id=' . $id);
    }

    public function add($data)
    {        
        return $this->connection->exec('
          INSERT INTO '. $this->table . ' ('. implode(",", $this->schema) . ')  
          VALUES (\'' . implode("', '", $data) . '\');
        ');
    }

    public function update($data, $id)
    {
        $prep =[];
        foreach ($this->schema as $v) {
            $prep[] = '`'. $v .'`=\'' . $data[$v] . '\'';
        }


        return $this->connection->exec('
        UPDATE '. $this->table .' SET ' . implode(", ", $prep) . ' 
          WHERE `id`=\'' . $id . '\';    
    ');
    }

    public function delete($id)
    {
        return $this->connection->exec('
        DELETE FROM ' . $this->table . ' WHERE `id`=\'' . $id . '\'    
    ');
    }

    public function __construct()
    {
        $this->connection = new dbConnection();
    }
}