<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>



<!DOCTYPE html>
	<html>
	<head>
		<title>Usuários</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container"><br />
			<h1>Gestion d'Utilisateur <i class="fa fa-users-cog"></i></h1>
			<div class="row">
				<div class="col-5">
					<form id="frmRegistro">
						<label>Nom complet <i class="fa fa-user"></i></label>
						<input type="text" class="form-control input-sm" name="nome" id="nome" value=" <?php echo  $nomep ; ?>">
						<label>Utilisateur <i class="fa fa-user-check"></i></label>
						<input type="text" class="form-control input-sm" name="usuario" id="usuario" value=" <?php echo  $userp ; ?>">
						<label>Email <i class="fa fa-envelope-open"></i></label>
						<input type="text" class="form-control input-sm" name="email" id="email" value=" <?php echo  $emailp ; ?>">
						<label>Mode de Passe <i class="fa fa-key"></i></label>
						<input type="text" class="form-control input-sm" name="senha" id="senha" placeholder="************">
						<p></p>
						<span class="btn btn-primary" id="registro">Modifier <i class="fa fa-plus"></i></span>

					</form>
				</div>
				<div class="col-sm-7">
					<div id="tabelaUsuariosLoad"></div>
				</div>
			</div>
		</div>


		<!-- Button trigger modal -->


		<!-- Modal -->
		

	</body>
	</html>

	





<?php
}else{
	header("location:../index.php");
}
?>