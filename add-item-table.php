<?php

//$server = 'SRV';
//$dbName = 'produtos';
//$uid = 'sa';
//$pwd = '##tronca!@34';
//$pdo = new PDO("sqlsrv:Server=$server; database = $dbName", $uid, $pwd);
$db_path = __DIR__ .'/banco.sqlite';
$pdo = new PDO("sqlite:$db_path");
$pdo->exec("INSERT INTO itens(id,nome_item) values(37,'3.3.5.2 - Suporte técnico e relatórios específicos');");
echo 'sucess';