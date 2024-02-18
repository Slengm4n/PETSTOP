<html lang="pt_br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf=-8">
    <meta charset ="utf-8" />
	<link rel="stylesheet" type="text/css" href="../STYLES/style.css">
    <title> LsCustom </title>

</head>

<body>    
<!--HEADER-->
<nav class="Header">
        <label class="logo">LS CUSTOMS</label>
        <ul>
            <li><a href="../PAGES/opcoes.php">OPÇÕES</a></li>
            <li><a href="../PAGES/contato.php">CONTATO</a></li>
        </ul>
    </nav>
    <!--FIM HEADER-->
<br><br>


<?php

include_once "conexao.php";

$acao = $_GET['acao'];
if (isset($_GET['id'])){
    $id = $_GET['id'];
}

switch ($acao) {
    case 'inserir':
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        
        $sql = "INSERT INTO table_user (username, email, password, fullname, phone, birthday)
         VALUES ('$username', '$email', '$password', '$fullname', '$phone', '$birthday')";

        if (!mysqli_query($conn, $sql)) {
            die('Erro ao inserir os dados: ' . mysqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados cadastrados com sucesso!')
            window.location.href='users.php?acao=selecionar'</script> ";
        }
        break;
    
		
		

case 'deletar':
    $sql = "DELETE FROM table_user WHERE user_id = '" . $id . "'";
    
    if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($conn));
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados excluidos com sucesso!')
        window.location.href='users.php?acao=selecionar'</script>";}

        mysqli_close($conn);
        header("Location:users.php?acao=selecionar");
        break;
		

     
case 'montar':

    $id = $_GET ['id'];
    $sql = 'SELECT * FROM table_user WHERE user_id =' . $id;
    $resultado = mysqli_query($conn, $sql) or die('Erro ao retornar dados');

    echo "<div class='center-form'>";
echo "<form method='post' name='dados' action='users.php?acao=atualizar' onSubmit='return enviados();'>";
    echo "<div class='container-pages'>";
    echo "<div class='header-pages'>";
    echo "<h2>Atualização de Registro</h2>";
    echo "</div>";
    echo "<div class='form'>";

        while ($registro = mysqli_fetch_array($resultado)){
            echo "<div class='form-content'>";
            echo "<label for='id'>Código:</label>";
            echo "<input name='id' type='text' class='formbutton' id='id' value='" . $id . "' readonly>";
            echo "</div>";
            
            echo "<div class='form-content'>";
            echo "<td><label for='clientname'>Nome do Cliente:</label></td>";
            echo "<td><input id='clientname' name='clientname' value=" . htmlspecialchars($registro['clientname']) . " ";
            echo "</div>";

            echo "<div class='form-content'>";
            echo "<td><label for='email'>CPF do Cliente:</label></td>";
            echo "<td><input id='email' name='email' value=" .  $registro['email']. " ";
            echo "</div>";

        echo "<div class='form-content'>";
        echo "<td><label for='password'>Endereço do Cliente:</label></td>";
        echo "<td><input id='password' name='password' value=" . $registro['password'] . " ";
        echo "</div>";


        echo "<div class='form-content'>";
        echo "<td><label for='fullname'>CEP do Cliente:</label></td>";
        echo "<td><input id='fullname' name='fullname' value=" . $registro['fullname']. " ";
        echo "</div>";

        echo "<div class='form-content'>";
        echo "<td><label for='phone'>Número de telefone do cliente:</label></td>";
        echo "<td><input type='number' id='phone' name='phone' value=" . $registro['phone'] . " ";
        echo "</div>";

        echo "<div class='form-content'>";
        echo "<td><label for='birthday'>Email do Cliente:</label></td>";
        echo "<td><input type='email' id='birthday' name='birthday' value=" . $registro['birthday'] . " ";
        echo "</div>";

        echo "<div class='form-content'>";
        echo "<button type='submit' class='formobjects'>Atualizar</button>";
        echo "</div>";
    }

    echo "</div>";
    echo "</div>";
    echo "</form>";



    mysqli_close($conn);
    break;

    case 'atualizar':
        $codigo = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
    
    
        $sql = "UPDATE table_users SET username = ' ".$username . "', email = '".$email . "', password = '".$password . "', fullname = '".$fullname . "', phone = '" .$phone . "', birthday = '" .$birthday . "' WHERE user_id = '" .$codigo . "'"; 
    
        if (!mysqli_query($conn, $sql)) {
            die('Erro no comando SQL UPDATE: ' . mysqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizados com sucesso!')
            window.location.href='users.php?acao=selecionar'</script>";
        }
    
        mysqli_close($conn);
        header("Location:users.php?acao=selecionar");
        break;


        
case 'selecionar':
    date_default_timezone_set('America/Sao_Paulo');
    header("Content-type: text/html; charset=utf-8");
    include_once "conexao.php";

    echo "<meta charset='utf-8'>";
    echo "<center> <table class='content-table' style='max-width: 100%; overflow-x: auto;'>";
    date_default_timezone_set('America/Sao_Paulo');
    echo "<thead>";
    echo "<div class='title'>";
    echo "<center>Clientes caastrados na base de dados.<br></center>";
    echo "</div>";
    echo "<tr>";
    echo "<th> Nome do usuário: </th>";
    echo "<th> E-mail: </th>";
    echo "<th> Senha: </th>";
    echo "<th> Nome completo: </th>";
    echo "<th> Data de nascimento: </th>";
    echo "<th> Ação </th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    $sql = "SELECT * FROM table_user"; 
    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    while ($registro = mysqli_fetch_array($resultado)) {
 
        $id = $registro['user_id']; 
        $username = $registro['username'];
        $email = $registro['email'];
        $password = $registro['password'];
        $fullname = $registro['fullname'];
        $phone = $registro['phone'];
        $birthday = $registro['birthday'];

        echo "<tr>";
        echo "<td>" . $username . "</td>";
        echo "<td>" . $email . "</td>";
        echo "<td>" . $password . "</td>";
        echo "<td>" . $fullname . "</td>";
        echo "<td>" . $phone . "</td >";
        echo "<td>" . $birthday . "</td>";
        echo "           
            <td>
                <a href='users.php?acao=deletar&id=$id'><img src='../IMG/delete.png' alt='Deletar' title='Deletar registro'></a>
                <a href='users.php?acao=montar&id=$id'><img src='../IMG/update.png' alt='Atualizar' title='Atualizar registro'></a>
                <a href='../PAGES/clientes.php'><img src='../IMG/input.png' alt='Inserir' registro'></a>
            </td>";

        echo "</tr>";       
    }

    mysqli_close($conn);
    break;

    
default:
        echo "<script language= 'javascript' type= 'text/javascript'> window.location.href= 'index.php'</script>";
        break;
}


?>

</body>

</html>
