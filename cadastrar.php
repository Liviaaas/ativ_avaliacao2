<?php

    require_once('classes/User.php');
    require_once('conexao/conexao.php');

    $database = new Conexao();
    $db = $database->getConnection();
    $user = new User($db);

    if (isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confSenha = $_POST['confSenha'];

        if($user->cadastrar($nome, $email, $senha, $confSenha)){
            print "<script>alert ('Cadastro feito com sucesso! ')</script>";
            print "<script> location.href='?action=read'; </script>";
        }else{
            echo"Erro ao se cadastrar!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastro</title>
</head>
<body>
<div class="form-container">
    <form method="POST">
    <label for="">Nome de usuario</label>
        <input type="text" name="nome" placeholder="Insira o nome de usuario" required>
        <label for="">E-mail</label>
        <input type="email" name="email" placeholder="Insira um E-mail" required>
        <label for="">Senha</label>
        <input type="password" name="senha" placeholder="Insira uma senha" minlength = "8" required>
        <label for="">Confirmar senha</label>
        <input type="password" name="confSenha" placeholder="Confirme sua senha" minlength = "8" required>

        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
    <a href="index.php">Voltar para o Login</a>
</div>
</body>
</html>