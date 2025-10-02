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
    <title>Gestor de Encomendas</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1 class="mb-4">Gestor de Encomendas</h1>
        <button class="btn btn-primary mb-3" id="addOrderBtn">Adicionar Nova Encomenda</button>
        <input type="text" id="searchInput" placeholder="Pesquisar pela data" class="form-control mb-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Preço Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
            </tbody>
        </table>
        <div id="paginationControls" class="d-flex justify-content-between">
            <button class="btn btn-secondary" id="prevPageBtn">Anterior</button>
            <span id="pageInfo"></span>
            <button class="btn btn-secondary" id="nextPageBtn">Próximo</button>
        </div>
    </div>

    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Adicionar Encomenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="orderForm">
                        <div class="form-group">
                            <label for="clientId">Cliente</label>
                            <select class="form-control" id="clientId" required></select>
                        </div>
                        <div class="form-group">
                            <label for="orderDate">Data</label>
                            <input type="date" class="form-control" id="orderDate" required>
                        </div>
                        <div class="form-group">
                            <label for="orderTotal">Preço Total</label>
                            <input type="number" step="0.01" class="form-control" id="orderTotal" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Adicionar Produto à Encomenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        <div class="form-group">
                            <label for="productId">Produto</label>
                            <select class="form-control" id="productId" required></select>
                        </div>
                        <div class="form-group">
                            <label for="productPricePerKg">Preço por Kg</label>
                            <input type="number" step="0.01" class="form-control" id="productPricePerKg" readonly>
                        </div>
                        <div class="form-group">
                            <label for="productWeight">Peso (Kg)</label>
                            <input type="number" step="0.01" class="form-control" id="productWeight" required>
                        </div>
                        <div class="form-group">
                            <label for="productTotalPrice">Preço Total</label>
                            <input type="number" step="0.01" class="form-control" id="productTotalPrice" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productModal2" tabindex="-1" role="dialog" aria-labelledby="productModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel2">Visualizar Produtos da Encomenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="productSection2">
                    <div id="productList" class="row row-cols-1 row-cols-md-2 g-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/scriptencomendas.js"></script>
</body>
</html>
