<?php

namespace Alura\Controller;
use PDO;

class AuthController implements Controller
{   
    private PDO $pdo;
    public function __construct()
    {
        $db_path = __DIR__ . '/../../banco.sqlite';
        $this->pdo = new PDO("sqlite:$db_path");
    }
    public function login(): void
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

    public function registerView(): void
    {
        
        if(array_key_exists('logado', $_SESSION)){
            if($_SESSION['logado'] === true){
                header('Location: /');
                return;
            }
        }elseif(array_key_exists('logado', $_SESSION)){
            if($_SESSION['logado'] === false){
                header('Location: /login');
                return;
            }
        }
        
        require_once __DIR__ . '/../../views/register-form.php';
    }

    public function register(): void {
        $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL) ;
        $password =  filter_input(INPUT_POST,'password');
        $password1 =  filter_input(INPUT_POST,'password1');
        
        if($password !== $password1){
            header('Location: /login?sucesso=0');
            return;
        }
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = 'INSERT INTO users (email,password1) VALUES (?,?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$email);
        $statement->bindValue(2,$hashedPassword);
        $statement->execute();
        
        header('Location: /login?sucesso=1');
    }

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

    public function logout(): void
    {
        session_destroy();
        header('Location: /login');
    }
}