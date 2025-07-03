<?php

use Alura\Repository\DocumentRepository;
$db_path = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$db_path");
$documentRepository = new DocumentRepository($pdo);

$documentList = $this->documentRepository->all();
$dados = array();
foreach( $documentList as $document){
$dados[] = $document;
};

header('Content-Type: application/json');
echo json_encode(["data" => $dados]);