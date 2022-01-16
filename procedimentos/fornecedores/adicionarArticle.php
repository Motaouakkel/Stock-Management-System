<?php 

session_start();
require_once "../../classes/conexao.php";
require_once "../../classes/upd_ar.php";




$idusuario = $_SESSION['iduser'];



$obj = new fornecedores1();



$dados=array(
	$idusuario,
	//$_POST['ref_art'],
	$_POST['desc_art'],
	$_POST['selec_cat'],
	$_POST['qnut'],
	$_POST['image_ar'],
	//$_POST['cpf']

);

echo $obj->adicionar($dados);

 ?>