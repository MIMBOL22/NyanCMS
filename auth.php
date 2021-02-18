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


$config = [
	'additions' => [                                                        //
		'type_ban' => 0,                                // 0 - Отключена, 1 - Столбец у юзера, 2 - Отдельная таблица              Какая у вас система банов?
		'er' => 0,                                      // 0 - Нет, 1 - Да                                                        Выводить ли причину бана?
		'type_whi' => 0,                                // 0 - Отключена, 1 - Столбец у юзера, 2 - Отдельная таблица              Какая у вас система вайтлиста?
	],
	'database' => [                                                           // База данных
		'user' => "root",                               //
		'password' => "",                               //
		'ip' => "localhost",                            //
		'dbname' => "gimnaziya"                         //
	],
	'password' => [                                                           //
		'system' => 2,                                  // 0 - WebMCR , 1 - DLE , 2 - Другая                                      Какая у вас CMS?
		'dle' => 0,                                     // 0 - 11.1 и меньше, 4 - 11.2 и выше                                     Какая у вас версия DLE? (Если у вас не DLE не трогайте)
		'webmcr' => 1,                                  // 0-MD5, 1-Double MD5, 3-md5(md5(pass)+salt)                             Какой у вас хэш пароля? (Меняйте только если у вас WebMCR)
		'other_hash' => 2,                              // 0-MD5, 1-Double MD5, 2-md5(pass+salt),3-md5(md5(pass)+salt),4-bcrypt   Какой у вас хэш пароля? (Если у вас DLE или WebMCR не трогайте)
	],
	'table' => [                                                            //
		'name' => "users",                              //
		'username' => 'username',                       //
		'salt' => 'salt',                               //
		'password' => 'password',                       //
		'email' => 'email',                             //
		'ban' => '',                                    //
	],
	'ban' => [                                                             //
		'name' => '',                                   //
		'username' => '',                               //
		'reason' => '',                                 //
		'time' => ''                                    //
	],
	'mess' => [                                                              //
		'pas' => 'Неверный логин или пароль!',          //
		'ban' => 'Извините, но вы забанены по причине:',//
		'adm' => 'Ошибка, обратитесь к админам',        //
		'teh' => 'Лаунчер закрыт на тех. работы',       //
		'wht' => 'Вы не добавлены в вайтлист',          //
		'unk' => 'Неизвестная ошибка!'                  //
	]
];

define('ban', 'ban');
define('pas', 'pas');
define('adm', 'adm');
define('teh', 'teh');
define('wht', 'wht');
define('unk', 'unk');

class mysqlo
{
	private $connection;

	function __construct(string $ip, string $l, string $p, string $db)
	{
		try {
			$this->connect = new PDO("mysql:dbname=$db;host=$ip;charset=utf8;", $l, $p);

		} catch (PDOException $exception) {
			die('Ошибка подключения Базы Данных: ' . $exception->getMessage());
		}
	}

	function startsWith($string, $startString)
	{
		$len = strlen($startString);
		return (substr($string, 0, $len) === $startString);
	}

	function query(string $sql, array $parameters)
	{
		$statement = $this->connect->prepare($sql);
		$newParameters = [];
		foreach ($parameters as $key => $value) {
			if (!$this->startsWith($key, ':')) {
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

	function table($sql, $parameters)
	{
		$statement = $this->connect->prepare($sql);
		$newParameters = [];
		foreach ($parameters as $key => $value) {
			if (!$this->startsWith($key, ':')) {
				$newParameters[':' . $key] = $value;
			} else {
				$newParameters[$key] = $value;
			}
		}
		$statement->execute($newParameters);
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
}

function err(string $mess)
{
	//die(json_encode(['error' => $GLOBALS['config']['mess'][$mess]]));
	die($GLOBALS['config']['mess'][$mess]);
}

$mysql = new mysqlo(
	$config['database']['ip'],
	$config['database']['user'],
	$config['database']['password'],
	$config['database']['dbname']
);

$u = $_GET['user'];
$p = $_GET['pass'];

function cp($pass, $hash, $type, $salt = null)
{
	switch ($type) {
		case 0:
			return md5($pass) == $hash;
			break;
		case 1:
			return md5(md5($pass)) == $hash;
			break;
		case 2:
			return md5($pass . $salt) == $hash;
			break;
		case 3:
			return md5(md5($pass) . $salt) == $hash;
			break;
		case 4:
			return password_verify($pass, $hash);
			break;
	}
}

switch ($config['password']['system']) {
	case 0:
		$q = $mysql->query("SELECT * FROM mcr_users WHERE login = :u", ['u' => $u]);
		$res = cp($p, $q['password'], $config['password']['webmcr'], $q['salt']);
		break;
	case 1:
		$q = $mysql->query("SELECT * FROM dle_users WHERE name = :u", ['u' => $u]);
		$res = cp($p, $q['password'], $config['password']['dle'], $q[$config['table']['salt']]);
		break;
	case 2:
		$q = $mysql->query("SELECT * FROM " . $config['table']['name'] . " WHERE " . $config['table']['username'] . " = :u", ['u' => $u]);
		$res = cp($p, $q[$config['table']['password']], $config['password']['other_hash'], $q[$config['table']['salt']]);
		break;
}
if ($res == false) {
	err(pas);
}
if ($config['additions']['type_ban'] == 1) {
	if ($q[$config['table']['ban']] == 1)
		err(ban);
} else if ($config['additions']['type_ban'] == 2) {
	$qb = $mysql->query("SELECT * FROM " . $config['ban']['name'] . " WHERE " . $config['table']['user'] . " = :u", ['u' => $u]);
	if ($qb != "" && $q[$config['ban']['time']] < time()) {
		err(ban);
	}
}


var_dump($res);
