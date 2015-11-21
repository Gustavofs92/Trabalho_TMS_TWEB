<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> <!--Formatação-->
	<title>Kilowatt Hora</title> <!--Título-->
	<link rel="stylesheet" href="../css/Perfil.css"> <!--Referencia arquivo CSS-->
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

		$produtos = "SELECT * FROM tbl_produto;";

		include 'global.inc.php';

		$query = $conexao->query($produtos);
	?>
</head>
<body>
	<!--CABEÇALHO-->
	<header>
	<section>
   <h1>ÁREA ADMINISTRATIVA</h1>
   <div class="perfil-consumo">
   <p>Bem vindo <b><i><?php echo strtoupper($logado); ?></b></i>.<span align="right"><form method="post" action="../Login.html">
<button type="submit" name="logout">Sair</button>
</form></span>  
   </div>
   </header>
   <h3>Produtos Cadastrados</h3>
   <div class="busca">
   		<table>
   			<thead>
	   			<th style="width:20%">Descricao</th>
	   			<th style="width:15%">Voltagem</th>
	   			<th style="width:15%">Potência em Uso</th>
	   			<th style="width:15%">Potência em Standby</th>
   			</thead>
   			<tbody>
   			<?php 

   			//VARIAVEL PARA VERIFICAR SE HÁ PRODUTOS JÁ CADASTRADOS NO SISTEMA
   			$rows = mysqli_num_rows($query);
   				
   				if($rows < 1){
   			?>

   				<tr>
   					<td> <?php echo '0'; ?> </td> <td> <?php echo '0'; ?> </td> 
   					<td> <?php echo '0'; ?> </td> <td> <?php echo '0'; ?> </td>
   				</tr>
   			<?php }else{ 

   						while($arrayProdutos = mysqli_fetch_array($query)) { ?>
							
							<tr>
								<td><?php echo utf8_encode($arrayProdutos['descricao']); ?></td>
								<td><?php echo utf8_encode($arrayProdutos['voltagem']); ?></td>
								<td><?php echo utf8_encode($arrayProdutos['potencia_uso']); ?></td>
								<td><?php echo utf8_encode($arrayProdutos['potencia_standby']); ?></td>
							</tr>

   						<?php } ?>  			

   			<?php } ?>

   			</tbody>
		</table>
	</div>
	<h3>Cadastrar Produtos</h3>
	  <form method="post" action="cadastrarProduto.php">

		  <label>Descricao: </label>
		  	<input type="text" name="descricao" required>
		  <label>Voltagem: </label>
		  	<input type="text" name="voltagem" required>
		  <label>Potência em uso: </label>
		  	<input type="text" name="potenciaUso" required>
		  <br><br>
		  <label>Potência em standby: </label>
		  	<input type="text" name="potenciaStandby" required>
		  <br><br>
		  	<input class="cadastrar" type="submit" value="Cadastrar">

	  </form>
	 <h3>Conta</h3>
	 <div class="conta">
	 <p>O valor da sua conta atual é de <b>R$250,00</b>.</p>
	 </div>
   </section>
   <br><br><br><br><br><br>
   
   <!--Rodapé-->
   <footer>
   <img src="../img/rodape.jpg">&copy; Copyright Kilowatt Hora
   <div class="rodape">
   <ul>
      <li>
	  <a href=="http://facebook.com/kilowatthora"><img src="../img/facebook.png"></a>
	  <a href=="http://twitter.com/kilowatthora"><img src="../img/twitter.png"></a>
	  <a href=="https://instagram.com/kilowatthora"><img src="../img/instagram.png"></a>
	  </li>
    </ul>
	</div>
   </footer>
</body>

</html>