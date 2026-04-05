<?php
require '../config/conexao.php';

//formulario de cadastro de produto
if (isset($_POST['nome']) && !isset($_POST['excluir_produto'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $fornecedor = $_POST['fornecedor'];
    $url_imagem = $_POST['url_imagem'];

    $sql = "INSERT INTO produtos (name, preço, fornecedor_id, url_imagem) 
            VALUES (:nome, :preco, :id_forn, :url)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':preco' => $preco,
        ':id_forn' => $fornecedor,
        ':url' => $url_imagem
    ]);

    header('Location: products.php');
    exit();
}

//formulario de exclusão de produto
if (isset($_POST['excluir_produto'])) {
    $id = $_POST['idProdutoExcluir'];

   if (!empty($id)) {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    header('Location: products.php');
    exit();
}
?>