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
    <title>Gerenciamento de Clientes</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1 class="mb-4">Gestor de Clientes</h1>
        <button class="btn btn-primary mb-3" id="addClientBtn">Adicionar Novo Cliente</button>
        <input type="text" id="searchInput" placeholder="Pesquisar pelo nome" class="form-control mb-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="clientTableBody">
            </tbody>
        </table>
        <div id="paginationControls" class="d-flex justify-content-between">
            <button class="btn btn-secondary" id="prevPageBtn">Anterior</button>
            <span id="pageInfo"></span>
            <button class="btn btn-secondary" id="nextPageBtn">Próximo</button>
        </div>
    </div>

    <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clientModalLabel">Adicionar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="clientForm">
                        <div class="form-group">
                            <label for="clientName">Nome</label>
                            <input type="text" class="form-control" id="clientName" required>
                        </div>
                        <div class="form-group">
                            <label for="clientPhone">Telefone</label>
                            <input type="tel" class="form-control" id="clientPhone" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/scriptclientes.js"></script>
</body>
</html>
