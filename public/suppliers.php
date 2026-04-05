<?php
require_once '../config/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="container py-5" >
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 style = "color:#1e3a5f; font-size:35px">Gestão de Fornecedores</h1>

        <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#modalNovoFornecedor" 
        style="background-color: #1e3a5f; color: white; border: none; font-weight: bold;">
        <i class="fas fa-plus"></i> Novo Fornecedor</button>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

                <?php
                $query = $pdo->query("SELECT * FROM fornecedores ORDER BY idFornecedores DESC");
                $fornecedores = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($fornecedores as $f):
                ?>
                <tbody>
                    <tr>
                        <td><?= $f['idFornecedores'] ?></td>
                        <td><?= $f['name'] ?></td>
                        <td><?= $f['cnpj'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary me-1" title="Editar" 
                            data-bs-toggle="modal" data-bs-target="#modalEditarFornecedor"
                            data-bs-id="<?= $f['idFornecedores'] ?>" data-bs-nome="<?= $f['name'] ?>" data-bs-cnpj="<?= $f['cnpj'] ?>">
                                <i class="fas fa-edit"></i>
                                </button>

                            <button class="btn btn-sm btn-outline-danger" type="button" 
                            data-bs-toggle="modal" data-bs-target="#modalExcluirFornecedor" 
                            data-bs-id="<?= $f['idFornecedores'] ?>" data-bs-nome="<?= $f['name'] ?>" title="Excluir">
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
<!-- Modal Novo Fornecedor-->
<div class="modal fade" id="modalNovoFornecedor" tabindex="-1" aria-labelledby="modalNovoFornecedorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="action.php" method="POST">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalNovoFornecedorLabel">Novo Fornecedor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idFornecedorEditar" id="idFornecedorEditar">
        <div class="mb-3">
            <label for="nomeFornecedor" class="form-label">Nome/Razão Social</label>
            <input type="text" class="form-control" id="nameSupplierEdit" name = "nameSupplier" placeholder="Ex: Fornecedor LTDA">
        </div>
        <div class="mb-3">
            <label for="cnpjFornecedor" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpjSupplierEdit" name = "cnpjSupplier" placeholder="00.000.000/0000-00">
        </div>

      <div class="modal-footer">
        <button type="button" name = "cancel" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" name="new_supplier" class="btn btn-custom" 
        style="background-color: #1e3a5f; color: white; border: none; font-weight: bold;">
        Salvar</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>

<!-- Modal Editar Fornecedor -->
<div class="modal fade" id="modalEditarFornecedor" tabindex="-1" aria-labelledby="modalEditarFornecedorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <form action="action.php" method="POST">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditarFornecedorLabel">Editar Fornecedor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <input type="hidden" name="idFornecedorEditar" id="idFornecedorEditarEdit">
                    <div class="mb-3">
                        <label for="nomeFornecedorEditar" class="form-label">Nome/Razão Social</label>
                        <input type="text" class="form-control" id="nomeFornecedorEditar" name="nameSupplierEdit" placeholder="Nome/Razão Social">
                    </div>
                    <div class="mb-3">
                        <label for="cnpjFornecedorEditar" class="form-label">CNPJ</label>
                        <input type="text" class="form-control" id="cnpjFornecedorEditar" name="cnpjSupplierEdit" placeholder="00.000.000/0000-00">
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" name="update_supplier" class="btn btn-custom" 
                  style="background-color: #1e3a5f; color: white; border: none; font-weight: bold;">Atualizar</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Modal Excluir Fornecedor -->
<div class="modal fade" id="modalExcluirFornecedor" tabindex="-1" aria-labelledby="modalExcluirFornecedorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="action.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalExcluirFornecedorLabel">Excluir Fornecedor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir o fornecedor <strong id="nomeFornecedorExcluir"></strong>?</p>
                    <input type="hidden" name="idFornecedorExcluir" id="idFornecedorExcluir">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="delete_supplier" class="btn btn-danger">Excluir Agora</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script> //script para Editar Fornecedor
  const modalEditar = document.getElementById('modalEditarFornecedor');
  modalEditar.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-bs-id');
    const nome = button.getAttribute('data-bs-nome');
    const cnpj = button.getAttribute('data-bs-cnpj');

    document.getElementById('idFornecedorEditarEdit').value = id;
    document.getElementById('nomeFornecedorEditar').value = nome;
    document.getElementById('cnpjFornecedorEditar').value = cnpj;
  });
</script>

<script> //script para Excluir Fornecedor
const modalExcluir = document.getElementById('modalExcluirFornecedor');
modalExcluir.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget; 
    const id = button.getAttribute('data-bs-id'); 
    const nome = button.getAttribute('data-bs-nome');

    modalExcluir.querySelector('#idFornecedorExcluir').value = id;
    modalExcluir.querySelector('#nomeFornecedorExcluir').textContent = nome;
});
</script>
</body>
</html>