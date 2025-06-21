<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/folhadeestilos.css">
</head>
<body>
<div class="form-container">
    <h2>Login</h2>
    <?php
    session_start();
    require 'conexao/conexao.php';

    $erro = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = $_POST['senha'];

        $stmt = $conexao->prepare("SELECT cod, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $hash);
            $stmt->fetch();

            if (password_verify($senha, $hash)) {
                session_regenerate_id(true);
                $_SESSION['usuario_id'] = $id;
                header("Location: pagina_protegida.php");
                exit;
            }
        }

        $erro = "Login inválido !";
    }
    if ($erro) echo "<div class='error'>{$erro}</div>";
    ?>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Digite seu email" required>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
        <button type="submit">Entrar</button>
    </form>
    <p class="register-link">Não possui uma conta ?  <a href="cadastrar.php">Cadastre-se aqui</a></p>
</div>
</body>
</html>