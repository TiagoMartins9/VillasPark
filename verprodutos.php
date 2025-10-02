<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Produtos</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1 class="mb-4">Gestor de Produtos</h1>
        <button class="btn btn-primary mb-3" id="addProductBtn">Adicionar Novo Produto</button>
        <input type="text" id="searchProductInput" placeholder="Pesquisar pelo nome" class="form-control mb-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço por kg</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="productTableBody">
            </tbody>
        </table>
        <div id="paginationControls" class="d-flex justify-content-between">
            <button class="btn btn-secondary" id="prevPageBtn">Anterior</button>
            <span id="pageInfo"></span>
            <button class="btn btn-secondary" id="nextPageBtn">Próximo</button>
        </div>
    </div>

    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Adicionar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        <div class="form-group">
                            <label for="productName">Nome</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Descrição</label>
                            <input type="text" class="form-control" id="productDescription" required>
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Preço por kg</label>
                            <input type="number" class="form-control" id="productPrice" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/scriptprodutos.js"></script>
</body>
</html>
