<?php
session_start();
require('assets/php/db.php');

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['pass'];

    $name = $conexao->real_escape_string($name);

    $sql = "SELECT * FROM funcionarios WHERE nome = ?";
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['nome'] = $name;
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Senha incorreta!";
            }
        } else {
            $error_message = "Utilizador não encontrado!";
        }
        $stmt->close();
    } else {
        $error_message = "Erro na preparação da consulta: " . $conexao->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <title>Login - VillasPark</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>
  <body>
  <?php include 'header.php'; ?>
    <div class="form-container">
      <h1>Faça login</h1>
      <form action="login.php" method="post" class="form">
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="pass">Password</label>
          <input type="password" id="pass" name="pass" required>
        </div>
        <?php
          if (!empty($error_message)) {
              echo '<div class="error-message" style="color: red; text-align: center;">' . $error_message . '</div>';
          }
        ?>
        <button type="submit" class="form-submit-btn">Enviar</button>
      </form>
      <div class="extra-links">
        <a href="registar.php">Não tens uma conta? Regista-te agora!</a>
        <a href="forgot_password.php">Esqueceu sua senha?</a>
      </div>
    </div>

  </body>
</html>
