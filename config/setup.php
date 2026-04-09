<?php
// Este script cria o banco e as tabelas automaticamente
$host = "127.0.0.1";
$port = 3307;
$user = "root";
$pass = ""; 

try {
    $pdo = new PDO("mysql:host=$host;port=$port", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Cria o Banco
    $pdo->exec("CREATE DATABASE IF NOT EXISTS sistema_estoque");
    $pdo->exec("USE sistema_estoque");

    // Cria Tabela Fornecedores
    $pdo->exec("CREATE TABLE IF NOT EXISTS fornecedores (
        idfornecedores INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    )");

    // Cria Tabela Produtos
    $pdo->exec("CREATE TABLE IF NOT EXISTS produtos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        preço DECIMAL(10,2) NOT NULL,
        url_imagem TEXT,
        fornecedor_id INT,
        FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(idfornecedores)
    )");

    // Cria Tabela Cesta
    $pdo->exec("CREATE TABLE IF NOT EXISTS cesta_itens (
        id INT AUTO_INCREMENT PRIMARY KEY,
        produto_id INT,
        quantidade INT DEFAULT 1,
        FOREIGN KEY (produto_id) REFERENCES produtos(id)
    )");

    //Cria Tabela de Usuários para Login
    $pdo->exec("CREATE TABLE IF NOT EXISTS user_login (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    )");

    $emailPadrao = 'admin@admin.com';
    $checkUser = $pdo->prepare("SELECT id FROM user_login WHERE email = ?");
    $checkUser->execute([$emailPadrao]);

    if ($checkUser->rowCount() == 0) {
        $senhaHash = password_hash('1234', PASSWORD_DEFAULT); // Aqui criamos o hash!
        $sql = "INSERT INTO user_login (username, email, password) VALUES ('Administrador', ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$emailPadrao, $senhaHash]);
        echo "Usuário padrão criado (admin@admin.com / 1234).<br>";
    }

    echo "Banco de dados e tabelas configurados com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}