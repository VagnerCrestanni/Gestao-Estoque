<?php
$host = 'Localhost';
$user = 'root';
$pass = '';
$dbname = 'sistema_estoque';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");

    $tabelaUsuarios = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        email VARCHAR(100) UNIQUE,
        senha VARCHAR(64)
    )";
    $pdo->exec($tabelaUsuarios);
    echo "Conexão e configuração do banco de dados realizadas com sucesso!";

} catch(PDOException $e) {
     echo "Erro na conexão ou criação: " . $e->getMessage();
}

?>