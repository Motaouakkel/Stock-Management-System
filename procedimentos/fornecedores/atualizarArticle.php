<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/upd_ar.php";



$obj = new fornecedores1();



$dados=array(
	$_POST['ref_art'],
	$_POST['desc_art'],
	$_POST['selec_cat'],
	$_POST['qnut'],
	$_POST['image_ar'],
	//$_POST['telefoneU'],
	//$_POST['cpfU']
	

);

echo $obj->atualizar($dados);

 ?>