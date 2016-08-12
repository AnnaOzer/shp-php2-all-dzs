<?php


class dbConnection
{
    private $link;

    private function getConfig() 
    {
        return include __DIR__ . '/../config.php';
    }
    
    public function __construct()
    {
        $config = $this->getConfig();
        
        $link = mysqli_connect(
            $config['db']['host'],
            $config['db']['user'],
            $config['db']['password'],
            $config['db']['dbname']
        );
        
        if(!$link) {
            echo "Error. Unable to connect to mysql";
            die;
        }

        $this->link = $link;
        
    }

    public function query($sql)
    {
        $res = mysqli_query($this->link, $sql);


        if(!$res) {
            return [];
        }

        $ret =[];

        while ($row = mysqli_fetch_assoc($res)) {
            $ret[] = $row;
        }

        return $ret;
    }

    
    public function queryOne($sql)
    {
        return $this->query($sql)[0];
    }
    
    public function exec($sql)
    {
        $res = mysqli_query($this->link, $sql);
        if ($res) {
            return true;
        }
        return false;
    }
}