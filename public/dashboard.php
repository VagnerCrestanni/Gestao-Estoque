
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistema de Estoque</title>
    <link href="https://cdn.jsdelivr.net" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="alert alert-success shadow">
            <nav>
                <a class="logo" href="dashboard.php">Sistema de Estoque</a>
                <ul class="nav-list">
                    <li><a href ="./dashboard.php"> Dashboard </a></li>
                    <li><a href ="./fornecedores.php"> Fornecedores</a></li>
                    <li><a href ="./produtos.php"> Produtos </a></li>
                    <li><a href ="./vitrine.php"> Vitrine </a></li>
                    <li><a href ="./cesta.php"> Cesta</a></li>
                    <li><a href ="/index.php" class="btn btn-outline-danger"> Sair</a></li>
          </div>
          <div class="content mt-4">
            <h1 class="dash-title" style="margin-left: 250px;" color="#1e3a5f" font-size="35px">Dashboard</h1>

              <div class="cards">

                <div class="card-item">
                   <i class="fa-solid fa-box-open icon-card"></i>
                   <span class="value-total">6</span>
                   <p class="label-card">Total de Produtos</p>
                </div>

                <div class="card-item">
                   <i class="fa-solid fa-users icon-card"></i>
                   <span class="value-total">3</span>
                   <p class="label-card">Fornecedores</p>
                </div>

                <div class="card-item">
                   <i class="fa-solid fa-cart-shopping icon-card"></i>
                   <span class="value-total">2</span>
                   <p class="label-card">Itens na Cesta</p>
                </div>
                </div>
            <div>
                <div class="card-notice">
                    <h2 class="notice-title"style="font-size: 30px;">Bem vindo ao Sistema de Gestão de Estoque</h2>
                    <p class="notice-message" style="font-size: 20px;">Utilize o menu de navegação para gerenciar fornecedores, produtos e visualizar sua cesta de compras..</p>
                </div>
    </div>
</body>
</html>