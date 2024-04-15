<?php
include('conexao.php'); // Certifique-se de que este arquivo contém a conexão com o banco de dados.

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $impostoICMS = $data['impostoICMS'];
    $totalPecasGeral = $data['totalPecasGeral'];
    $impostoISS = $data['impostoISS'];
    $totalMOGeral = $data['totalMOGeral'];
    $margemPecas = $data['margemPecas'];
    $margemServicos = $data['margemServicos'];
    $totalOrcamentoFinal = $data['totalOrcamentoFinal'];

    // Prepare a SQL statement to insert data
    $stmt = $conexao->prepare("INSERT INTO orcamento (imposto_icms, total_pecas, imposto_iss, total_servicos, margem_pecas, margem_servicos, total_orcamento) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $impostoICMS, $totalPecasGeral, $impostoISS, $totalMOGeral, $margemPecas, $margemServicos, $totalOrcamentoFinal);

    if ($stmt->execute()) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}
$data = json_decode(file_get_contents('php://input'), true);
echo "Dados recebidos: ";
print_r($data);
?>
