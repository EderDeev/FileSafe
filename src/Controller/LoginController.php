<?php

namespace Alura\Controller;
use PDO;

class LoginController implements Controller
{   
    private PDO $pdo;
    public function __construct()
    {
        $db_path = __DIR__ . '/../../banco.sqlite';
        $this->pdo = new PDO("sqlite:$db_path");
    }
    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL) ;
        $password =  filter_input(INPUT_POST,'password');
        
        
        $sql = 'SELECT * FROM users where email = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$email);
        $statement->execute();      

        $result = $statement->fetch(PDO::FETCH_ASSOC);
       
        $correctPassword = password_verify($password,$result['password1'] ?? '');
        
        
        $_SESSION['logado'] = false;
        if($correctPassword){
            $_SESSION['logado'] = true;
            header('Location: /');
            return;
        }else{
            header('Location: /login?sucesso=0');
            return;
        }
        
        
    }
}