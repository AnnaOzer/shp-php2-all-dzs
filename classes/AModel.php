<?php


abstract class AModel

{
    static protected $table;
    protected $connection;
    
    public static function getTableName()
    {
        return static::$table;
    }

    protected static function getConnection()
    {
        try {
            return (new Connection())->getDbh();
        } catch (DbException $e1) {
            throw new ModelException('Доступ к данным временно недоступен. ' . $e1->getMessage());
        }
    }

    public static function findAll()
    {
        try {
            $sql = "SELECT * FROM " . static::$table;
            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
            $sth->execute();
            return $sth->fetchAll();
        } catch (PDOException $e2) {
            throw new ModelException('Не удается получить результат SQL запроса: ' . $e2->getMessage());
        }
    }

    static function findById($id)
    {
        try {
            $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
            $sth->execute([':id' => $id]);
            return $sth->fetch();
        } catch (PDOException $e3) {
            throw new ModelException('Не удается получить результат SQL запроса: ' . $e3->getMessage());
        }
    }

    public function execute($sql, $params=[])
    {
        try {
            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            return $sth->execute($params);
        } catch (PDOException $e4) {
            throw new ModelException('Не удается получить результат SQL запроса: ' . $e4->getMessage());
        }
    }

    abstract public function add($data);
    abstract public function update($data, $id);
    abstract public function delete($id);
    
}