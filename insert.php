<?php
session_start();
setcookie("ck_authorized", "true", 0, "/");
if(!isset($_SESSION["usuarioId"])):
	header("location: index.php");
else:
	$login = $_SESSION["usuarioId"];
endif;


$connect = mysqli_connect("localhost", "u857042521_vendoon", "Alm#2017", "u857042521_vendoon");

if(!empty($_POST))
{
    $nome = mysqli_real_escape_string($connect, $_POST["nome"]);  
    $endereco = mysqli_real_escape_string($connect, $_POST["endereco"]);  
    $telefone = mysqli_real_escape_string($connect, $_POST["telefone"]);  
    $plano = mysqli_real_escape_string($connect, $_POST["plano"]);  
    $data = mysqli_real_escape_string($connect, $_POST["data"]);
    
    $query = "
   INSERT INTO ws_parceiros_clientes (id_user, nome, endereco, telefone, plano, data)  
     VALUES('$login', '$nome', '$endereco', '$telefone', '$plano', '$data') ";
   
   
    if(mysqli_query($connect, $query))
    {
      $_SESSION['sucesso'] = " | Cadastro efetuado com Sucesso!";
        header("Location: dashboard.php");
    }else{	

			$_SESSION['sucesso'] = " | Cadastro efetuado com Sucesso!";
			header("Location: dashboard.php");
		}
	}else{
		$_SESSION['sucesso'] = " | Cadastro não efetuado!";
		header("Location: dashboard.php");
	}
	
	$conn->close();
?>
