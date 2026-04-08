<?php
// Este script cria o banco e as tabelas automaticamente
$host = "localhost";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    
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

    echo "Banco de dados e tabelas configurados com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}