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
            <h3>Fornecedores</h3>
        </div>
        <div class="col-3">
            <button style="border-radius: 20px;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Listar</button>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div style="width: 1400px; border-radius: 20px; margin-left: -300px; margin-top: 100px; margin-bottom: 200px; padding: 30px;" class="modal-content">
                        <?php
                        $sql_list = "SELECT * FROM fornecedores";
                        $sql_query = $conexao->query($sql_list) or die;
                        if ($sql_query->num_rows == 0) {
                            echo ("Nenhum fornecedor cadastrado.");
                        } else {
                        ?>
                            <form action="" method="POST">
                                <div class="tbl">
                                    <h4>Registro de fornecedores</h4>
                                    <table class="table table-hover">

                                        <br>
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">CNPJ</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Telefone</th>
                                                <th scope="col">Endereço</th>
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
                                                        <?php echo $cliente['cnpj'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $cliente['email'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $cliente['telefone'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $cliente['endereco'] ?>
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
    </div><br>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="">
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="number" class="form-control" name="cnpj" placeholder="">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="number" class="form-control" name="telefone" placeholder="">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" name="endereco" placeholder="">
        </div>
        <div align="center">
            <input style="border-radius: 20px;" type="submit" name="submit" class="btn btn-primary">
        </div>
    </form>
</div>
<?php
include("conexao.php");
if (strlen(@$_POST["nome"]) == 0) {
    die;
} else {
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql_code = mysqli_query($conexao, "INSERT INTO fornecedores (nome, cnpj, email, telefone, endereco) VALUES ('$nome', '$cnpj', '$email', '$telefone', '$endereco')");
    header("Location: index.php?page=fornecedores");
    exit();
}
ob_end_flush();
?>