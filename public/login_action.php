<?php
require_once '../config/conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM user_login WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['password'])) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['username'];
        $_SESSION['logado'] = true;

        header("Location: dashboard.php");
        exit();
    } else {
        
        header("Location: index.php?erro=invalido");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}