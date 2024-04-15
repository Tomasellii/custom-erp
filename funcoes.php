<script>
    function adicionarCampo() {
        var container = document.getElementById("camposProdutos");

        var novoCampoContainer = document.createElement("div");
        novoCampoContainer.className = "campos-produto row";

        var novoCampoProduto = document.createElement("div");
        novoCampoProduto.className = "col-7";
        novoCampoProduto.innerHTML = `
        <label for="listarProduto[]">
        </label>
            <input class="form-control" list="listarProduto" name="listarProduto[]" placeholder="Escolha ou digite..." autocomplete="off">
                <datalist id="listarProduto">
                    <?php
                    $sql_list = "SELECT * FROM produtos ORDER BY nome";
                    $sql_query = $conexao->query($sql_list) or die;
                    while ($produto = $sql_query->fetch_assoc()) { ?>
                            <option value="<?php echo $produto['nome'] ?>">
                            <?php echo $produto['nome'] ?>
                             </option>
                            <?php } ?>
                </datalist>`;

        var novoCampoQuantidade = document.createElement("div");
        novoCampoQuantidade.className = "col-2";
        novoCampoQuantidade.innerHTML = `
            <label for="quantidade"></label>
            <input type="number" step="0.01" class="form-control" name="quantidade[]" placeholder="" autocomplete="off">`;

        var novoCampoValor = document.createElement("div");
        novoCampoValor.className = "col-2";
        novoCampoValor.innerHTML = `
            <label for="valor"></label>
            <input type="number" step="0.01" class="form-control" name="valor[]" placeholder="" autocomplete="off">`;

        var novoCampoProposta = document.createElement("div");
        novoCampoProposta.className = "col-1";
        novoCampoProposta.innerHTML = `
            <label for="proposta"></label>
            <input type="text" step="0.01" class="form-control" name="proposta[]" placeholder="" autocomplete="off">`;

        novoCampoContainer.appendChild(novoCampoProduto);
        novoCampoContainer.appendChild(novoCampoQuantidade);
        novoCampoContainer.appendChild(novoCampoValor);
        novoCampoContainer.appendChild(novoCampoProposta);

        container.appendChild(novoCampoContainer);
    }

    function adicionarCampo1() {
        var container = document.getElementById("camposProdutos1");

        var novoCampoContainer = document.createElement("div");
        novoCampoContainer.className = "campos-produto1 row";

        var novoCampoProduto = document.createElement("div");
        novoCampoProduto.className = "col-7";
        novoCampoProduto.innerHTML = `
        <label for="listarProduto[]">
        </label>
            <input class="form-control" list="listarProduto" name="listarProduto[]" placeholder="Escolha ou digite..." autocomplete="off">
                <datalist id="listarProduto">
                    <?php
                    $sql_list = "SELECT * FROM produtos ORDER BY nome";
                    $sql_query = $conexao->query($sql_list) or die;
                    while ($produto = $sql_query->fetch_assoc()) { ?>
                            <option value="<?php echo $produto['nome'] ?>">
                            <?php echo $produto['nome'] ?>
                             </option>
                            <?php } ?>
                </datalist>`;

        var novoCampoQuantidade = document.createElement("div");
        novoCampoQuantidade.className = "col-2";
        novoCampoQuantidade.innerHTML = `
            <label for="quantidade"></label>
            <input type="number" step="0.01" class="form-control" name="quantidade[]" placeholder="" autocomplete="off">`;

        var novoCampoValor = document.createElement("div");
        novoCampoValor.className = "col-2";
        novoCampoValor.innerHTML = `
            <label for="valor"></label>
            <input type="number" step="0.01" class="form-control" name="valor[]" placeholder="" autocomplete="off">`;


        var novoCampoProposta = document.createElement("div");
        novoCampoProposta.className = "col-1";
        novoCampoProposta.innerHTML = `
            <label for="proposta"></label>
            <input type="text" step="0.01" class="form-control" name="proposta[]" placeholder="" autocomplete="off">`;

        novoCampoContainer.appendChild(novoCampoProduto);
        novoCampoContainer.appendChild(novoCampoQuantidade);
        novoCampoContainer.appendChild(novoCampoValor);
        novoCampoContainer.appendChild(novoCampoProposta);

        container.appendChild(novoCampoContainer);
    }
</script>
<?php

