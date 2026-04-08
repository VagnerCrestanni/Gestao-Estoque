<?php
require '../config/conexao.php';
session_start();

// Lógica para adicionar item à cesta
if (isset($_GET['acao']) && $_GET['acao'] == 'adicionar') {
    $produto_id = $_GET['id'];
    
    $sql = "INSERT INTO cesta_itens (produto_id, quantidade) VALUES (:p_id, 1)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':p_id' => $produto_id]);

    header("Location: basket.php");
    exit();
}

// Lógica para remover item da cesta
if (isset($_POST['remover_item'])) {
    $id_cesta = $_POST['id_cesta'];

    $sql = "DELETE FROM cesta_itens WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id_cesta]);

    header("Location: basket.php");
    exit();
}
?>