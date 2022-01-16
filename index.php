<?php
	require_once "classes/conexao.php";
	require_once "view/dependencias.php";
	$obj = new conectar();
	$conexao = $obj->conexao();

	$sql = "SELECT * from usuarios";
	$result = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Compte</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
</head>
<body style="background-color: #373f42"><!-- Cor: #337ab7 -->
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-md-4 fundo">
				<div class="panel panel-primary">
					<div class="panel panel-body">
						<h5 class="text-center titulo">Compte</h5><hr>
						<p>
							<img src="img/logo.jpg"  width="100%">
						</p>
						<form id="frmLogin">
							<label for="email"><i class="fa fa-user"></i>  Utilisateur</label>
							<input type="text" class="form-control input-sm" name="user" id="user" placeholder="">
							<label for="senha"><i class="fa fa-key"></i>  Mode de Passe</label>
							<input type="password" name="senha" id="senha" class="form-control input-sm" placeholder="**************">
							<p></p><br>
							<span class="btn btn-block" id="entrarSistema" style="background-color: #2196f3;">
								<span style="color: white;"><i class="fas fa-lock"></i> Entrer </span></span><br>

							

						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vazios=validarFormVazio('frmLogin');

			if(vazios > 0){
				alert("Preencha os campos!!");
				return false;
			}

		dados=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:dados,
			url:"procedimentos/login/login.php",
			success:function(r){
				//alert(r);<a href="registrar.php" class="btn btn-danger btn-md">S'inscrire <i class="fa fa-cogs"></i></a>
				if(r==1){
					window.location="view/inicio.php";
				}else{
					alert("Acesso Negado!!");
				}
			}
		});
	});
	});
</script>