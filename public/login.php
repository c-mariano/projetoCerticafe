<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $usuario_ok = "admin";
    $senha_ok = "admin";

    if ($usuario === $usuario_ok && $senha === $senha_ok) {
        $_SESSION["logado"]=true;
        header("Location: home.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vendas Manager</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="../assets/js/scripts.js" defer></script>
</head>
<body>
    <main>
        <div class="logo-login">
            <img src="../assets/img/logo-menor-azul.png" alt="logo">
        </div>
        <div class="form-login">
            <h2>Login</h2>
                <form action="" method="post">
                    <label for="usuario">Usuário:</label>
                        <input type="text" id="usuario" name="usuario" required>
                    <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>
                            <button type="submit">Entrar</button>
                </form> 
                 <?php if (isset($erro)): ?>
                <p style="color: red; text-align: center;" id="password-error"><?= $erro ?></p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>