<?php
// CONEXÃO COM O BANCO DE DADOS
include("conexao/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br"> 
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php / MySql - Consulta Básica a Banco de Dados</title>
    <link rel="stylesheet" href="css/folhadeestilos.css">
    </head>
    <body>  
    <h1>Consulta Básica a Banco de Dados</h1>
    <h2>Lista de Produtos</h2>
    <div class="produtos">
    <div class="cabecalho">
        <span>Cod.</span>
        <span>Produto</span>
        <span>Marca</span>
    </div>
    <?php
    // CONSULTA SQL PARA BUSCAR OS PRODUTOS
    $sql = "SELECT * FROM produtos";
    $resultado = mysqli_query($conexao, $sql);
    // VERIFICA SE A CONSULTA RETORNOU RESULTADOS
    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo '<div class="linha">';
            echo '<span>' . $linha['cod'] . '</span>';
            echo '<span>' . $linha['produto'] . '</span>';
            echo '<span>' . $linha['marca'] . '</span>';
            echo '</div>';
        }
    } else {
        echo '<div class="linha vazio">Nenhum produto encontrado.</div>';
    }
    ?>
    </div>
    <?php 
    // FECHA A CONEXÃO
    mysqli_close($conexao);
    ?>
</body>
</html>