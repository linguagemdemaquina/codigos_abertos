<?php
require 'controle_de_sessao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: logar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área Protegida</title>
    <link rel="stylesheet" href="css/folhadeestilos.css">
</head>
<body>
<div class="form-container">
    <h2>Olá, você está autenticado!</h2>
    <p>A sua sessão está protegida com PHP</p>
    <form action="deslogar.php" method="post">
        <button type="submit" class="logout">Sair</button>
    </form>
</div>
<script>
// ENVIAR BEACON A CADA 30 SEGUNDOS PARA MANTER A SESSÃO ATIVA
setInterval(() => {
    fetch('controle_de_sessao.php').catch(() => location.href = 'logar.php');
}, 30000);

// AO FECHAR A ABA OU NAVEGADOR, ENVIAR BEACON PARA DESLOGAR
window.addEventListener('beforeunload', () => {
    navigator.sendBeacon('deslogar.php');
});
</script>
</body>
</html>