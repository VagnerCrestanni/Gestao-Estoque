//criar banco de dados para salvar os valores e depois fazer a logica no controllers

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
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tech Supplies Ltda</td>
                        <td>12.345.678/0001-90</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary me-1" title="Editar" 
                            data-bs-toggle="modal" data-bs-target="#modalEditarFornecedor">
                                <i class="fas fa-edit"></i>
                                </button>

                            <button class="btn btn-sm btn-outline-danger" type="button" 
                            data-bs-toggle="modal" data-bs-target="#modalExcluirFornecedor" title="Excluir">
                                <i class="fas fa-trash"></i>
                            </button>

                        </td>
                    </tr>
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
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalNovoFornecedorLabel">Novo Fornecedor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form>
        <div class="mb-3">
            <label for="nomeFornecedor" class="form-label">Nome/Razão Social</label>
            <input type="text" class="form-control" id="nomeFornecedor" placeholder="Ex: Fornecedor LTDA">
        </div>
        <div class="mb-3">
            <label for="cnpjFornecedor" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpjFornecedor" placeholder="00.000.000/0000-00">
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-custom" 
        style="background-color: #1e3a5f; color: white; border: none; font-weight: bold;">
        Salvar</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Editar Fornecedor-->
<div class="modal fade" id="modalEditarFornecedor" tabindex="-1" aria-labelledby="modalEditarFornecedorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalEditarFornecedorLabel">Editar Fornecedor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="mb-3">
            <label for="nomeFornecedor" class="form-label">Nome/Razão Social</label>
            <input type="text" class="form-control" id="nomeFornecedor" placeholder="Ex: Fornecedor LTDA">
        </div>
        <div class="mb-3">
            <label for="cnpjFornecedor" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpjFornecedor" placeholder="00.000.000/0000-00">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-custom" 
        style="background-color: #1e3a5f; color: white; border: none; font-weight: bold;">
        Atualizar</button>
      </div>
    </div>
  </div>
</div>
    </button>

<!-- Modal Excluir Fornecedor-->
<div class="modal fade" id="modalExcluirFornecedor" tabindex="-1" aria-labelledby="modalExcluirFornecedorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalExcluirFornecedorLabel">Excluir Fornecedor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>