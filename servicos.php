<?php
include("conexao.php");
?>
<style>
    .header {
        background-color: #343A40;
        color: white;
        border-radius: 30px 30px 0px 0px;
        padding: 10px;
    }

    tbody {
        background-color: white;
        border-radius: 30px;
        padding: px;
        text-align: left;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
        width: 500px;
    }

    .section {
        margin: 0 auto;
        margin-top: 100px;
        width: 500px;
    }

    .footer td {
        border-radius: 0px 0px 30px 30px;
    }
</style>
<div class="section">
    <?php
    $sql_code = "SELECT * FROM orcamentos";
    $sql_query = $conexao->query($sql_code);
    while ($servico = $sql_query->fetch_assoc()) {
    ?>
        <table class="table table-hover">
            <div class="header">
                <h5 class="memorial"><?php echo 'Proposta Comercial N°: ' . $servico['numero_memorial'] . ' <br>' . $servico['servico']; ?></h5>
            </div>
            <div class="service">
                <tr>
                    <td>
                        <div class="service">
                            <div class="body">
                                <div class="cliente"><b>Cliente: </b><?php echo $servico['cliente']; ?></div>
                                <div class="ativo"><b>Ativo: </b><?php echo $servico['modelo_setor_tag']; ?></div>
                                <div class="serie"><b>N/S: </b><?php echo $servico['numero_serie']; ?></div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="footer">
                    <td></td>
                </tr>
            </div>
        <?php
    }
        ?>
        </table>
</div>