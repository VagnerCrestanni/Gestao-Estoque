<?php
include_once '../config/conexao.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    
</head>
<body class="bg-login">

    <div class="login-card p-5 shadow">
    <div>
        <form id="login-form" action = "login.php" method = "POST">
        <h1 class="fw-bold" style="color: #1e3a5f;">Gestão de Estoque</h1>
        <p class="text-muted"> Faça login para continuar</p>

    <div class = "mb-3">
        <label class="form-label fw-bold text-dark" for = "email"> E-mail: </label>
        <input type = "email" name = "email" id= "email" class ="form-control" placeholder = "seu@gmail.com" required>
    </div>

    <div class = "mb-3">
        <label class="form-label fw-bold text-dark" for = "password"> Senha: </label>
        <input type = "password" name = "password" id= "password" class ="form-control" placeholder = "Digite sua Senha" required>
    </div>

        <button type="submit" class="btn w-100 py-2 mt-2" style="background-color: #1e3a5f; color: white; border: none;"
        >Acessar
    </button>
 </form>
</div>
<script src="js/script.js"></script>
</body>
</html>