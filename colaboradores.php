<?php
ob_start();
include('conexao.php');
?>
<style>
    .box {
        width: 500px;
        margin: 0 auto;
        margin-top: 100px;
        background-color: white;
        padding: 30px;
        border-radius: 20px;
        height: 600px;
    }

    .tbl {
        border-radius: 20px;
    }

    .modal-content {
        width: 900px;
        border-radius: 20px;
    }
</style>
<div class="box">
    <div class="row">
        <div class="col-9">
            <h3>Colaboradores</h3>
        </div>
        <div class="col-3">
            <button style="border-radius: 20px;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Listar</button>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div style="width: 1400px; border-radius: 20px; margin-left: -300px; margin-top: 100px; margin-bottom: 200px; padding: 30px;" class="modal-content">
                        <?php
                        $sql_list = "SELECT * FROM colaboradores";
                        $sql_query = $conexao->query($sql_list) or die;
                        if ($sql_query->num_rows == 0) {
                            echo ("Nenhum colaborador cadastrado.");
                        } else {
                        ?>
                            <form action="" method="POST">
                                <div class="tbl">
                                    <table class="table table-hover">
                                        <h4>Registro de Clientes</h4>
                                        <br>
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Setor</th>
                                                <th scope="col">Função</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Telefone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($cliente = $sql_query->fetch_assoc()) { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $cliente['id'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $cliente['nome'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $cliente['setor'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $cliente['funcao'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $cliente['email'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($cliente['telefone']) ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Setor</label>
            <div class="form-check" align="center">
                <input name="setor" value="Comercial" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                Comercial
            </div>
            <div class="form-check" align="center">
                <input name="setor" value="Operacional" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                Operacional
            </div>
        </div>
        <div class="subir" style="margin-top: -10px;">
        <div class="form-group">
            <label for="funcao">Função</label>
            <input type="text" class="form-control" name="funcao" placeholder="">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" placeholder="">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" placeholder="">
        </div>
        <div align="center">
            <input style="border-radius: 20px;" type="submit" name="submit" class="btn btn-primary">
        </div>
        </div>
    </form>
</div>
<?php
if (strlen(@$_POST["nome"]) == 0) {
    die;
} else {

    $nome = $_POST['nome'];
    $setor = $_POST['setor'];
    $funcao = $_POST['funcao'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql_code = mysqli_query($conexao, "INSERT INTO colaboradores (nome, setor, funcao, email, telefone) VALUES ('$nome', '$setor', '$funcao', '$email', '$telefone')");
    header("Location: index.php?page=colaboradores");
    exit();
}
ob_end_flush();
?>