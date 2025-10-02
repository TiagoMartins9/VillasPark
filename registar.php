<?php
session_start();
require('assets/php/db.php');

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $pass_confirm = $_POST['confirm_pass'];

    $check_query = "SELECT * FROM funcionarios WHERE nome = ?";
    $stmt = $conexao->prepare($check_query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        $error_message = "Este nome de usuário já está em uso. Escolha outro.";
    } else {
        if ($password !== $pass_confirm) {
            $error_message = "As senhas não coincidem. Por favor, tente novamente.";
        } else {
            $check_email_query = "SELECT * FROM funcionarios WHERE email = ?";
            $stmt = $conexao->prepare($check_email_query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $check_email_result = $stmt->get_result();

            if ($check_email_result->num_rows > 0) {
                $error_message = "Este endereço de e-mail já está registrado. Por favor, use outro.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $insert_query = "INSERT INTO funcionarios (nome, email, password) VALUES (?, ?, ?)";
                $stmt = $conexao->prepare($insert_query);
                $stmt->bind_param("sss", $name, $email, $hashed_password);

                if ($stmt->execute() === TRUE) {
                    $_SESSION['nome'] = $name;
                    header("Location: index.php");
                    exit();
                } else {
                    $error_message = "Erro ao registrar usuário: " . $conexao->error;
                }
            }
        }
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
    <title>Registar - VillasPark</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>
  <body>
  <?php include 'header.php'; ?>
    <div class="form-container">
      <h1>Registar</h1>
      <form action="registar.php" method="post" class="form">
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="pass">Password</label>
          <input type="password" id="pass" name="pass" required>
        </div>
        <div class="form-group">
          <label for="confirm_pass">Confirmar Password</label>
          <input type="password" id="confirm_pass" name="confirm_pass" required>
        </div>
        <?php
            if (!empty($error_message)) {
                echo '<div class="error-message" style="color: red; text-align: center;">' . $error_message . '</div>';
            }
        ?>
        <button type="submit" class="form-submit-btn">Registar</button>
      </form>
      <div class="extra-links">
        <a href="login.php">Já tem uma conta? Faça login</a>
      </div>
    </div>
  </body>
</html>
