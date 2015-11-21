<?php
	
	session_start();

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	include '/global.inc.php';

	$sql = "SELECT * FROM tbl_usuario WHERE usuario = '".$usuario."' AND senha = '".$senha."';";

	$query =	$conexao->query($sql);
	$array = 	$query->fetch_array();

	$nome = $array['nome'];
	$id   = $array['id'];
	
	if(mysqli_num_rows($query) > 0){

		$_SESSION['usuario'] 	= $usuario;
		$_SESSION['senha'] 		= $senha;
		$_SESSION['nome'] 		= $nome;
		$_SESSION['id'] 		= $id;

		if($usuario == 'admin'){

			header('location:administrativo.php');

		}else{
			header('location:../Perfil.php');
		}

	}else{

		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:../Login.html');
	}


?>