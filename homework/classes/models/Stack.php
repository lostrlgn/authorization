<?php

class Stack
{
    private $data = [];

    public function isEmpty() 
    {
        return empty($this->data);
    }
    public function reset()
    {
        $this->data = [];
    }
    public function pop()
    {
        if ($this->isEmpty()) {
            return null; 
        }
        $lastElementIndex = count($this->data) - 1;
        $lastElement = $this->data[$lastElementIndex];
        unset($this->data[$lastElementIndex]);
        $this->data = array_values($this->data); 
        return "Элемент $lastElement был удален";
    }
    public function push($elem)
    {
        $this->data[] = $elem;
        return "$elem добавлен в конец списка";

    }


}