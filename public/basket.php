<?php
require_once '../config/conexao.php';

$query = $pdo->query("SELECT cesta_itens.*, produtos.name, produtos.preço 
                      FROM cesta_itens 
                      JOIN produtos ON cesta_itens.produto_id = produtos.id");
$itensCesta = $query->fetchAll(PDO::FETCH_ASSOC);

$totalGeral = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class = "container py-5">
        <h1 style = "color:#1e3a5f; font-size:35px">Resumo da Cesta</h1>
    </div>

    <?php if (empty($itensCesta)): ?>
        <div class="text-center py-5">
            <i class="fas fa-shopping-basket fa-3x mb-3" style="color: #ccc;"></i>
            <p class="mb-4">Nenhum item adicionado à cesta.</p>
            <a href="showcase.php" class="btn btn-primary" style="background-color: #1e3a5f;">Voltar para a Vitrine</a>
        </div>
    <?php else: ?>
            <table class="table table-hover align-middle">
                 <thead class="table-light">
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Subtotal</th>
                        <th>Ações</th>
                    </tr>
                 </thead>
                    <tbody>
                        <?php foreach ($itensCesta as $item): 
                            $subtotal = $item['preço'] * $item['quantidade'];
                            $totalGeral += $subtotal;
                        ?>
                            <tr>
                                <td class="fw-bold"><?= $item['name'] ?></td>
                                <td><?= $item['quantidade'] ?></td>
                                <td>R$ <?= number_format($item['preço'], 2, ',', '.') ?></td>
                                <td class="fw-bold text-primary">R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger btn-sm" type="button"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalRemoverItem" 
                                            data-bs-id="<?= $item['id'] ?>" 
                                            data-bs-nome="<?= $item['name'] ?>">
                                            <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>

                <div class="d-flex justify-content-between align-items-center mt-4 p-3 bg-light rounded">
                    <h4 class="fw-bold mb-0">Total do Pedido:</h4>
                    <h3 class="fw-bold text-success mb-0">R$ <?= number_format($totalGeral, 2, ',', '.') ?></h3>
                </div>

                   <div class="mt-4 text-end">
                        <a href="showcase.php" class="btn btn-outline-secondary">Continuar Comprando</a>
                            <button class="btn btn-success fw-bold px-4">Finalizar Compra</button>
                    </div>
                <?php endif; ?>
            </div>
                        
                <!-- Modal Remover Item da Cesta -->
                <div class="modal fade" id="modalRemoverItem" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="basket_action.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title">Remover da Cesta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Deseja remover o item <strong id="nomeItemRemover"></strong> da sua cesta?</p>       
                                    <input type="hidden" name="id_cesta" id="idItemRemover">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="remover_item" class="btn btn-danger">Remover</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            const modalRemover = document.getElementById('modalRemoverItem');
            modalRemover.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-bs-id');
                const nome = button.getAttribute('data-bs-nome');

                modalRemover.querySelector('#idItemRemover').value = id;
                modalRemover.querySelector('#nomeItemRemover').textContent = nome;
            });
        </script>

</body>
</html>