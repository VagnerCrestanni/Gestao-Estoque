<?php
require_once '../config/conexao.php';
$queryForn = $pdo->query("SELECT idfornecedores, name FROM fornecedores ORDER BY name ASC");
$listaFornecedores = $queryForn->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 style = "color:#1e3a5f; font-size:35px">Gestão de Produtos</h1>
        </div>
    
      <div class ="container">
        <div class = "row">
            <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4" style="color: #33475b;">Adicionar Produto</h4>
        
        <form action="produce_product.php" method="POST">
            <div class="mb-3">
                <label class="form-label fw-semibold">Nome</label>
                <input type="text" name="nome" id="nomeProduto" class="form-control" placeholder="Nome do produto">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Preço (R$)</label>
                <input type="number" name="preco" id="precoProduto" step="0.01" class="form-control" placeholder="0.00">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Fornecedor</label>
                <select name="fornecedor" id="fornecedorProduto" class="form-control form-select" required>
                    <option value=""selected disabled>Selecione..</option>
                    <?php foreach ($listaFornecedores as $f): ?>
                        <option value="<?= $f['idfornecedores'] ?>"><?= $f['name'] ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
           
            <div class="mb-3">
                <label class="form-label fw-semibold">URL da Imagem (opcional)</label>
                <input type="text" name="url_imagem" class="form-control" placeholder="https://...">
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold py-2" style="background-color: #1e3a5f; border: none;">
                Adicionar Produto
            </button>
        </form>
    </div>
</div>
</div>

    <?php
    $query = $pdo->query("SELECT produtos.*, fornecedores.name as nome_fornecedor 
                      FROM produtos 
                      LEFT JOIN fornecedores ON produtos.fornecedor_id = fornecedores.idfornecedores 
                      ORDER BY produtos.id DESC");
    $produtos = $query->fetchAll(PDO::FETCH_ASSOC);
    ?>
        
    <div class="col-md-8">
        <div class="card shadow-sm border-0"> <div class="card-body p-0">
            <h4 class="fw-bold mb-4" style="color: #33475b;"> Produtos Cadastrados </h4>
              <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th> ID </th>
                        <th> Nome </th>
                        <th> Preço (R$) </th>
                        <th> Fornecedor </th>
                        <th> Ações </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td class="fw-bold"><?= $p['name'] ?></td>
                        <td> <?= number_format($p['preço'], 2, ',', '.') ?> </td>
                        <td> <?= $p['nome_fornecedor'] ?> </td>
                        <td class="text-center">

                            <button class="btn btn-outline-danger btn-sm" type="button"
                              data-bs-toggle = "modal" 
                              data-bs-target="#modalExcluirProduto"
                              data-bs-id="<?= $p['id'] ?>" 
                              data-bs-nome="<?= $p['name'] ?>" title="Excluir">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                </div>
              </div>
            </div>
    </div>

    <!-- Modal Excluir Produto -->                    
    <div class="modal fade" id="modalExcluirProduto" tabindex="-1" aria-labelledby="modalExcluirProdutoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="produce_product.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExcluirProdutoLabel">Excluir Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir o produto "<span id="nomeProdutoModal"></span>"?</p>
                    <input type="hidden" name="idProdutoExcluir" id="idProdutoExcluir">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="excluir_produto" class="btn btn-danger" id="btnExcluirProduto">Confirmar Exclusão</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script> //script para Excluir Produto
    const modalExcluirProd = document.getElementById('modalExcluirProduto');
modalExcluirProd.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-bs-id');
    const nome = button.getAttribute('data-bs-nome');

    modalExcluirProd.querySelector('#idProdutoExcluir').value = id;
    modalExcluirProd.querySelector('#nomeProdutoModal').textContent = nome;
});
</script>
</body>
</html>