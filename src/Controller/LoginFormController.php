<?php

namespace Alura\Controller;
use PDO;
class LoginFormController implements Controller
{ 
    
    public function processaRequisicao(): void
    {   
        
        if(array_key_exists('logado', $_SESSION)){
            if($_SESSION['logado'] === true){
                header('Location: /');
                return;
        }}elseif(array_key_exists('logado', $_SESSION)){
            if($_SESSION['logado'] === false){
                header('Location: /login');
                return;
        }
        
    }
    require_once __DIR__ . '/../../views/login-form.php';
}
}   