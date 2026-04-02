/*Adicionar logica para quando clicar em adicionar produto ele salvar e mostrar na tabela*/
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
                <input type="text" name="nome" class="form-control" placeholder="Nome do produto">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Preço (R$)</label>
                <input type="number" name="preco" step="0.01" class="form-control" placeholder="0.00">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Fornecedor</label>
                <select name="fornecedor" class="form-control form-select">
                    <option selected disabled>Selecione...</option>
                    <option value="1">Tech Supplies Ltda</option>
                    <option value="2">Office Pro</option>
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
                    <tr>
                        <td> 1 </td>
                        <td class="fw-bold"> Mouse Gamer XYZ </td>
                        <td> 150.00 </td>
                        <td> Tech Supplies Ltda</td>
                        <td class="text-center">
                            <button class="btn btn-outline-danger btn-sm">
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
</body>
</html>