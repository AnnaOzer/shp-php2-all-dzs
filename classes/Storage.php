<?php

class Storage
    implements Countable, Iterator
{
    private  $__data = [];

    public function  __set($name, $value)
    {
        $this->__data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->__data[$name];
    }

    public function count()
    {
        return count($this->__data);
    }

    public function current()
    {
        return current($this->__data);
    }

    public function next()
    {
        return next($this->__data);
    }


    public function key()
    {
        return key($this->__data);
    }


    public function valid()
    {
        return null !== key($this->__data);
    }

    public function rewind()
    {
        return reset($this->__data);
    }
}