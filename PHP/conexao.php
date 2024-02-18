<?php

$servidor = "localhost";
$banco = "uniontech_db"; // Corrigido o nome do banco de dados
$usuario = "root";
$senha = "";
$porta = "3306";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

if (!$conn) {
    die("A conexão falhou (T-T): " . mysqli_connect_error());
}
echo "CONEXÃO ESTABELECIDA";

?>