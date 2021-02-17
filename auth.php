<?php
/***********************************************************
 * 
 *  Скрипт авторизации by MIMBOL
 *  Тип авторизации: JSON
 *  Лаунчер: Sashok KeeperJerry >1.5 | Gravit Launcher < 4.0
 *  Версия: 1.2
 *  Поддержка: WebMCR , DLE , Самопис
 *  Хэши: BCrypt , MD5
 *
*************************************************************/
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


  $mysql = new mysqlo(
    $config['database']['ip'],
    $config['database']['user'],
    $config['database']['password'],
    $config['database']['dbname']
);
$config = [
    'additions' => [
        'type_ban' => 0,                           // 0 - Отключена, 1 - Столбец у юзера, 2 - Отдельная таблица     Какая у вас система банов? 
        'er' => 0,                                 // 0 - Нет, 1 - Да                                               Выводить ли причину бана?
        'type_whi' => 0,                           // 0 - Отключена, 1 - Столбец у юзера, 2 - Отдельная таблица     Какая у вас система вайтлиста? 
    ],                                             
    'database'=>[                                        // База данных
        'user' => "",                              //                             
        'password' => "",                          //
        'ip' => "",                                 
        'dbname' => ""
    ],
    'passwords'=>[                           
        'system' => 0,                             // 0 - WebMCR , 1 - DLE , 2 - Другая       Какая у вас CMS?
        'dle' => 0,                                // 0 - 11.1 и меньше, 1 - 11.2 и выше                            Какая у вас версия DLE? (Если у вас не DLE не трогайте)
        'other_hash' => 0,                         // 0-MD5, 1-Double MD5, 2-md5(pass+salt),3-md5(md5(pass)+salt)   Какой у вас хэш пароля? (Если у вас DLE или WebMCR не трогайте)
    ],
    'table' => [                
        'name' => "",           
        'username' => '',
        'salt' => '',       
        'password' => '',
        'email' => '',      
        'ban' => '',                                          
    ],
    'ban' =>  [
        'username' => '',
        'reason' => '',
        'time' => ''
    ],
    'mess' =>[
        'pass' => 'Неверный логин или пароль!',
        'ban' => 'Извините, но вы забанены по причине:',
        'mysql' => 'Ошибка MySQL, обратитесь к админам',
        'tech' => 'Лаунчер закрыт на тех. работы',
        'white' => 'Вы не добавлены в вайтлист',
        'unkown' => 'Неизвестная ошибка!'
    ]                    
];



foreach($config as $k => $v){

}

$u = $_POST['user'];
$p = $_POST['pass'];

$q = $mysql->query("SELECT * FROM ".$config['table']['name']." WHERE ".$config['table']['username']." = :u",['u' => $u]);
switch($config['password']['system']){
    case 0:

}

