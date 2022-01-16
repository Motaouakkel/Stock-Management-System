<?php 
	session_start();
	if(isset($_SESSION['usuario'])){

 ?>

<?php 
		
	
		
		require_once "menu.php";
		require_once "../classes/conexao.php"; 
		$c= new conectar();
		$conexao=$c->conexao();
	
		$sql1="SELECT id_categoria,nome_categoria
		from categorias";
		$result1=mysqli_query($conexao,$sql1);
		
		?>

	<!DOCTYPE html>
	<html>
	<head>
	
			<style>
		
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 9px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
		</style>
	
		<title>BC</title>
	


	</head>
	<body>
		<div class="container">
		<br />
			<h2>Modification de l'Article <i class="fa fa-tags"></i></h2>
			<div class="row">
				<div class="col-sm-4">
				
					<form name="article" method="post" action="../classes/modifarticle.php" enctype="multipart/form-data">
					<br />
					<label>Référence d'Article: <i class="fa fa-tag"></i></label>
					
					
						<input type="hidden" class="form-control input-sm" id="ref1" name="ref1" value="<?php $ref1= $_GET['id']; echo $ref1; ?>">
						<input type="text" class="form-control input-sm" id="ref" name="ref" value="<?php $ref= $_GET['Id_ref']; echo $ref; ?>">
						<br />
						<label>Déscription d'Article <i class="fa fa-tag"></i></label>
						<input type="text" class="form-control input-sm" id="description" name="description" value="<?php $description= $_GET['Desc']; echo $description; ?>">
						
						<br />
						<label>Catégorie </label>
						<select class="form-control input-sm" id="selec_cat" name="selec_cat">
							<option value="B">Séléctionner Catégorie</option>
							<?php while($mostrar1=mysqli_fetch_row($result1)): ?>
								<option value="<?php echo $mostrar1[0] ?>"><?php echo $mostrar1[1],"<strong> N° : </p> </strong>" ,$mostrar1[0]; ?></option>
							<?php endwhile; ?>
							</select>
							
						
						<input type="text" class="form-control input-sm" id="secl" name="secl" value="<?php $secl= $_GET['Selc']; echo $secl; ?>">
							<br />
									<label>Qunantité en stock <i class="fa fa-tag"></i></label>
						<input type="text" class="form-control input-sm" id="stock" name="stock" value="<?php $stock= $_GET['stock']; echo $stock; ?>">
						<br />
							<label>Qunantité <i class="fa fa-tag"></i></label>
						<input type="text" class="form-control input-sm" id="qnt" name="qnt" value="<?php $qnt= $_GET['Qunt']; echo $qnt; ?>">
						<br />
						<img src="../classes/images/<?php $imag= $_GET['img']; echo $imag; ?>" width="100" height="80" alt="Veuillez d'Ajouter la photo" border="0" />
						<br />
						<label>Image d'Article *<i class="fa fa-images"></i></label>
						<input type="file" id="image" name="image">
						<br />
						<p align="right"><input type="submit" value="Modifier">
						
					</form>
					
		<!-- Modal -->
				</div>
				</div>
				</div>
				
				</body>
	</html>	
<?php  

}else{
	header("location:../index.php");
}

?>
