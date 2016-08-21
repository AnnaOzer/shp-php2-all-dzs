<?php

class Storage
    implements Countable, Iterator
{
    protected $data;

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public  function __get($k)
    {
        return $this->data[$k];
    }

        public function count()
    {
        return count($this->data);
    }

    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return null!==key($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }
}
/////////////////////////
/*
$obj = new Storage();

$obj->foo = '123';
$obj->bar = '456';
$obj->baz = [1,2,3];

assert('123' == $obj->foo);

assert(3 == count($obj));

foreach ($obj as $key=>$val) {
    echo $key . '=' . $val;
    echo '<br />';
}
*/
//////////////////////////

class View
extends Storage
{
    // упрощение: не пишем конструктор и задание путей
    
    public function display($template)
    {
        foreach ($this as $k=> $v)
        {
            $$k =  $v;
            // $$k переменная с тем именем, которое содержится  в $k
        }
    }
}
