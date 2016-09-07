<?php

/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 02.09.2016
 * Time: 14:01
 */
class Connection
{
    protected $dbh;

    private function getConfig()
    {
        return include __DIR__ . '/../config.php';
    }
    
    public function getDbh()
    {
        return $this->dbh;
    }

    public function __construct()
    {
        try {
            $config = $this->getConfig();
            $dsn = $config['db']['drive'] . ':dbname=' . $config['db']['dbname'] . ';host=' . $config['db']['host'];
            $this->dbh = new PDO($dsn, $config['db']['user'], $config['db']['password']);
        } catch (PDOException $e) {
            throw new DbException('Нет соединения с базой данных: ' . $e->getMessage());
        }

    }
}