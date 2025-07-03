<?php


$db_path = __DIR__ .'/banco.sqlite';
$pdo = new PDO("sqlite:$db_path");

$pdo->exec('CREATE TABLE itens(
  id INTEGER PRIMARY KEY,
  nome_item TEXT
); ');

echo 'sucess';