function listarCliente($conexao)
{

    $sql_list = "SELECT * FROM clientes ORDER BY nome";
    $sql_query = $conexao->query($sql_list) or die;
    while ($clientes = $sql_query->fetch_assoc()) { ?>
        <option value="<?php echo $clientes['nome'] ?>">
            <?php echo $clientes['nome'] ?>
        </option>
    <?php }
}






function darEntrada($conexao)
{
    if (!$conexao instanceof mysqli) {
        die('Conexão inválida.');
    }

    echo '<button style="border-radius: 10px;" value="entrada" name="operacao" class="btn btn-outline-success" data-toggle="modal" data-target=".bd-example-modal-xl-entrada">Entrada</button>';

    echo '<div class="modal fade bd-example-modal-xl-entrada" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel-entrada" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div style="width: 1000px; border-radius: 20px; margin-left: -250px; margin-top: 100px; margin-bottom: 200px;" class="modal-content">
                <div class="box1">
                    <h3>Entrada</h3><br>
                    <form method="POST" action="" class="row g-3">';

    echo '<div class="col-6">
                            <label for="cli_for">Fornecedor</label>
                            <select name="cli_for" class="form-control">
                                <option selected disabled>Selecione</option>';

    $stmt = $conexao->prepare("SELECT nome FROM fornecedores ORDER BY nome");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($row['nome']) . '">' . htmlspecialchars($row['nome']) . '</option>';
    }

    $stmt->close();

    echo '
                            </select>
                        </div>';
    echo '<div class="col-3">
                            <label for="nota">Nota</label>
                            <input type="text" class="form-control" name="nota" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-3">
                            <label for="data">Data</label>
                            <input type="date" class="form-control" name="data" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="produtos"></label>
                            <div id="camposProdutos">
                                <div class="campos-produto row">
                                    <div class="col-7">
                                        <label for="listarProduto[]">Produto</label>
                                        <input class="form-control" list="listarProduto" name="listarProduto[]" placeholder="Escolha ou digite..." autocomplete="off">
                                        <datalist id="listarProduto">';

    $stmt = $conexao->prepare("SELECT nome FROM produtos ORDER BY nome");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($produto = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($produto['nome']) . '">' . htmlspecialchars($produto['nome']) . '</option>';
    }

    $stmt->close();

    echo '</datalist>
                                    </div>
                                    <div class="col-2">
                                        <label for="quantidade">Quantidade</label>
                                        <input type="number" step="0.01" class="form-control" name="quantidade[]" placeholder="" autocomplete="off">
                                    </div>
                                    <div class="col-2">
                                        <label for="valor">Valor</label>
                                        <input type="number" step="0.01" class="form-control" name="valor[]" placeholder="" autocomplete="off">
                                    </div>
                                    <div class="col-1">
                                        <label for="proposta">Proposta</label>
                                        <input type="text" step="0.01" class="form-control" name="proposta[]" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="margin-top: 20px;">
                            <label for="destino">Observações</label>
                            <textarea class="form-control" name="destino" placeholder=""></textarea>
                        </div>
                        <div style="margin: 0px; margin-top: 10px;" class="col-4">
                            <input style="border-radius: 10px;" type="submit" name="submitEntrada" class="btn btn-success" value="Dar entrada">
                            <button style="border-radius: 10px;" type="button" onclick="adicionarCampo()" class="btn btn-outline-primary">Incluir</button>
                            ';
    echo '</div>
                    </form>
                </div>
            </div>
        </div>
        </div>';

    if (isset($_POST['submitEntrada'])) {
        if (
            isset($_POST['cli_for'], $_POST['nota'], $_POST['data'], $_POST['destino'], $_POST['listarProduto'], $_POST['quantidade'], $_POST['valor'], $_POST['proposta']) &&
            is_array($_POST['listarProduto']) &&
            is_array($_POST['quantidade']) &&
            is_array($_POST['valor']) &&
            !empty($_POST['listarProduto']) &&
            !empty($_POST['quantidade']) &&
            !empty($_POST['valor'])
        ) {
            $cli_for = $_POST['cli_for'];
            $nota = $_POST['nota'];
            $data = $_POST['data'];
            $destino = $_POST['destino'];
            $produtos = $_POST['listarProduto'];
            $quantidades = $_POST['quantidade'];
            $valores = $_POST['valor'];
            $propostas = $_POST['proposta'];

            $conexao->begin_transaction();

            try {
                for ($i = 0; $i < count($produtos); $i++) {
                    $stmt_check = $conexao->prepare("SELECT COUNT(*) FROM produtos WHERE nome = ?");
                    $stmt_check->bind_param("s", $produtos[$i]);
                    $stmt_check->execute();
                    $stmt_check->bind_result($count);
                    $stmt_check->fetch();
                    $stmt_check->close();

                    if ($count > 0) {
                        $stmt_update = $conexao->prepare("UPDATE produtos SET quantidade = quantidade + ? WHERE nome = ?");
                        $stmt_update->bind_param("ds", $quantidades[$i], $produtos[$i]);
                        $stmt_update->execute();
                        $stmt_update->close();

                        $stmt_insert = $conexao->prepare("INSERT INTO movimentacoes (dat, operacao, nota, produto, cli_for, valor, quantidade, proposta, destino) VALUES (?, 'Entrada', ?, ?, ?, ?, ?, ?, ?)");
                        $stmt_insert->bind_param("ssssddds", $data, $nota, $produtos[$i], $cli_for, $valores[$i], $quantidades[$i], $propostas[$i], $destino);
                        $stmt_insert->execute();
                        $stmt_insert->close();
                    } else {
                        echo "<script>alert('O produto " . $produtos[$i] . " não existe no estoque.');</script>";
                    }
                }

                $conexao->commit();
                header("Location: index.php?page=movimentacoes");
                exit();
            } catch (Exception $e) {
                $conexao->rollback();
                echo "<script>alert('Erro durante a operação: " . $e->getMessage() . "');</script>";
            }
        } else {
            echo "<script>alert('Os arrays de produtos, quantidades e valores não estão definidos ou estão vazios.');</script>";
        }
    }
}

