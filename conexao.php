<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$base = 'controleEstoque';
$conexao = new MySQLi($host, $user, $pass, $base);

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
?>
