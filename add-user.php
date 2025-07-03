<?php

$db_path = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$db_path");
$id = '31';
$email = 'eder.dev2@gmail.com';
$password = '12345';

$hash = password_hash($password,PASSWORD_ARGON2ID);

$statement =$pdo->prepare('INSERT INTO users(id,email,password1) values(?,?,?)');
$statement->bindValue(1,$id);
$statement->bindValue(2,$email);
$statement->bindValue(3,$hash);
$statement->execute();
echo 'sucess';



