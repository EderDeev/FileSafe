<?php

$db_path = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$db_path");

$sql = 'CREATE TABLE users(id INTEGER PRIMARY KEY ,email TEXT,password1 TEXT)';
$pdo->exec($sql);
echo 'sucess';