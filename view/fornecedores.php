<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Fiche de Fournisseur</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container">
		<br />
			<h1>Fiche de Fournisseur </h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmFornecedores">
						<label>Nom Sté <i class="fa fa-user"></i></label>
						<input type="text" class="form-control input-sm" id="nome" name="nome" placeholder="Nom de sté">
						<label>Gérant <i class="fa fa-user"></i></label>
						<input type="text" class="form-control input-sm" id="sobrenome" name="sobrenome" placeholder="Sobrenome do Cliente">
						<label>Adresse <i class="fa fa-map-marked"></i></label>
						<input type="text" class="form-control input-sm" id="endereco" name="endereco" placeholder="Digite o Endereço">
						<label>Email <i class="fa fa-envelope-open"></i></label>
						<input type="text" class="form-control input-sm" id="email" name="email" placeholder="example@email.com">
						<label>Téléphone <i class="fab fa-whatsapp"></i></label>
						<input type="text" class="form-control input-sm" id="telefone" name="telefone" placeholder="00 00 00 00 00">
						<label>FAX <i class="fa fa-address-card"></i></label>
						<input type="text" class="form-control input-sm" id="cpf" name="cpf" placeholder="x05 00 00 00 00">
						<p></p>
						<span class="btn btn-primary" id="btnAdicionarFornecedores">Ajouter Fournisseur <i class="fa fa-user-plus"></i></span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tabelaFornecedoresLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="abremodalFornecedoresUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiser le Fournisseur</h4>
					</div>
					<div class="modal-body">
						<form id="frmFornecedoresU">
							<input type="text" hidden="" id="idfornecedorU" name="idfornecedorU">
							<label>Nom Sté</label>
							<input type="text" class="form-control input-sm" id="nomeU" name="nomeU">
							<label>Gérant</label>
							<input type="text" class="form-control input-sm" id="sobrenomeU" name="sobrenomeU">
							<label>Adresse</label>
							<input type="text" class="form-control input-sm" id="enderecoU" name="enderecoU">
							<label>Email</label>
							<input type="text" class="form-control input-sm" id="emailU" name="emailU">
							<label>Téléphone</label>
							<input type="text" class="form-control input-sm" id="telefoneU" name="telefoneU">
							<label>Fax</label>
							<input type="text" class="form-control input-sm" id="cpfU" name="cpfU">
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAdicionarFornecedorU" type="button" class="btn btn-primary" data-dismiss="modal">Actualiser</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<!-- Mascara em JS - Jquery -->

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<!-- 
	<script type="text/javascript">
		$(document).ready(function(){
			$("#telefone").mask("(00) 00000-0000");
			$("#cpf").mask("000.000.000-00");
			$("#telefoneU").mask("(00) 00000-0000");
			$("#cpfU").mask("000.000.000-00");
		});
	</script>-->

	<script type="text/javascript">
		function adicionarDado(idfornecedor){

			$.ajax({
				type:"POST",
				data:"idfornecedor=" + idfornecedor,
				url:"../procedimentos/fornecedores/obterDadosFornecedores.php",
				success:function(r){



					dado=jQuery.parseJSON(r);


					$('#idfornecedorU').val(dado['id_fornecedor']);
					$('#nomeU').val(dado['nome']);
					$('#sobrenomeU').val(dado['sobrenome']);
					$('#enderecoU').val(dado['endereco']);
					$('#emailU').val(dado['email']);
					$('#telefoneU').val(dado['telefone']);
					$('#cpfU').val(dado['cpf']);



				}
			});
		}

		function eliminar(idfornecedor){
			alertify.confirm('Deseja Excluir este fornecedor?', function(){ 
				$.ajax({
					type:"POST",
					data:"idfornecedor=" + idfornecedor,
					url:"../procedimentos/fornecedores/eliminarFornecedores.php",
					success:function(r){



						if(r==1){
							$('#tabelaFornecedoresLoad').load("fornecedores/tabelaFornecedores.php");
							alertify.success("Excluido com sucesso!!");
						}else{
							alertify.error("Não foi possível excluir");
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

			$('#tabelaFornecedoresLoad').load("fornecedores/tabelaFornecedores.php");

			$('#btnAdicionarFornecedores').click(function(){

				vazios=validarFormVazio('frmFornecedores');

				if(vazios > 0){
					alertify.alert("Obligatoir de Remplir les Champs!");
					return false;
				}

				dados=$('#frmFornecedores').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/fornecedores/adicionarFornecedores.php",
					success:function(r){

						if(r==1){
							$('#frmFornecedores')[0].reset();
							$('#tabelaFornecedoresLoad').load("fornecedores/tabelaFornecedores.php");
							alertify.success("Fornecedor Adicionado");
						}else{
							alertify.error("Não foi possível adicionar");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAdicionarFornecedorU').click(function(){
				dados=$('#frmFornecedoresU').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/fornecedores/atualizarFornecedores.php",
					success:function(r){

						
						if(r==1){
							$('#frmFornecedores')[0].reset();
							$('#tabelaFornecedoresLoad').load("fornecedores/tabelaFornecedores.php");
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