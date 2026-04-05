<?php
require '../config/conexao.php';

//formulario de cadastro de fornecedor
if (isset($_POST['new_supplier'])) {
    $name = trim($_POST['nameSupplier']);
    $cnpj = trim($_POST['cnpjSupplier']);

    $sql = "INSERT INTO fornecedores (name, cnpj) VALUES (:name, :cnpj)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':cnpj', $cnpj);
    $stmt->execute();
        header("Location: suppliers.php");
        exit();
}

//formulario de edição de fornecedor
if (isset($_POST['update_supplier'])) {
    $id = $_POST['idFornecedorEditar'];
    $name = trim($_POST['nameSupplierEdit']??'');
    $cnpj = trim($_POST['cnpjSupplierEdit']??'');

try { 
    $sql = "UPDATE fornecedores SET name = :name, cnpj = :cnpj WHERE idFornecedores = :id";
    $stmt = $pdo-> prepare($sql);
    if (!$stmt) {
         die("Erro ao preparar o SQL. Verifique os nomes das colunas no banco.");
    }
    $stmt-> bindParam(':name', $name);
    $stmt-> bindParam(':cnpj', $cnpj);
    $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt-> execute();
        header("Location: suppliers.php");
        exit();
    }catch (PDOException $e) {
        echo "Erro no banco de dados: " . $e->getMessage();
        exit();
    }
}

//formulario de exclusão de fornecedor
if (isset($_POST['delete_supplier'])) {
    $id = $_POST['idFornecedorExcluir'];

    $sql = "DELETE FROM fornecedores WHERE idFornecedores = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
        header("Location: suppliers.php");
        exit();
}
?>