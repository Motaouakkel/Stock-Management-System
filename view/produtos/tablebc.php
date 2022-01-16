

<?php 


require_once "../../classes/conexao.php";
	$c = new conectar();
		$conexao=$c->conexao();

	//$sql = "SELECT n_ref, date, fourni, id_imagem FROM bc";
	$sql = "SELECT n_ref, date, fourni, id_imagem,nome FROM bc, fornecedores where bc.fourni = fornecedores.id_fornecedor  ";
	
	$result = mysqli_query($conexao, $sql);





?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption>
		<h4 class="text-center" style="font-size: 26px;">
		Listes des Bons de Commandes </i>
		</h4>
	</caption>
	<tr>
		<td>N° Référence</td>
		<td>Date de Commande</td>
		<td>Fournisseur</td>
		<td>fiche de Bon de Commande</td>
		
		<td>Supprimer</td>
	</tr>

	<?php while($mostrar=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $mostrar[0]; ?></td>
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[4]; ?></td>
		<td><a href="../classes/images/<?php echo $mostrar[3]; ?>" target=_blank>Voir</a>
		
		
		
</td>
		
		
		
		
		
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminarProduto('<?php echo $mostrar[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
		
		
		

	
	</tr>
<?php endwhile; ?>
</table>