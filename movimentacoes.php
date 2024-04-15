<?php
ob_start();
include('conexao.php');
include('funcoes.php');
?>
<style>
    .box {
        width: 1400px;
        margin: 0 auto;
        margin-top: 100px;
        margin-bottom: 100px;
        background-color: white;
        padding: 30px;
        border-radius: 20px;
    }

    .box1 {
        padding: 30px;
        border-radius: 20px;
    }
</style>

<div class="box">

    <?php darEntrada($conexao); ?>
    <?php darSaida($conexao); ?>
    <?php listarRegistro($conexao); ?>
    <?php mostrarProdutos($conexao); ?>

</div