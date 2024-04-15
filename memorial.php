<?php
ob_start();
include('conexao.php');
include('funcoes.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela HTML</title>
    <style>
        input {
            height: 30px;
        }

        .box {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0px;
        }

        h2 {
            background-color: #343A40;
            color: white;
            border-radius: 30px 30px 0px 0px;
            padding: 10px;
            margin: 0;
            font-size: 1.5rem;
        }

        .section {
            background-color: white;
            border-radius: 30px;
            padding: px;
            text-align: left;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #343A40;
        }

        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        button {
            background-color: #343A40;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            box-shadow: none !important;
        }

        button:hover {
            background-color: #495057;
        }

        .form-inline {
            display: flex;
            justify-content: flex-end;
        }

        select {
            height: 30px;
            padding: 0px;
        }
    </style>

</head>

<body>
    <div class="box">
        <form action="" method="post">
            <div class="section">

                <h2>Informações</h2>
                <table class="table table-hover">
                    <tr>
                        <td style="width: 200px;" class="header">N° Memorial</td>
                        <td><input name="numero_memorial" type="number"></td>
                    </tr>
                    <tr>
                        <td class="header">Serviço
                            <button style="margin-top: 14px; text-align: center; border-radius: 30px; line-height: 5px; width: 70px;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                                Novo
                            </button>
                            <div style="margin-top: 250px;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <di style="border-radius: 30px;" class="modal-content">
                                        <div style="background-color: #343A40; border-radius: 30px 30px 0px 0px;" class="modal-header">
                                            <h5 style="background-color: #343A40; color: white;" class="modal-title" id="exampleModalLabel">Cadastrar Serviço</h5>
                                        </div>
                                        <div class="modal-body">
                                            <label for="tipoServico">Serviço:</label>
                                            <input autocomplete="off" type="text" name="tipoServico" placeholder="">
                                            <?php
                                            if (!isset($_POST['submitTipoServico'])) {
                                            } else {
                                                if (strlen($_POST['tipoServico']) == 0) {
                                                } else {
                                                    $tipoServico = $_POST['tipoServico'];
                                                    $sql = "INSERT INTO servicos (nome) VALUES ('$tipoServico')";
                                                    $conexao->query($sql);
                                                    header("Location: index.php?page=memorial");
                                                    exit();
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="modal-footer" style="height: 50px;">
                                            <button style="margin-top: 14px; text-align: center; border-radius: 30px; line-height: 5px; width: 70px; padding: 10px;" style="margin-top: 14px; text-align: center; border-radius: 30px; line-height: 5px; width: 70px;" type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
                                            <button style="margin-top: 14px; text-align: center; border-radius: 30px; line-height: 5px; width: 70px; padding: 10px" type="submit" class="btn btn-primary" name="submitTipoServico">Salvar</button>
                                        </div>
                                </div>
                            </div>
            </div>
            </td>
            <td>
                <input class="" list="listarServico" name="listarServico" placeholder="Selecione" autocomplete="off">
                <datalist style="width: 200px;" name="" id="listarServico">
                    <option selected disabled>Selecione</option>
                    <?php
                    $sql_list = "SELECT * FROM servicos ORDER BY nome";
                    $sql_query = $conexao->query($sql_list);
                    while ($tipo = $sql_query->fetch_assoc()) { ?>
                        <option value="<?php echo $tipo['nome'] ?>">
                            <?php echo $tipo['nome'] ?>
                        </option>
                    <?php    }
                    ?>
                </datalist>
            </td>
            </tr>
            <tr>
                <td class="header">Responsável técnico</td>
                <td>
                    <input class="" list="listarResponsavelT" name="listarResponsavelT" placeholder="Selecione" autocomplete="off">
                    <datalist style="width: 200px;" name="" id="listarResponsavelT">
                        <option selected disabled>Selecione</option>
                        <?php
                        $sql_list = "SELECT * FROM colaboradores WHERE setor = 'Operacional'";
                        $sql_query = $conexao->query($sql_list);
                        while ($nomeT = $sql_query->fetch_assoc()) { ?>
                            <option value="<?php echo $nomeT['nome'] ?>">
                                <?php echo $nomeT['nome'] ?>
                            </option>
                        <?php    }
                        ?>
                    </datalist>
                    <?php
                    if (!isset($_POST['submitResponsavelT'])) {
                    } else {
                        if (strlen($_POST['listarResponsavelT']) == 0) {
                        } else {
                            $listarResponsavelT = $_POST['listarResponsavelT'];
                            $sql = "INSERT INTO colaboradores (nome) VALUES ('$listarResponsavelT')";
                            $conexao->query($sql);
                            header("Location: memorial.php");
                            exit();
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="header">Responsável comercial</td>
                <td>
                    <input class="" list="listarResponsavelC" name="listarResponsavelC" placeholder="Selecione" autocomplete="off">
                    <datalist style="width: 200px;" name="" id="listarResponsavelC">
                        <option selected disabled>Selecione</option>
                        <?php
                        $sql_list = "SELECT * FROM colaboradores WHERE setor = 'Comercial'";
                        $sql_query = $conexao->query($sql_list);
                        while ($nomeC = $sql_query->fetch_assoc()) { ?>
                            <option value="<?php echo $nomeC['nome'] ?>">
                                <?php echo $nomeC['nome'] ?>
                            </option>
                        <?php    }
                        ?>
                    </datalist>
                </td>
            </tr>
            <tr>
                <td class="header">Cliente
                    <a class="btn btn-outline-primary" style="height: 20px; text-align: center; border-radius: 30px; line-height: 5px; width: 70px;" href="index.php?page=clientes">Novo</a>
                </td>
                <td><input class="" list="listarCliente" name="listarCliente" placeholder="Selecione" autocomplete="off">
                    <datalist id="listarCliente" class="">
                        <option selected disabled>Selecione</option>
                        <?php listarCliente($conexao) ?>
                    </datalist>
                </td>
            </tr>
            <tr>
                <td class="header">Ativo</td>
                <td><input autocomplete="off" type="text" name="modelo_setor_tag" id=""></td>
            </tr>
            <tr>
                <td class="header">N° Série</td>
                <td><input autocomplete="off" type="text" name="numero_serie" id=""></td>
            </tr>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
            </table>
    </div>
    <div class="section">
        <h2>Mão de Obra
            <input class="btn btn-primary" style="float: right; height: 30px; text-align: center; border-radius: 5px 20px 5px 5px; margin-right: 0px; width: 70px;" type="button" onclick="adicionarLinha()" value="Incluir">
        </h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Função</th>
                    <th>Horas aplicadas</th>
                    <th>Tipo HH</th>
                    <th>Custo HH</th>
                    <th>Valor HH</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="tableBody">

            </tbody>
            <tr>
                <td colspan="6"><b>Total M.O.</b></td>
                <td id="totalMO"><b>0,00</b></td>
            </tr>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="section">
        <h2>Gastos Gerais
            <input class="btn btn-primary" style="float: right; height: 30px; text-align: center; border-radius: 5px 20px 5px 5px; margin-right: 0px; width: 70px;" type="button" onclick="adicionarLinha1()" value="Incluir">
        </h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantidade</th>
                    <th>Custo unit.</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="tableBody1">

            </tbody>
            <tr>
                <td colspan="3">Total Gastos Gerais</td>
                <td id="totalGS">0,00</td>
            </tr>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="section">
        <h2>Peças
            <input type="button" class="btn btn-primary" style="float: right; height: 30px; text-align: center; border-radius: 5px 20px 5px 5px; margin-right: 0px; width: 70px;" onclick="adicionarItem()" value="Incluir">
        </h2>
        <table class="table table-hover" id="itemsTable">
            <thead>
                <tr>
                    <th style="width: 100px;">Item</th>
                    <th style="width: 100px;">Quantidade</th>
                    <th style="width: 500px;">Produto</th>
                    <th style="width: 100px;">Custo unit.</th>
                    <th style="width: 100px;">Total</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <td colspan="4">Total de peças</td>
            <td id="totalPeças">0,00</td>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

    </div>
    <div class="section">
        <h2>Resumo</h2>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>Impostos ( simples + ICMS)</th>
                    <td id="impostoICMS"><input type="number" placeholder="   %" style="width: 60px;" oninput="calcularTotalOrcamento()"></td>
                    <th>Total Peças</th>
                    <td id="totalPeçasGeral">0,00</td>
                    <td id="totalFinalPecas"><input type="hidden" name="totalFinalPecas" id="inputTotalFinalPecas"></td>
                </tr>
                <tr>
                    <th>Impostos ( simples + ISS)</th>
                    <td id="impostoIss"><input type="number" style="width: 60px;" oninput="calcularTotalOrcamento()" placeholder="   %"></td>
                    <th>Total Serviços</th>
                    <td id="totalMOGeral"></td>
                    <td id="totalMOFinal">0,00</td>
                </tr>
                <tr>
                    <td class="red" colspan="4">Margem peças</td>
                    <td id="margemPecas" class="red"><input type="number" style="width: 60px;" oninput="calcularTotalOrcamento()" placeholder="   %" id="margemPecas"></td>
                </tr>
                <tr>
                    <td class="red" colspan="4">Margem serviços</td>
                    <td id="margemServicos" class="red"><input type="number" style="width: 60px;" oninput="calcularTotalOrcamento()" placeholder="   %"></td>
                </tr>
                <tr>
                    <th colspan="4">TOTAL DO ORÇAMENTO</th>
                    <td id="totalOrcamentoFinal" colspan="2">0,00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <button type=" submit" name="submitForm" style="margin-bottom: 50px;">Salvar</button>
    <?php insertMemorial($conexao); ?>
    </form>
    </div>
</body>

</html>
<?php ob_end_flush(); ?>