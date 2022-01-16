

<?php 


require_once "../../classes/conexao.php";
	$c = new conectar();
		$conexao=$c->conexao();

	//$sql = "SELECT ref_art, date, fourni, id_imagem FROM bc";
	$sql = "SELECT ref_art, desc_art, selec_cat, qnut,image_ar,nome_categoria FROM article,categorias where article.selec_cat = categorias.id_categoria   ";
	
	$result = mysqli_query($conexao, $sql);





?>
<head>

</head>

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
		<td><?php echo $mostrar[0]; ?>
		
		</td>
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[5]; ?></td>
		<td><?php echo $mostrar[3]; ?></td>
		<td>
		<img src="../classes/images/<?php echo $mostrar[4]; ?>" width="100" height="80" alt="Illustration des problèmes de suddation" border="0" />
		
		
</td>
		<td>
		
			<span  data-toggle="modal" data-target="#articleUpdate" class="btn btn-warning btn-xs" onclick="adicionarDado1('<?php echo $mostrar[0]; ?>')" title="<?php echo $mostrar[0]; ?>">
				<span class="glyphicon glyphicon-pencil"></span>
		</td>
		
		
		
		
		<td style="vertical-align:middle">
			<span class="btn btn-danger btn-xs" onclick="eliminarProduto('<?php echo $mostrar[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
		
		
		

	
	</tr>
<?php endwhile; ?>
</table>