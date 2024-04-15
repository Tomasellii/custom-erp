<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

<body>
    <style>
        
        body {
            background-color: #E5E6E9;
            height: 768px;
            width: 1366;
        }

        #servicos {
            background-color: #001E60;
            border-radius: 20px;

        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?page=inicio">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=movimentacoes">Estoque</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Serviços
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?page=servicos">Listar serviços</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?page=memorial">Novo Memorial</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastrar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?page=clientes">Clientes</a>
                        <a class="dropdown-item" href="?page=colaboradores">Colaboradores</a>
                        <a class="dropdown-item" href="?page=fornecedores">Fornecedores</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?page=produtos">Produtos</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    switch (@$_REQUEST["page"]) {
        case ("movimentacoes"):
            include("movimentacoes.php");
            break;
        case ("produtos"):
            include("produtos.php");
            break;
        case ("clientes"):
            include("clientes.php");
            break;
        case ("fornecedores"):
            include("fornecedores.php");
            break;
        case ("servicos"):
            include("servicos.php");
            break;
        case ("memorial"):
            include("memorial.php");
            break;
        case ("colaboradores"):
            include("colaboradores.php");
            break;
        case ("inicio"):
            include("inicio.php");
            break;
    }
    ?>
</body>

</html>