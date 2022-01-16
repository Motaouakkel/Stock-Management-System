<?php 
	session_start();
	if(isset($_SESSION['usuario'])){

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
		<?php require_once "menu.php"; ?>
		<?php 
		
	
		
		
		require_once "../classes/conexao.php"; 
		$c= new conectar();
		$conexao=$c->conexao();
		$sql = "SELECT id_ref,ref_art, desc_art, selec_cat, qnut,stock,image_ar,nome_categoria,id_categoria,image_tmp FROM article,categorias where article.id_cat_art = categorias.id_categoria ";
	
	$result = mysqli_query($conexao, $sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
                //$req = mysql_query($sql) 
              // $sql = "SELECT id_ref,ref_art, desc_art, selec_cat, qnut,image_ar,nome_categoria,id_ref_art  FROM article,categorias where article.id_ref = categorias.id_categoria  ";
	
	//$result = mysqli_query($conexao, $sql);
			//$result = mysqli_query($conexao, $sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$sql1="SELECT id_categoria,nome_categoria
		from categorias";
		$result1=mysqli_query($conexao,$sql1);
		
		?>

	</head>
	<body>
		<div class="container">
		<br />
			<h2>Article <i class="fa fa-tags"></i></h2>
			<div class="row">
				<div class="col-sm-4">
				
					<form name="article" method="post" action="../classes/article.php" enctype="multipart/form-data">
					<br />
				
					<label>Référence d'Article: <i class="fa fa-tag"></i></label>
						<input type="text" class="form-control input-sm" id="ref_art" name="ref_art" placeholder="00xx">
						
						
				
						
						
						
						<br />
						<label>Déscription d'Article <i class="fa fa-tag"></i></label>
						<input type="text" class="form-control input-sm" id="desc_art" name="desc_art" placeholder="Toner HP">
						
						<br />
						
						<label>Catégorie </label>
						<select class="form-control input-sm" id="selec_cat" name="selec_cat">
							<option value="B">Séléctionner Catégorie</option>
							<?php while($mostrar1=mysqli_fetch_row($result1)): ?>
								<option value="<?php echo $mostrar1[0] ?>"><?php echo $mostrar1[1],"<strong> N° : </p> </strong>" ,$mostrar1[0]; ?></option>
							<?php endwhile; ?>
							</select>
							<br />
								<label>N° Catégorie <i class="fa fa-tag"></i></label>
						<input type="text" class="form-control input-sm" id="n_cat" name="n_cat" placeholder="000">
						<br />
							<label>Quantité <i class="fa fa-tag"></i></label>
						<input type="text" class="form-control input-sm" id="qnut" name="qnut" placeholder="000">
						<br />
						<label>Image d'Article <i class="fa fa-images"></i></label>
						<input type="file" id="image" name="image">
						<br />
						<p align="right"><input type="submit" value="Ajouter +">
						
					</form>
					
		<!-- Modal -->
				</div>
				<div class="col-sm-8">
					<div id="">
					
					<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption>
		<h4 class="text-center" style="font-size: 26px;">
		Listes des Articles </i>
		</h4>
	</caption>
	<tr>
		<td>Référence</td>
		<td>Description</td>
		<td>Catégorie</td>
		<td>Quantité</td>
		<td>Image</td>
		<td>Editer</td>
		<td>Supprimer</td>
	</tr>

	<?php while($mostrar=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[2]; ?></td>
		<td><?php echo $mostrar[7]; ?></td>
		<td><?php echo $mostrar[4]; ?>
		
		</td>
		<td>
		<img src="../img/<?php echo $mostrar[9]; ?>" width="100" height="80" alt="Veuillez d'Ajouter la photo" border="0" />
		
		
</td>
		<td>
		<a href='edit.php?id=<?php echo $mostrar[0]; ?>&Id_ref=<?php echo $mostrar[1]; ?>&Desc=<?php echo $mostrar[2]; ?>&Selc=<?php echo $mostrar[7]; ?>&Qunt=<?php echo $mostrar[4]; ?>&stock=<?php echo $mostrar[5]; ?>&


			img=<?php echo "../"; echo $mostrar[9]; ?>' 



			target="_blank"><img src="../img/modif.png" width="30" height="30" ></a>
			
		</td>
		
		
		
		
		<td style="vertical-align:middle">
			<span class="btn btn-danger btn-xs" onclick="eliminarProduto('<?php echo $mostrar[2] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
		
		
		

	
	</tr>
<?php endwhile; ?>


</table>
					
					
					
					</div>
				</div>
				
			</div>
		</div>

		<!-- Button trigger modal -->
		<div class="modal fade" id="articleUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
			
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						
						
						<h4 class="modal-title" id="myModalLabel">Actualiser l'Article </h4>
					</div>
					
					<div class="modal-body">
					
						<form id="frmarticle" method="post">
					
						     <label>Référence d'Article</label>
							 <input type="text" class="form-control input-sm" hidden="" id="id_ref" name="id_ref" >
							<input type="text" class="form-control input-sm" id="ref_art" name="ref_art" value="">

<?php $op = $_GET['id']; echo $op ; ?>


							<label>Déscription</label>
							<input type="text" class="form-control input-sm" id="desc_art" name="desc_art">
							<label>Catégorie</label>
							<input type="text" class="form-control input-sm" id="selec_cat" name="selec_cat">
							<label>Quantité</label>
							<input type="text" class="form-control input-sm" id="qnut" name="qnut">
							<label>Image</label>
							<input type="text" class="form-control input-sm" id="image" name="image">
							
						</form>
						
					
					<div class="modal-footer">
						<button id="btnAdicionarFornecedorU" type="button" class="btn btn-primary" data-dismiss="modal">Actualiser</button>

					
					
				</div>
				
			</div>
			
		</div>
	</div></div>

	</body>
	</html>



	
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tabelaProdutosLoad').load("produtos/tabarc.php");

			$('#btnAddProduto').click(function(){

				vazios=validarFormVazio('frmProdutos');

				if(vazios > 0){
					alertify.alert("Preencha todos os campos!!");
					return false;
				}

				var formData = new FormData(document.getElementById("frmProdutos"));

				$.ajax({
					url: "../procedimentos/produtos/inserirProdutos.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						
						if(r == 1){
							$('#frmProdutos')[0].reset();
							$('#tabelaProdutosLoad').load("produtos/tabarc.php");
							alertify.success("Adicionado com sucesso!!");
						}else{
							alertify.error("Falha ao Adicionar");
						}
					}
				});
				
			});
		});
	</script>
	<script type="text/javascript">
		function adicionarDado1(id_ref){

			$.ajax({
				type:"POST",
				data:"id_ref=" + id_ref,
				url:"../procedimentos/fornecedores/obterDadosARC.php",
				success:function(r){



					dado=jQuery.parseJSON(r);


					$('#ref_art').val(dado['ref_art']);
					$('#desc_art').val(dado['desc_art']);
					$('#selec_cat').val(dado['selec_cat']);
					$('#qnut').val(dado['qnut']);
					$('#image_ar').val(dado['image_ar']);
			



				}
			});
		}

		function eliminarProduto(idProduto){
			alertify.confirm('Voulez vous Supprimer cette ligne', function(){ 
				$.ajax({
					type:"POST",
					data:"idproduto=" + idProduto,
					url:"../procedimentos/produtos/suarc.php",
					success:function(r){
						if(r==1){
							$('#tabelaProdutosLoad').load("produtos/tablebc.php");
							alertify.success("Excluido com sucesso!!");
						}else{
							alertify.error("Suppression Effectuer Actualiser la page par touhe F5 :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado !')
			});
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAdicionarFornecedorU').click(function(){
				dados=$('#frmarticle').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/fornecedores/atualizarArticle.php",
					success:function(r){

						
						if(r==1){
							$('#frmFornecedores')[0].reset();
							$('#tabelaFornecedoresLoad').load("produtos/tabarc.php");
							alertify.success("Actualisation Effectuer!");
						}else{
							alertify.error("Não foi possível atualizar fornecedor");
						}
					}
				});
			})
		})
	</script>

<?php  

}else{
	header("location:../index.php");
}

?>