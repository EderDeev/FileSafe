<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
       
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="/public//img//favicon.ico" type="image/x-icon">
    <style>
        /* ESTILOS DO HEADER */



.logo {
    background-image: url(../img/cabecalho/Logo.jpeg);
    background-repeat: no-repeat;
    padding: 34px 117px;
    margin: 10px;
    cursor: pointer;
    background-size: cover;
    
}

p{
    padding-right: 120px;
    font-family: Times New Roman,Arial, sans-serif;
    font-size: 30px;
}

.cabecalho__sair {
    margin: 0 20px;
    padding: 5px 10px;
    border-radius: 10%;
    background-color: var(--azul-escuro);

}
/* Aula 1 */
.cabecalho {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav{
    background-color: white; 
    top: 0;
    height: 100px;
    width: 100vw; 
    z-index: 2;
  }
  .cabecalho__sair {
    margin: 0 20px;
    padding: 5px 10px;
    border-radius: 10%;
    background-color: var(--azul-escuro);

}
    </style>
</head>

<header>
    <nav class="cabecalho">
        
        <a class="logo" href="/"></a>
        <p>Produtos do Contrato</p>

        <div class="cabecalho__icones">
            
            <a href="/logout" class="cabecalho__sair">Sair</a>
        </div>
    </nav>
</header>