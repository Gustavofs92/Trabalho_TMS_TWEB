<?php

	session_start();

	$insertProduto = " VALUES ('";
	$insertProduto .= utf8_decode($_POST['descricao']);
	$insertProduto .= "','";
	$insertProduto .= utf8_decode($_POST['voltagem']);
	$insertProduto .= "','";
	$insertProduto .= $_POST['potenciaUso'];
	$insertProduto .= "','";
	$insertProduto .= $_POST['potenciaStandby'];
	$insertProduto .= "');";

	include 'global.inc.php';

	$sql = "INSERT INTO tbl_produto (descricao,voltagem,potencia_uso,potencia_standby)".$insertProduto;

	$query = $conexao->query($sql);

	if($query){

		header('location:../php/administrativo.php');
	}else{

		header('location:../php/administrativo.php');
	}
?>