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
    $nome_conta = mysqli_real_escape_string($connect, $_POST["nome_conta"]);  
    $banco = mysqli_real_escape_string($connect, $_POST["banco"]);  
    $agencia = mysqli_real_escape_string($connect, $_POST["agencia"]);  
    $conta = mysqli_real_escape_string($connect, $_POST["conta"]);  
    $pix = mysqli_real_escape_string($connect, $_POST["cpf_conta"]);

    $query = "
    INSERT INTO ws_parceiros_conta (id_users, nome_conta, banco, agencia, conta, cpf_conta)  
     VALUES('$login','$nome_conta', '$banco', '$agencia', '$conta', '$pix' )
    ";

     
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


