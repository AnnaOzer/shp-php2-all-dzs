<?php

function config() 
{
    return include __DIR__ . '/../config.php';
}

function DBConnect()
{
    $config = config(); 
   return mysqli_connect(
        $config['db']['host'],
        $config['db']['user'],
        $config['db']['password'],
        $config['db']['dbname']
    );
}

function DBQuery($sql)
{
    
    $res = mysqli_query(DBConnect(), $sql);


    if(!$res) {

        return [];
    }
    $ret =[];
    while ($row = mysqli_fetch_assoc($res))
    {
        $ret[] = $row;
    }
    
    return $ret;
}