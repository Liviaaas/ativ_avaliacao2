<?php
session_start();

require_once('classes/User.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$user = new User($db);

if(isset($_POST['logar'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if($user->logar($nome, $senha)){
        $_SESSION['nome'] = $nome;

        header("Location: dashboard.php");
        exit();
    }else{
        print "<script> alert ('Login inválido')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    
    <div class="form-container">
        
    <form method="POST">
    <h1>Login</h1><br>

        <label for="Nome">Nome de usuário</label>
        <input type="text" name="nome" placeholder="Digite seu nome" required>

        <label for="Senha">Senha</label>
        <input type="password" name="senha" placeholder="Digite sua senha" minlength = "8" required>

        <button type="submit" name="logar">Logar</button>
</form>
    <a href="cadastrar.php">Clique aqui para cadastrar-se</a>
    </div>

</body>
</html>