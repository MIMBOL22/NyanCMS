<?php
  class mysqlo{
    public $connection;
    function __construct(string $ip,string $l,string $p,string $db){
      try {
        $this->connect = new PDO("mysql:dbname=$db;host=$ip;charset=utf8;" , $l, $p);
      
      } catch (PDOException $exception) {
        die('Ошибка подключения Базы Данных: ' . $exception->getMessage());
      }
    }
    function startsWith ($string, $startString){
     $len = strlen($startString);
     return (substr($string, 0, $len) === $startString);
    }
    function query(string $sql, array $parameters){
     $statement = $this->connect->prepare($sql);
     $newParameters = [];
     foreach ($parameters as $key => $value) {
        if (! $this->startsWith($key, ':')) {
            $newParameters[':' . $key] = $value;
        } else {
              $newParameters[$key] = $value;
          }
     }
     $statement->execute($newParameters);
     if (false !== stripos($sql, 'SELECT')) 
        return $statement->fetch(PDO::FETCH_ASSOC);
     return [];
    }
    function table($sql,$parameters){
      $statement = $this->connect->prepare($sql);
      $newParameters = [];
     foreach ($parameters as $key => $value) {
        if (! $this->startsWith($key, ':')) {
            $newParameters[':' . $key] = $value;
        } else {
              $newParameters[$key] = $value;
          }
     }
     $statement->execute($newParameters);
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
  }
  