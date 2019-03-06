<?php
$mysql_conf = array(
    'host'    => '127.0.0.1:3306', 
    'db'      => 'cookie', 
    'db_user' => 'root', 
    'db_pwd'  => 'vv', 
    );
$pdo = new PDO("mysql:host=" . $mysql_conf['host'] . ";dbname=" . $mysql_conf['db'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
$pdo->exec("set names 'utf8'");

?>