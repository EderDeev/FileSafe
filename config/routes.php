<?php
declare(strict_types=1);

use Alura\Controller\ArquivoDeleteController;
use Alura\Controller\ArquivoDownloadController;
use Alura\Controller\ArquivoListController;
use Alura\Controller\EditDocumentController;
use Alura\Controller\FormController;
use Alura\Controller\NewArquivoController;
use Alura\Controller\AuthController;
use Alura\Controller\RelatorioController;


return [
    'GET|/' => ArquivoListController::class,
    'GET|/novo-documento' => FormController::class,
    'POST|/novo-documento' => NewArquivoController::class,
    'GET|/excluir-documento' => ArquivoDeleteController::class,
    'GET|/editar-documento' => FormController::class,
    'POST|/editar-documento' => EditDocumentController::class,
    'GET|/download-documento' => ArquivoDownloadController::class,
    'GET|/login' => [AuthController::class,'processaRequisicao'],
    'POST|/login' => [AuthController::class,'login'],
    'GET|/logout' => [AuthController::class,'logout'],
    'GET|/register' => [AuthController::class,'registerView'],
    'POST|/register' => [AuthController::class,'register'],
    'GET|/relatorio-documento' => RelatorioController::class,
];