function darSaida($conexao)
{
    ?>
    <button style="border-radius: 10px;" value="saida" name="operacao" class="btn btn-outline-danger" data-toggle="modal" data-target=".bd-example-modal-xl">Saída</button>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div style="width: 1000px; border-radius: 20px; margin-left: -250px; margin-top: 100px; margin-bottom: 200px;" class="modal-content">
                <div class="box1">
                    <h3>Saída</h3>
                    <br>
                    <form method="POST" action="" class="row g-3">
                        <div class="col-md-6">
                            <label for="cli_for">Cliente</label>
                            <select name="cli_for" class="form-control">
                                <option selected disabled>Selecione</option>
                                <?php
                                $sql_list = "SELECT * FROM clientes ORDER BY nome";
                                $sql_query = $conexao->query($sql_list) or die;
                                while ($clientes = $sql_query->fetch_assoc()) { ?>
                                    <option value="<?php echo $clientes['nome'] ?>">
                                        <?php echo $clientes['nome'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="nota">Nota</label>
                            <input type="text" class="form-control" name="nota" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-3">
                            <label for="data">Data</label>
                            <input type="date" class="form-control" name="data" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-12">
                            <label for="produtos"></label>
                            <div id="camposProdutos1">
                                <div class="campos-produto1 row">
                                    <div class="col-7">
                                        <label for="listarProduto[]">Produto</label>
                                        <input class="form-control" list="listarProduto" name="listarProduto[]" placeholder="Escolha ou digite..." autocomplete="off">
                                        <datalist id="listarProduto">
                                            <?php
                                            $sql_list = "SELECT * FROM produtos ORDER BY nome";
                                            $sql_query = $conexao->query($sql_list) or die;
                                            while ($produto = $sql_query->fetch_assoc()) { ?>
                                                <option value="<?php echo $produto['nome'] ?>">
                                                    <?php echo $produto['nome'] ?>
                                                </option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="col-2">
                                        <label for="quantidade">Quantidade</label>
                                        <input type="number" step="0.01" class="form-control" name="quantidade[]" placeholder="" autocomplete="off">
                                    </div>
                                    <div class="col-2">
                                        <label for="valor">Valor</label>
                                        <input type="number" step="0.01" class="form-control" name="valor[]" placeholder="" autocomplete="off">
                                    </div>
                                    <div class="col-1">
                                        <label for="proposta">Proposta</label>
                                        <input type="text" step="0.01" class="form-control" name="proposta[]" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="margin-top: 20px;">
                            <label for="destino">Observações</label>
                            <textarea class="form-control" name="destino" placeholder=""></textarea autocomplete="off">
                        </div>
                        <div style="margin: 0px; margin-top: 10px;" class="col-12">
                            <input style="border-radius: 10px;" style="margin-top: 10px;" type="submit" name="submitSaida" class="btn btn-danger" value="Dar saída">
                            <button style="border-radius: 10px;" style="margin-top: 10px;" type="button" onclick="adicionarCampo1()" class="btn btn-outline-primary">Incluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php

    if (isset($_POST['submitSaida'])) {
        $cli_for = $_POST['cli_for'];
        $nota = $_POST['nota'];
        $data = $_POST['data'];
        $destino = $_POST['destino'];

        $produtos = $_POST['listarProduto'];
        $quantidades = $_POST['quantidade'];
        $valores = $_POST['valor'];
        $proposta = $_POST['proposta'];

        for ($i = 0; $i < count($produtos); $i++) {
            // Preparando a consulta para verificar a quantidade disponível.
            $stmt_select = $conexao->prepare("SELECT quantidade FROM produtos WHERE nome = ?");
            $stmt_select->bind_param("s", $produtos[$i]);
            $stmt_select->execute();
            $resultado = $stmt_select->get_result();
            $stmt_select->close();

            if ($resultado) {
                $row = $resultado->fetch_assoc();
                $quantidadeAtual = $row['quantidade'];

                if ($quantidades[$i] > $quantidadeAtual) {
                    echo "<script>alert('A quantidade de saída para o produto " . $produtos[$i] . " é maior que a quantidade disponível em estoque.'); window.location.href = 'index.php?page=movimentacoes';</script>";
                    exit();
                } else {
                    // Preparando a consulta para atualizar a quantidade no estoque.
                    $stmt_update = $conexao->prepare("UPDATE produtos SET quantidade = quantidade - ? WHERE nome = ?");
                    $stmt_update->bind_param("ds", $quantidades[$i], $produtos[$i]);
                    $stmt_update->execute();
                    $stmt_update->close();

                    // Preparando a consulta para inserir a movimentação.
                    $stmt_insert = $conexao->prepare("INSERT INTO movimentacoes (dat, operacao, nota, produto, cli_for, valor, quantidade, proposta, destino) VALUES (?, 'Saída', ?, ?, ?, ?, ?, ?, ?)");
                    $stmt_insert->bind_param("ssssddds", $data, $nota, $produtos[$i], $cli_for, $valores[$i], $quantidades[$i], $proposta[$i], $destino);
                    $stmt_insert->execute();
                    $stmt_insert->close();
                }
            } else {
                die("Erro ao acessar o estoque: " . $conexao->error);
            }
        }

        header("Location: index.php?page=movimentacoes");
        exit();
    }
    ?>

<?php }; ?>

<?php function listarRegistro($conexao)
{

?>
        <button style="border-radius: 10px;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Listar registro</button>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div style="width: 1400px; border-radius: 20px; margin-left: -290px; margin-top: 100px; margin-bottom: 200px; padding: 30px;" class="modal-content">
                    <form action="" method="POST">
                        <?php
                        $sql_select = "SELECT * FROM movimentacoes ORDER BY dat DESC";
                        $sql_reg = $conexao->query($sql_select) or die;
                        if ($sql_reg->num_rows == 0) {
                            echo ("Nenhum registro encontrado.");
                        } else {
                        ?>
                            <div class="tbl">
                                <table class="table table-hover">
                                    <br>
    
                                    <thead>
                                        <h3>Registro</h3>
                                        <br>
                                        <tr>
                                            <th scope="col">Código</th>
                                            <th scope="col">Operacao</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Nota</th>
                                            <th scope="col">Produto</th>
                                            <th scope="col">Origem/Destino</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">Proposta</th>
                                            <th scope="col">Observações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($registro = $sql_reg->fetch_assoc()) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo ($registro['id']); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($registro['operacao']); ?>
                                                </td>
                                                <td>
                                                    <?php echo date("d/m/Y", strtotime($registro['dat'])); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($registro['nota']); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($registro['produto']); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($registro['cli_for']); ?>
                                                </td>
                                                <td>
                                                    R$
                                                    <?php echo number_format(@$registro['valor'], 2, ',', '.'); ?>
                                                </td>
                                                <td>
                                                    <?php echo number_format(@$registro['quantidade'], 2, ',', '.'); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($registro['proposta']); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($registro['destino']); ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
<?php } ?>
<?php

function mostrarProdutos($conexao)
{
    ob_start();

    echo '<form style="float: right;" class="form-inline my-2 my-lg-0" method="post">
        <input style="border-radius: 10px; width: 200px;" class="form-control mr-sm-2" type="search" name="q" placeholder="Pesquisar" aria-label="Pesquisar">
        <button style="border-radius: 10px;" class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submitPesquisa">Pesquisar</button>
    </form>';

    $result = $_POST['q'] ?? null;
    $screen = empty($result) ? 'default' : 'resulting';

    switch ($screen) {
        case 'resulting':
            if (isset($_POST['submitPesquisa'])) {
                $termoPesquisa = $conexao->real_escape_string($_POST['q']);
                $sql_pesquisa = "SELECT * FROM produtos WHERE nome LIKE '%$termoPesquisa%' ORDER BY nome";
                $resultado_pesquisa = $conexao->query($sql_pesquisa);

                echo '<table class="table table-hover">
                        <br>
                        <thead>';
                if ($resultado_pesquisa->num_rows == 0) {
                    echo "Nenhum produto cadastrado.";
                } else {
                    echo '<tr>
                        <th scope="col">Código</th>
                        <th scope="col">NCM</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Unidade</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Estoque Mínimo</th>
                        <th scope="col">Descrição</th>
                    </tr>
                    </thead>
                    <tbody>';
                    while ($produto = $resultado_pesquisa->fetch_assoc()) {
                        echo "<tr>
                            <td>{$produto['id']}</td>
                            <td>{$produto['ncm']}</td>
                            <td>{$produto['nome']}</td>
                            <td>{$produto['unidade']}</td>
                            <td>" . number_format($produto['quantidade'], 2, ',', '.') . "</td>
                            <td>" . number_format($produto['minimo'], 2, ',', '.') . "</td>
                            <td>{$produto['descricao']}</td>
                        </tr>";
                    }
                    echo '</tbody>
                    </table>';
                }
            }
            break;
        default:
            $sql_list = "SELECT * FROM produtos ORDER BY nome";
            $sql_query = $conexao->query($sql_list);

            echo '<div class="produtos">
                    <table class="table table-hover">
                        <br>
                        <thead>';
            if ($sql_query->num_rows == 0) {
                echo "Nenhum produto cadastrado.";
            } else {
                echo '<tr>
                    <th scope="col">Código</th>
                    <th scope="col">NCM</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Unidade</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Estoque Mínimo</th>
                    <th scope="col">Descrição</th>
                </tr>
                </thead>
                <tbody>';
                while ($produto = $sql_query->fetch_assoc()) {
                    echo "<tr>
                        <td>{$produto['id']}</td>
                        <td>{$produto['ncm']}</td>
                        <td>{$produto['nome']}</td>
                        <td>{$produto['unidade']}</td>
                        <td>" . number_format($produto['quantidade'], 2, ',', '.') . "</td>
                        <td>" . number_format($produto['minimo'], 2, ',', '.') . "</td>
                        <td>{$produto['descricao']}</td>
                    </tr>";
                }
                echo '</tbody>
                </table>
            </div>';
            }
            break;
    }

    ob_end_flush();
} ?> 
<script>
                    let itemId = 0;

                    function atualizaCusto(funcao, turno, row) {
                        const valoresFuncao = {
                            'gt': 210,
                            'st': 140,
                            'tm': 140,
                            'ts': 110,
                            'tj': 110,
                            'm': 74,
                            'a': 51
                        };
                        const valoresTurno = {
                            'n100': 2.2,
                            'n50': 1.7,
                            'nn': 1.2,
                            'n': 1,
                            'd50': 1.5,
                            'd100': 2
                        };
                        const custoHH = valoresFuncao[funcao] || 0;
                        const valorHH = valoresTurno[turno] || 0;
                        row.querySelector('.custoHH').textContent = custoHH.toFixed(2).replace('.', ',');
                        row.querySelector('.valorHH').textContent = (custoHH * valorHH).toFixed(2).replace('.', ',');
                        atualizaTotal(row);
                    }

                    function atualizarTotalMO() {
                        var totalMO = 0;
                        document.querySelectorAll('#tableBody .totalHH').forEach(function(cell) {
                            totalMO += parseFloat(cell.textContent.replace(',', '.')) || 0;
                        });
                        document.getElementById('totalMO').textContent = totalMO.toFixed(2).replace('.', ',');
                    }

                    function atualizarTotalMOGeral() {
                        var totalMOGeral = 0;
                        document.querySelectorAll('#tableBody .totalHH').forEach(function(cell) {
                            totalMOGeral += parseFloat(cell.textContent.replace(',', '.')) || 0;
                        });
                        document.getElementById('totalMOGeral').textContent = totalMOGeral.toFixed(2).replace('.', ',');
                    }

                    function atualizarTotalMOFinal() {
                        var totalMOFinal = 0;
                        document.querySelectorAll('#tableBody .totalHH').forEach(function(cell) {
                            totalMOFinal += parseFloat(cell.textContent.replace(',', '.')) || 0;
                        });
                        document.getElementById('totalMOFinal').textContent = totalMOFinal.toFixed(2).replace('.', ',');
                    }
                    document.addEventListener('input', function(e) {
                        if (e.target.matches('.horas') || e.target.matches('.custoHH')) {
                            atualizaTotal(e.target.closest('tr'));
                        }
                    });
                    document.addEventListener('DOMContentLoaded', atualizarTotalMO);

                    function atualizaTotal(linha) {
                        const horas = parseFloat(linha.querySelector('.horas').value) || 0;
                        const custoHH = parseFloat(linha.querySelector('.custoHH').textContent.replace(',', '.'));
                        const valorHH = parseFloat(linha.querySelector('.valorHH').textContent.replace(',', '.'));
                        const total = (horas * valorHH).toFixed(2);
                        linha.querySelector('.totalHH').textContent = total.replace('.', ',');
                        atualizarTotalMOGeral();
                        atualizarTotalMO();
                        atualizarTotalMOFinal();
                        calcularTotalOrcamento();
                    }

                    function adicionarLinha() {
                        itemId++;
                        const tableBody = document.getElementById('tableBody');
                        const novaLinha = tableBody.insertRow();
                        novaLinha.innerHTML = `
                <td>${itemId}</td>
                <td>
                    <select class="funcao" name="mo" onchange="atualizaCusto(this.value, this.closest('tr').querySelector('.turno').value, this.closest('tr'))">
                        <option selected disabled>Selecione</option>
                        <option value="gt">Gestor técnico</option>
                        <option value="st">Supervisor técnico</option>
                        <option value="tm">Técnico master</option>
                        <option value="ts">Técnico sênior</option>
                        <option value="tj">Técnico junior</option>
                        <option value="m">Mecânico de refrigeração</option>
                        <option value="a">Auxiliar técnico</option>
                    </select>
                </td>
                <td><input step="0.01" type="number" class="horas" name="horas" oninput="atualizaTotal(this.closest('tr'))"></td>
                <td>
                    <select class="turno" name="turno" onchange="atualizaCusto(this.closest('tr').querySelector('.funcao').value, this.value, this.closest('tr'))">
                        <option selected disabled>Selecione</option>
                        <option value="n100">Noturno 100%</option>
                        <option value="n50">Noturno 50%</option>
                        <option value="nn">Noturno normal</option>
                        <option value="n">Normal</option>
                        <option value="d50">Diurno 50%</option>
                        <option value="d100">Diurno 100%</option>
                    </select>
                </td>
                <td class="custoHH">0,00</td>
                <td class="valorHH">0,00</td>
                <td class="totalHH">0,00</td>`;
                        atualizarTotalMOGeral();
                        atualizaTotalMO();
                        atualizarTotalMOFinal();
                        calcularTotalOrcamento();
                    }
                </script>
                <script>
                    function adicionarLinha1() {
                        const tableBody1 = document.getElementById('tableBody1');
                        const novaLinha1 = tableBody1.insertRow();
                        const uniqueClass = `linha-${tableBody1.rows.length}`;
                        novaLinha1.classList.add(uniqueClass);
                        novaLinha1.innerHTML = `
                        <td>
                    <select class="item" name="item">
                    <option selected disabled>Selecione</option>
                    <option value="">Hospedagem</option>
                    <option value="">Almoço</option>
                    <option value="">Janta</option>
                    <option value="">Pedágio</option>
                    <option value="">Estacionamento</option>
                    <option value="">KM Rodado</option>
                    <option value="">Análise de Óleo</option>
                    <option value="">Análise de Vibração</option>
                    <option value="">Concerto de peça (Ex: AC Automação...Usina...Etc.)</option>x
                    <option value="">Fabricação de peça (Ex: Torneiro...RL Silva...Etc.)</option>
                    <option value="">Aluguel de ferramenta</option>
                    <option value="">PMOC</option>
                    <option value="">ART</option>
                    <option value="">Outros</option>
                    </select>
                </td>
            <td><input step="0.01" type="number" class="quantidade" name="quantidade" onchange="atualizaCusto(this.closest('tr').querySelector('.quantidade').value, this.value, this.closest('tr'))"></td>
            <td><input step="0.01" type="number" class="custo-unitario" name="custoUnitario" onchange="atualizaCusto(this.closest('tr').querySelector('.custo-unitario').value, this.value, this.closest('tr'))"></td>
            <td class="total">0,00</td>`;
                        novaLinha1.querySelector('.quantidade').oninput = () => atualizaTotais();
                        novaLinha1.querySelector('.custo-unitario').oninput = () => atualizaTotais();
                    }

                    function atualizarTotalGS() {
                        var totalGS = 0;
                        document.querySelectorAll('#tableBody .totalGS').forEach(function(cell) {
                            totalGS += parseFloat(cell.textContent.replace(',', '.')) || 0;
                        });
                        document.getElementById('totalMOFinal').textContent = totalGS.toFixed(2).replace('.', ',');
                    }

                    function atualizaTotais() {
                        let totalGeral = 0;
                        document.querySelectorAll('#tableBody1 tr').forEach(row => {
                            const quantidade = parseFloat(row.querySelector('.quantidade').value) || 0;
                            const custoUnitario = parseFloat(row.querySelector('.custo-unitario').value) || 0;
                            const total = quantidade * custoUnitario;
                            row.querySelector('.total').textContent = total.toFixed(2).replace('.', ',');
                            totalGeral += total;
                        });
                        document.getElementById('totalGS').textContent = totalGeral.toFixed(2).replace('.', ',');
                        calcularTotalOrcamento()
                    }

                    novaLinha1.querySelector('.quantidade').oninput = () => atualizaTotais();
                    novaLinha1.querySelector('.custo-unitario').oninput = () => atualizaTotais();

                    document.addEventListener('DOMContentLoaded', () => {
                        document.querySelectorAll('.quantidade, .custo-unitario').forEach(input => {
                            input.addEventListener('input', atualizaTotais);
                        });
                    });
                    calcularTotalOrcamento();
                    atualizarTotalGS();
                    atualizarTotalMOGeral();
                    atualizarTotalMO();
                    atualizarTotalMOFinal();
                </script>
                <script>
                    let itemNum = 0;

                    function atualizaTotalItem(row) {
                        const quantidadeInput = row.querySelector('.quantidade');
                        const valorUnitarioInput = row.querySelector('.valorUnitario');
                        const totalCell = row.querySelector('.totalItem');
                        const quantidade = parseFloat(quantidadeInput.value) || 0;
                        const valorUnitario = parseFloat(valorUnitarioInput.value) || 0;
                        const total = quantidade * valorUnitario;
                        totalCell.textContent = total.toFixed(2).replace('.', ',');
                    }

                    function adicionarItem() {
                        itemNum++;
                        const tableBody = document.getElementById('itemsTable').querySelector('tbody');
                        const novaLinha = tableBody.insertRow();
                        novaLinha.innerHTML = `
            <td style="width: ;">${itemNum}</td>
            <td style="width: ;"><input type="number" class="quantidade" name="quantidade" oninput="atualizaTotalItem(this.closest('tr'))" step="any"></td>
            <td>
            <label for="listarProduto[]"></label>
                                        <input style="width: 500px;" class="" list="listarProduto" name="listarProduto[]" placeholder="" autocomplete="off">
                                        <datalist id="listarProduto">
                                            <?php
                                            $sql_list = "SELECT * FROM produtos ORDER BY nome";
                                            $sql_query = $conexao->query($sql_list) or die;
                                            while ($produto = $sql_query->fetch_assoc()) { ?>
                                                <option value="<?php echo $produto['nome'] ?>">
                                                    <?php echo $produto['nome'] ?>
                                                </option>
                                            <?php } ?>
                                        </datalist>
                                        </td>
            <td style="width: ;"><input type="number" class="valorUnitario" name="valorUnitario" oninput="atualizaTotalItem(this.closest('tr'))" step="any"></td>
            <td style="width: ;" class="totalItem">0,00</td>`;
                        atualizarTotalPeças();
                        calcularTotalOrcamento();
                    }

                    function atualizarTotalPeças() {
                        let totalPeças = 0;
                        document.querySelectorAll('#itemsTable .totalItem').forEach(function(cell) {
                            totalPeças += parseFloat(cell.textContent.replace(',', '.')) || 0;
                        });
                        document.getElementById('totalPeças').textContent = totalPeças.toFixed(2).replace('.', ',');
                    }

                    function atualizarTotalPeçasGeral() {
                        let totalPeçasGeral = 0;
                        document.querySelectorAll('#itemsTable .totalItem').forEach(function(cell) {
                            totalPeçasGeral += parseFloat(cell.textContent.replace(',', '.')) || 0;
                        });
                        document.getElementById('totalPeçasGeral').textContent = totalPeçasGeral.toFixed(2).replace('.', ',');
                    }

                    function atualizaTotalItem(row) {
                        const quantidade = parseFloat(row.querySelector('.quantidade').value) || 0;
                        const valorUnitario = parseFloat(row.querySelector('.valorUnitario').value) || 0;
                        const total = quantidade * valorUnitario;
                        row.querySelector('.totalItem').textContent = total.toFixed(2).replace('.', ',');
                        atualizarTotalPeças();
                        atualizarTotalPeçasGeral();
                        calcularTotalOrcamento();
                    }
                </script>
                <script>
                    function calcularTotalOrcamento() {
                        const totalPecas = parseFloat(document.getElementById('totalPeçasGeral').textContent.replace(',', '.')) || 0;
                        const totalServicos = parseFloat(document.getElementById('totalMO').textContent.replace(',', '.')) || 0;
                        const totalGS = parseFloat(document.getElementById('totalGS').textContent.replace(',', '.')) || 0;
                        const impostoIcms = parseFloat(document.getElementById('impostoICMS').querySelector('input').value) || 0;
                        const impostoIss = parseFloat(document.getElementById('impostoIss').querySelector('input').value) || 0;
                        const margemPecas = parseFloat(document.getElementById('margemPecas').querySelector('input').value) || 0;
                        const margemServicos = parseFloat(document.getElementById('margemServicos').querySelector('input').value) || 0;
                        const totalAjustadoPecas = totalPecas / (1 - (margemPecas / 100) - (impostoIcms / 100));
                        const totalTodosServicos = totalServicos + totalGS;
                        const totalAjustadoServicos = totalTodosServicos / (1 - (margemServicos / 100) - (impostoIss / 100));
                        const totalOrcamento = totalAjustadoPecas + totalAjustadoServicos;
                        document.getElementById('totalFinalPecas').textContent = totalAjustadoPecas.toFixed(2).replace('.', ',');
                        document.getElementById('totalMOFinal').textContent = totalAjustadoServicos.toFixed(2).replace('.', ',');
                        document.getElementById('totalOrcamentoFinal').textContent = totalOrcamento.toFixed(2).replace('.', ',');
                        document.getElementById('totalMOGeral').textContent = totalTodosServicos.toFixed(2).replace('.', ',');

                        document.getElementById('totalPecasGeral').textContent = totalPeçasGeral.toFixed(2).replace('.', ',');
                        document.getElementById('inputTotalPecasGeral').value = totalPeçasGeral.toFixed(2);
                    }
                    document.querySelectorAll('#impostoICMS input, #impostoIss input, #margemPecas input, #margemServicos input').forEach(input => {
                        input.addEventListener('input', calcularTotalOrcamento);
                    });
                    document.addEventListener('DOMContentLoaded', calcularTotalOrcamento);
                </script>
                <?php

                function insertMemorial($conexao)
                {
                    if (isset($_REQUEST['submitForm'])) {
                        if (strlen($_POST['numero_memorial'] === '')) {
                        } else {
                            @$numero_memorial = $_POST['numero_memorial'];
                            @$tipoServico = $_POST['listarServico'];
                            @$responsavel_tecnico = $_POST['listarResponsavelT'];
                            @$responsavel_comercial = $_POST['listarResponsavelC'];
                            @$cliente = $_POST['listarCliente'];
                            @$modelo_setor_tag = $_POST['modelo_setor_tag'];
                            @$numero_serie = $_POST['numero_serie'];
                            $sql_code = mysqli_query($conexao, "INSERT INTO orcamentos (numero_memorial, servico, responsavel_tecnico, 
                        responsavel_comercial, cliente, modelo_setor_tag, numero_serie) 
                        VALUES ('$numero_memorial', '$tipoServico', '$responsavel_tecnico', ' $responsavel_comercial', '$cliente', 
                        '$modelo_setor_tag', '$numero_serie')");
                            header("Location: index.php?page=memorial");
                            exit();
                        }
                    } else {
                    }
                }
