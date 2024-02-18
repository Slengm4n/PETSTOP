<?php

$servidor = "localhost";
$banco = "db_uniontech";
$usuario = "root";
$senha = "";
$porta = "3306";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

if(!$conn){
    die("A conexão falhou (T-T):  " . mysqli_connect_error());
}
echo "CONEXÄO ESTABELECIDA";


?>
