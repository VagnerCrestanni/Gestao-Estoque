<?php
require '../config/conexao.php';

// Consulta para obter os produtos com o nome do fornecedor
$query = $pdo->query("SELECT produtos.*, fornecedores.name as nome_fornecedor 
                      FROM produtos 
                      LEFT JOIN fornecedores ON produtos.fornecedor_id = fornecedores.idfornecedores 
                      ORDER BY produtos.id DESC");
$produtos = $query->fetchAll(PDO::FETCH_ASSOC);

$query_count = $pdo->query("SELECT COUNT(*) as total FROM cesta_itens");
$contagem = $query_count->fetch(PDO::FETCH_ASSOC);
$total_itens = $contagem['total'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitrine</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 style = "color:#1e3a5f; font-size:35px">Vitrine de Seleção</h1>

            <a href="basket.php" class="btn btn-custom mb-4"
                style="background-color: #1e3a5f; color: white; border: none; font-weight: bold;">
                <i class="fas fa-shopping-basket"></i> Ver Cesta (<?= $total_itens ?>)
            </a>
        </div>
    </div>
    
    <div class ="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php foreach ($produtos as $p): ?>
            <div class = "col">
                <div class = "card h-100 shadow-sm border-0 position-relative">
                    <input type = "checkbox" class = "form-check-input border-primary position-absolute top-0 end-0 m-2"
                        style = "transform: scale(2);">
                    <img src="<?= $p['url_imagem'] ?>" class="card-img-top img-fluid rounded-top" 
                    alt="<?= $p['name'] ?>" style="height: 200px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $p['name'] ?></h5>

                        <p class="text-muted small mb-1"> Fornecedor: <?= $p['nome_fornecedor'] ?? 'Não Informado' ?></p>

                        <h4 class="fw-bold text-primary">R$ <?= number_format($p['preço'], 2, ',', '.') ?></h4> 

                        <a href="basket_action.php?acao=adicionar&id=<?= $p['id'] ?>" class="btn btn-outline-primary w-100 mt-3 fw-bold">
                            <i class="fas fa-cart-plus"></i> Adicionar à Cesta
                        </a>
                    </div>    
                </div>
            </div>  
            <?php endforeach; ?> 
        </div>
    </div>

</body>
</html>