<?php

require_once __DIR__ . '/../functions/dbConnection.php';

abstract class article
{
    protected $connection;
    protected $table;
    protected $schema;

    abstract public function getAll();
    abstract public function getOne($id);
    
    abstract public function add($data);
    abstract public function update($data, $id);
    abstract public function delete($id);

    
}