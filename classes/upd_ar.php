<?php 

class fornecedores1{
		public function obterDados1($id_ref){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql = "SELECT ref_art, desc_art, selec_cat, qnut, image_ar from article where ref_art='$id_ref' ";

			$result = mysqli_query($conexao, $sql);
			$mostrar = mysqli_fetch_row($result);


			$dados = array(
				'ref_art' => $mostrar[0],
				'desc_art' => $mostrar[1],
				'selec_cat' => $mostrar[2],
				'qnut' => $mostrar[3],
				'image_ar' => $mostrar[4],
			
			);

			return $dados;

	}


	public function atualizar($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		

		$sql = "UPDATE article SET desc_art = '$dados[1]', selec_cat = '$dados[2]',qnut = '$dados[3]',image_ar = '$dados[4]' where ref_art = '$dados[0]'";

		
		echo mysqli_query($conexao, $sql);
	}


	

}

?>

