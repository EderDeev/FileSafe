<?php
declare(strict_types=1);

use Alura\Controller\ArquivoDeleteController;
use Alura\Controller\ArquivoDownloadController;
use Alura\Controller\ArquivoListController;
use Alura\Controller\EditDocumentController;
use Alura\Controller\FormController;
use Alura\Controller\NewArquivoController;
use Alura\Controller\LoginFormController;
use Alura\Controller\LoginController;
use Alura\Controller\LogoutController;
use Alura\Controller\RelatorioController;


return [
    'GET|/' => ArquivoListController::class,
    'GET|/novo-documento' => FormController::class,
    'POST|/novo-documento' => NewArquivoController::class,
    'GET|/excluir-documento' => ArquivoDeleteController::class,
    'GET|/editar-documento' => FormController::class,
    'POST|/editar-documento' => EditDocumentController::class,
    'GET|/download-documento' => ArquivoDownloadController::class,
    'GET|/login' => LoginFormController::class,
    'POST|/login' => LoginController::class,
    'GET|/logout' => LogoutController::class,
    'GET|/relatorio-documento' => RelatorioController::class,
];