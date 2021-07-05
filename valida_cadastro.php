<?php

$connect = mysqli_connect("localhost", "u857042521_vendoon", "Alm#2017", "u857042521_vendoon");

if(!empty($_POST))
{

    $nome_usuario = mysqli_real_escape_string($connect, $_POST["nome_usuario"]);  
    $email = mysqli_real_escape_string($connect, $_POST["email"]);  
    $senha = mysqli_real_escape_string ($connect, $_POST["senha"]);
    $senha = md5($senha);
    $niveis_acesso_id = mysqli_real_escape_string ($connect, $_POST["niveis_acesso_id"]);
    
    $query = "
    INSERT INTO ws_parceiros_usuarios (nome_usuario, email, senha, niveis_acesso_id)  
     VALUES('$nome_usuario', '$email', '$senha', '$niveis_acesso_id') ";
     
     
    if(mysqli_query($connect, $query))
    {
      $_SESSION['loginErro'] = "Cadastro efetuado com Sucesso!";
        header("Location: index.php");
    }else{	

			$_SESSION['loginErro'] = "Cadastro efetuado com Sucesso!";
			header("Location: index.php");
		}
	}else{
		$_SESSION['loginErro'] = "Cadastro não efetuado!";
		header("Location: index.php");
	}
	
	$conn->close();
?>
