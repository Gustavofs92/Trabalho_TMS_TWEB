<?php

	session_start();

	$insertProdutoUsuario = " VALUES ('";
	$insertProdutoUsuario .= $_POST['idProduto'];
	$insertProdutoUsuario .= "','";
	$insertProdutoUsuario .= $_POST['idUsuario'];
	$insertProdutoUsuario .= "');";

	echo $sql = "INSERT INTO tbl_produto_usuario (id_produto, id_usuario)".$insertProdutoUsuario;exit;

?>