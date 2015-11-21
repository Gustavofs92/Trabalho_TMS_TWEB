<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> <!--Formatação-->
	<title>Kilowatt Hora</title> <!--Título-->
	<link rel="stylesheet" href="css/Perfil.css"> <!--Referencia arquivo CSS-->

	<?php  
	 //verificar se o usuário está válido.
		session_start();
		$usuario = $_SESSION['usuario'];
			if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
			{
				unset($_SESSION['usuario']);
				unset($_SESSION['senha']);
				header('location:Login.html');
			}

			$logado 	= $_SESSION['nome'];
			$idUsuario 	= $_SESSION['id'];

		$produtos = "SELECT * FROM tbl_produto;";

		include 'php/global.inc.php';

		$query = $conexao->query($produtos);
	?>
</head>
<body>
	<!--CABEÇALHO-->
	<header>
	<section>
   <h1>PERFIL DE CONSUMO</h1>
   <div class="perfil-consumo">
   <p>Bem vindo <b><i><?php echo strtoupper($logado); ?></b></i>. Você economizou <b><i>X</b></i> KW/h nos últimos <b><i>30</b></i> dias.
   </p>
   </div>
   </header>
   <h3>MONTAR PERFIL DE CONSUMO</h3>
   <div class="busca">
   <form method="post" action="php/montarPerfilUsuario.php">
   		<?php while($arrayProdutos = mysqli_fetch_array($query)) { ?>
   				
   				<input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
   				<label>Produto: </label>
   				<input type="hidden" name="idProduto<?php echo utf8_encode($arrayProdutos['id']); ?>" value="<?php echo utf8_encode($arrayProdutos['id']); ?>">
   				<input type="text" name="descricao" value="<?php echo utf8_encode($arrayProdutos['descricao']); ?>" readonly>
   				<label>Estimativa de uso: </label>
   				<input type="text" name="usoEstimativa<?php echo utf8_encode($arrayProdutos['id']); ?>">
   				<br>

   		<?php } ?>
   		<br>
   		<input type="submit" name="cadastrar" value="Cadastrar">
   	</form>
	</div>
	<h3>Conta</h3>
	 <div class="conta">
	 <p>O valor da sua conta atual é de <b>R$250,00</b>.</p>
	 </div>
   </section>
   <br><br><br><br><br><br>
   
   <!--Rodapé-->
   <footer>
   <img src="img/rodape.jpg">&copy; Copyright Kilowatt Hora
   <div class="rodape">
   <ul>
      <li>
	  <a href=="http://facebook.com/kilowatthora"><img src="img/facebook.png"></a>
	  <a href=="http://twitter.com/kilowatthora"><img src="img/twitter.png"></a>
	  <a href=="https://instagram.com/kilowatthora"><img src="img/instagram.png"></a>
	  </li>
    </ul>
	</div>
   </footer>
</body>

</html>