<?php

	session_start();

	$insertUsuario = " VALUES ('"; //Abre o insert dos VALUES
	$insertUsuario .= $_POST['nome'];
	$insertUsuario .= "','";
	$insertUsuario .= $_POST['sobrenome'];
	$insertUsuario .= "','";
	$insertUsuario .= $_POST['senha'];
	$insertUsuario .= "','";
	$insertUsuario .= $_POST['cpf'];
	$insertUsuario .= "','";
	$insertUsuario .= $_POST['usuario'];
	$insertUsuario .= "','";
	$insertUsuario .= $_POST['rua'];
	$insertUsuario .= "','";
	$insertUsuario .= $_POST['numero'];
	$insertUsuario .= "','";
	$insertUsuario .= $_POST['bairro'];
	$insertUsuario .= "','";
	$insertUsuario .= $_POST['cidade'];
	$insertUsuario .= "', CONCAT(";
	$insertUsuario .= $_POST['ano'];
	$insertUsuario .= ",'-',";
	$insertUsuario .= $_POST['mes'];
	$insertUsuario .= ",'-',";
	$insertUsuario .= $_POST['dia'];
	$insertUsuario .= "),'";
	$insertUsuario .= $_POST['sexo'];
	$insertUsuario .= "');";//Fecha os values


	include '/global.inc.php';

	$sql = "INSERT INTO tbl_usuario (nome,sobrenome,senha,cpf,usuario,rua,numero,bairro,cidade,data_nascimento,sexo)".$insertUsuario;

	$query = $conexao->query($sql);
	if($query){

		header('location:../Login.html');
	}else{

		header('location:../Cadastro.html');
	}

?>