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

			$logado = $_SESSION['nome'];

		$produtos = "SELECT * FROM tbl_produto WHERE usuario = '".$usuario."';";

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
   <h3>Produtos Cadastrados</h3>
   <div class="busca">
   		<table>
   			<tr>
	   			<th style="width:20%">Nome</th>
	   			<th style="width:50%">Marca</th>
	   			<th style="width:20%">KiloWat/H</th>
   			</tr>
   			<?php while($arrayProdutos = mysqli_fetch_array($query, MYSQLI_ASSOC)){?>
   			<tr>
   				<td><?php echo utf8_encode($arrayProdutos['nome']); ?></td>
   				<td><?php echo utf8_encode($arrayProdutos['marca']); ?></td>
   				<td><?php echo utf8_encode($arrayProdutos['kw_h']); ?></td>
   			<tr>
   			<?php } ?>
   		</table>
	</div>
	<h3>Cadastrar Produtos</h3>
	  <form method="post" action="php/cadastrarProduto.php">
	  	  <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
		  <label>Nome: </label>
		  <input type="text" name="nome" required>
		  <label>Marca: </label>
		  <input type="text" name="marca" required>
		  <label>KiloWats/H: </label>
		  <input type="text" size="5" name="kilowat" required>
		  <input type="submit" value="Cadastrar">
	  </form>
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