<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Gestor De Encomendas</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="btnindex">
        <h1 class="mb-4">Visualizar informações: </h1>
        <div class="btn-container">
            <button><a href="verencomendas.php">Ver Encomendas</a></button>
            <button><a href="verprodutos.php">Ver Produtos</a></button>
            <button><a href="verclientes.php">Ver Clientes</a></button>
        </div>
        <div class="form-container_p">
            <h1>Pesquisar no Google</h1>
            <form action="assets/php/search.php" method="get" class="form">
                <div class="form-group">
                    <label for="query">O que procura?</label>
                    <input type="text" id="query" name="query" required>
                </div>
                <button type="submit" class="form-submit-btn">Pesquisar</button>
            </form>
        </div>
    </div>
    </body>
</html>
