<?php 
	session_start();
	$iduser=$_SESSION['iduser'];
	require_once "../../classes/conexao.php";
	require_once "../../classes/produtos.php";

	$obj= new produtos();

	$dados=array();
	
	$nomeImg=$_FILES['imagem']['name'];
	$urlArmazenamento=$_FILES['imagem']['tmp_name'];
	$pasta='../../arquivos/';
	$urlFinal=$pasta.$nomeImg;

	$dadosImg=array(
		$_POST['fourniSelect'],
		$nomeImg,
		$urlFinal
					);

		if(move_uploaded_file($urlArmazenamento, $urlFinal)){
				$idimagem=$obj->addImagem($dadosImg);

				if($idimagem > 0){

					$dados[0]=$_POST['fourniSelect'];
					$dados[1]=$idimagem;
					$dados[2]=$iduser;
					$dados[3]=$_POST['reef'];
					$dados[4]=$_POST['date'];
					echo $obj->inserirProduto($dados);
				}else{
					echo 0;
				}
		}

 ?>