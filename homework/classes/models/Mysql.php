<?php

class Mysql extends mysqli
{
    private bool $connected;

    public function __construct($hostname, $username, $password, $database)
    {
        parent::__construct($hostname, $username, $password, $database);

        if ($this->connect_errno) {
            $this->connected = false; 
        } else {
            $this->connected = true; 
        }
    }

    public function isConnected()
    {
       return $this->connected;
    }

    public function getResult($query)
    {
        $result = $this->query($query);

        if(empty($result)){
            return false;
        }

        $data = [];
        if ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

}

$db = new Mysql('localhost', 'root', 'root', 'reviews');

if ($db->isConnected()) {
    $result = $db->getResult("SELECT * FROM articles");

    if ($result !== false) {
        print_r($result); 
    } else {
        echo "Ошибка выполнения запроса.";
    }
} else {
    echo "Не удалось подключиться к базе данных.";
}