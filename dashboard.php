<?php
session_start();

if(!isset($_SESSION['nome'])){
    header("Location: index.php");
    exit();
}

$nome = $_SESSION['nome'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e5caf9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url("https://th.bing.com/th/id/OIP.4xrAiPuHlpHVChIeix-8BAAAAA?pid=ImgDet&rs=1");
            background-size:cover ;
            background-position: center;

        }
        .form-container{
        border-radius: 0;
        box-shadow: 0 0 20px ;
        padding: 30px;
        margin-bottom: 20px;
        max-width: 800px;
        width: 90%;
        }

        h1 {
            color: #131313;
            text-align: center;
              
        }

        p {
            font-size: 18px;
            color: #131313;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #2b0554;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Página inicial</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Página inicial</title>
</head>
<body>
    <div class="form-container">
    <h1>Boas Vindas!</h1>
    <p>Seja bem vindo(a) <?php echo $nome;?></p>

    <a href="logout.php">Sair</a>

    </div>
</body>
</html>