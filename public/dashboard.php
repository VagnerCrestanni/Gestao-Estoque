<?php
require '../config/conexao.php';

//Conta Total de Produtos
$queryProd = $pdo->query("SELECT COUNT(*) as total FROM produtos");
$totalProdutos = $queryProd->fetch(PDO::FETCH_ASSOC)['total'];

//Conta Total de Fornecedores
$queryForn = $pdo->query("SELECT COUNT(*) as total FROM fornecedores");
$totalFornecedores = $queryForn->fetch(PDO::FETCH_ASSOC)['total'];

// Conta Total de Itens na Cesta (Soma das quantidades ou contagem de linhas)
$queryCesta = $pdo->query("SELECT COUNT(*) as total FROM cesta_itens");
$totalCesta = $queryCesta->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

// Conta o valor total da cesta (soma dos subtotais)
$queryValorCesta = $pdo->query("SELECT SUM(cesta_itens.quantidade * produtos.preço) as total_cesta FROM cesta_itens JOIN produtos ON cesta_itens.produto_id = produtos.id");
$totalValorCesta = $queryValorCesta->fetch(PDO::FETCH_ASSOC)['total_cesta'] ?? 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistema de Estoque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p3z+3a7xuCoi4TZ+jyWqW58czb8S8gJiUF0p8CqrH9l8dH0kgE6ZbGGNls58m0CRX1ZH5+QGI76HD6LZx7c9hQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/dashboard.css">

</head>
<body class="bg-light">
    <?php include 'sidebar.php'; ?>

           <div class="container mt-5">
            <h1 class="dash-title" style= "color:#1e3a5f; font-size:35px">Dashboard</h1>

              <div class="cards">

                <div class="card-item">
                   <i class="fa-solid fa-box-open icon-card"></i>
                   <span class="value-total"><?= $totalProdutos ?></span>
                   <p class="label-card">Total de Produtos</p>
                </div>

                <div class="card-item">
                    <i class="fa-solid fa-users icon-card"></i>
                    <span class="value-total"><?= $totalFornecedores ?></span>
                    <p class="label-card">Fornecedores</p>
                </div>

                <div class="card-item">
                    <i class="fa-solid fa-cart-shopping icon-card"></i>
                    <span class="value-total"><?= $totalCesta ?></span>
                    <p class="label-card">Itens na Cesta</p>
                </div>

                <div class="card-item">
                    <i class="fa-solid fa-dollar-sign icon-card"></i>
                    <span class="value-total"><?= 'R$ ' . number_format($totalValorCesta, 2, ',', '.') ?></span>
                    <p class="label-card">Valor Total da Cesta</p>
                </div>

                </div>
            <div>
                <div class="card-notice">
                    <h2 class="notice-title">Bem vindo ao Sistema de Gestão de Estoque</h2>
                    <p class="notice-message">Utilize o menu de navegação para gerenciar fornecedores, produtos e visualizar sua cesta de compras.</p>
                </div>
    </div>
</body>
</html>