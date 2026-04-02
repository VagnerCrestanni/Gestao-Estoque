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

            <button class="btn btn-custom mb-4" data-bs-toggle="modal" data-bs-target="#modalNovaVitrine"
            style="background-color: #1e3a5f; color: white; border: none; font-weight: bold;">
                <i class="fas fa-plus"></i> Adicionar à Cesta
            </button>
        </div>
    </div>
    
    <div class ="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class = "col">
            <div class = "card h-100 shadow-sm border-0 position-relative">
                <input type = "checkbox" class = "form-check- input border-primary position-absolute top-0 end-0 m-2"
                    style = "transform: scale(2);">
                <img src="https://picsum.photos/400/300" class="img-fluid rounded" alt="Exemplo">
                <div class="card-body">
                    <h5 class="card-title">Notebook Gamer</h5>
                    <p class = "text-muted small mb-1"> Fornecedor: Tech Supplies Ltda </p>
                    <h4 class = "fw-bold">R$ 4.500,00</h4> 
                </div>    
            </div>
        </div>   
        
        <div class ="col">
            <div class = "card h-100 shadow-sm border-0 position-relative">
                <input type = "checkbox" class = "form-check- input border-primary position-absolute top-0 end-0 m-2"
                    style = "transform: scale(2);"> 
                <img src="https://picsum.photos/400/300" class="img-fluid rounded" alt="Exemplo">
                <div class="card-body">
                    <h5 class="card-title">Smartphone de Última Geração</h5>
                    <p class = "text-muted small mb-1"> Fornecedor: Mobile World Ltda </p>
                    <h4 class = "fw-bold">R$ 2.300,00</h4>
                </div>
            </div>
        </div>
        
        <div class = "col">
            <div class = "card h-100 shadow-sm border-0 position-relative">
                <input type = "checkbox" class = "form-check- input border-primary position-absolute top-0 end-0 m-2"
                    style = "transform: scale(2);"> 
                <img src="https://picsum.photos/400/300" class="img-fluid rounded" alt="Exemplo">
                <div class="card-body">
                    <h5 class="card-title">Monitor UltraWide</h5>
                    <p class = "text-muted small mb-1"> Fornecedor: DisplayTech Ltd </p>
                    <h4 class = "fw-bold">R$ 1.800,00</h4>
                </div>
            </div>
        </div>

        <div class = "col">
            <div class = "card h-100 shadow-sm border-0 position-relative">
                <input type = "checkbox" class = "form-check- input border-primary position-absolute top-0 end-0 m-2"
                    style = "transform: scale(2);"> 
                <img src="https://picsum.photos/400/300" class="img-fluid rounded" alt="Exemplo">
                <div class="card-body">
                    <h5 class="card-title">Teclado Mecânico RGB</h5>
                    <p class = "text-muted small mb-1"> Fornecedor: Gaming Gear Ltda </p>
                    <h4 class = "fw-bold">R$ 350,00</h4>    
                </div>
            </div>
        </div>
    </div>

</body>
</html>