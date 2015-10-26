<?php

	session_start();

	$insertProduto = " VALUES ('";
	$insertProduto .= utf8_decode($_POST['nome']);
	$insertProduto .= "','";
	$insertProduto .= utf8_decode($_POST['marca']);
	$insertProduto .= "','";
	$insertProduto .= $_POST['kilowat'];
	$insertProduto .= "','";
	$insertProduto .= $_POST['usuario'];
	$insertProduto .= "');";

	include 'global.inc.php';

	$sql = "INSERT INTO tbl_produto (nome,marca,kw_h,usuario)".$insertProduto;

	$query = $conexao->query($sql);

	if($query){

		header('location:../Perfil.php');
	}else{

		header('location:../Perfil.php');
	}
?>