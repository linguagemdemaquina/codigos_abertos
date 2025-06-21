<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="css/folhadeestilos.css">
</head>
<body>
    <div class="form-container">
        <h2>Cadastro</h2>
        <?php
        require 'conexao/conexao.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = htmlspecialchars(trim($_POST['nome']));
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = $_POST['senha'];

            if ($nome && $email && $senha) {
                $hash = password_hash($senha, PASSWORD_DEFAULT);
                $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $nome, $email, $hash);
                $stmt->execute();
                echo "<p class='success'>Usuário cadastrado com sucesso!</p>";
            } else {
                echo "<p class='error'>Dados inválidos !</p>";
            }
        }
        ?>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Digite seu email" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            <button type="submit">Cadastrar</button>
        </form>
        <p class="register-link">Já possui cadastro ? <a href="logar.php">Clique aqui</a></p>
    </div>
</body>