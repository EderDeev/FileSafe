<?php

$db_path = __DIR__ .'/banco.sqlite';
$pdo = new PDO("sqlite:$db_path");

//$server = 'SRV';
//$dbName = 'produtos';
//$uid = 'sa';
//$pwd = '##tronca!@34';
//$pdo = new PDO("sqlsrv:Server=$server; database = $dbName", $uid, $pwd);


$pdo->exec('CREATE TABLE arquivo(
id INTEGER PRIMARY KEY,
item TEXT,
cod_doc TEXT,
title TEXT,
data_entrega TEXT,
carta_envio TEXT,
validacao TEXT,
archive_name TEXT
);');

echo 'sucess';