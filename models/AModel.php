<?php

namespace App\Models;
use App\Classes\Connection;
use App\Exceptions\DbException;
use App\Exceptions\ModelException;

abstract class AModel

{
    static protected $table;

    static protected $columns = [];

    protected $connection;

    static public function getTableName()
    {
        return static::$table;
    }

    static protected function getConnection()
    {
        try {
            return (new Connection())->getDbh();
        } catch (DbException $e1) {
            throw new ModelException('Доступ к данным временно недоступен. ' . $e1->getMessage());
        }
    }

    static public function findAll()
    {
        try {
            $sql = "SELECT * FROM " . static::$table;
            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            $sth->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
            $sth->execute();
            return $sth->fetchAll();
        } catch (\PDOException $e2) {
            throw new ModelException('Не удается получить результат SQL запроса: ' . $e2->getMessage());
        }
    }

    static public function findById($id)
    {
        try {
            $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            $sth->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
            $sth->execute([':id' => $id]);
            return $sth->fetch();
        } catch (\PDOException $e3) {
            throw new ModelException('Не удается получить результат SQL запроса: ' . $e3->getMessage());
        }
    }

    public function execute($sql, $params=[])
    {
        try {
            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            return $sth->execute($params);
        } catch (\PDOException $e4) {
            throw new ModelException('Не удается получить результат SQL запроса: ' . $e4->getMessage());
        }
    }


    public function save() {
        // один и тот же метод для сохранения нового объекта в базу и обновления старого

        $tokens = [];
        $values = [];

        foreach (static::$columns as $column) {
            $tokens[] = ':' . $column;
            $values[':' . $column] = $this->$column;
        }

        $dbh = static::getConnection();

        if (!isset($this->id)) {
            $sql = 'INSERT INTO ' . static::$table . '
             (' . implode(', ', static::$columns) . ') 
             VALUES 
             (' . implode(', ', $tokens) . ')';

                      
            $sth = $dbh->prepare($sql);
            $sth->execute($values);

            $this->id = $dbh->lastInsertId();

        } else {

            $columns =[];

            foreach (static::$columns as $column) {
                $columns[] = $column . '=:' . $column;
            }

            $sql = '
            UPDATE ' . static::$table . ' 
            SET ' . implode(', ', $columns) . '
            WHERE id=:id';




            $sth = $dbh->prepare($sql);
            $sth->execute([':id' => $this->id] + $values);
        }
    }
    
    public function delete()
    {

        if (isset($this->id)) {
            
            $sql = 'DELETE FROM ' . static::$table . '
             WHERE id=:id';
            
            $values = [':id'=>$this->id];

            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            $sth->execute($values);
        } else {
            throw new \Exception('Попытка удалить несуществующую запись');
        }
    }
    
}