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
    </style>
    <div class="box">
        <div class="row">
            <div class="col-9">
                <h3>Produtos</h3>
            </div>
            <div class="col-3">
                <button style="border-radius: 20px;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Listar</button>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div style="width: 1400px; border-radius: 20px; margin-left: -300px; margin-top: 100px; margin-bottom: 200px; padding: 30px;" class="modal-content">
                            <?php
                            ob_start();
                            include("conexao.php");
                            $sql_list = "SELECT * FROM produtos";
                            $sql_query = $conexao->query($sql_list) or die;
                            if ($sql_query->num_rows == 0) {
                                echo ("Nenhum fornecedor cadastrado.");
                            } else {
                            ?>
                                <form action="" method="POST">
                                    <div class="tbl">
                                        <h4>Registro de Produtos</h4>
                                        <table class="table table-hover">

                                            <br>
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Unidade</th>
                                                    <th scope="col">Descrição</th>
                                                    <th scope="col">NCM</th>
                                                    <th scope="col">Estoque Mínimo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($produtos = $sql_query->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $produtos['id'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $produtos['nome'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $produtos['unidade'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $produtos['descricao'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $produtos['ncm'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $produtos['minimo'] ?>
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
                <label for="nomeProduto">Nome</label>
                <input type="text" class="form-control" name="nomeProduto" placeholder="">
            </div>
            <div class="form-group">
                <label for="descricaoProduto">Descrição</label>
                <input type="text" class="form-control" name="descricaoProduto" placeholder="">
            </div>
            <div class="form-group">
                <label for="ncmProduto">NCM</label>
                <input type="text" class="form-control" name="ncmProduto" placeholder="">
            </div>
            <div class="form-group">
                <label for="minimoProduto">Estoque Mínimo</label>
                <input type="text" class="form-control" name="minimoProduto" placeholder="">
            </div>
            <div class="form-group">
                <label for="unidadeProduto">Unidade</label>
                <select class="form-control" name="unidadeProduto">
                    <option>Selecione</option>
                    <option>Quilograma</option>
                    <option>Litro</option>
                    <option>Unidade</option>
                    <option>Rolo</option>
                    <option>Conjunto</option>
                    <option>Metro</option>
                    <option>Metro²</option>
                    <option>Metro³</option>
                </select>
            </div>
            <div align="center">
                <input style="border-radius: 20px;" type="submit" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <?php
    if (strlen(@$_POST["nomeProduto"]) == 0) {
        die;
    } else {
        @$nomeProduto = $_POST['nomeProduto'];
        @$descricaoProduto = $_POST['descricaoProduto'];
        @$unidadeProduto = $_POST['unidadeProduto'];
        @$quantidadeProduto = $_POST['quantidadeProduto'];
        @$ncmProduto = $_POST['ncmProduto'];
        @$minimoProduto = $_POST['minimoProduto'];

        $sql_code = mysqli_query($conexao, "INSERT INTO produtos (nome, descricao, unidade, quantidade, ncm, minimo) VALUES ('$nomeProduto', '$descricaoProduto', '$unidadeProduto', '0', '$ncmProduto', '$minimoProduto')");
        header("Location: index.php?page=produtos");
        exit();
    }
    ob_end_flush();
?>