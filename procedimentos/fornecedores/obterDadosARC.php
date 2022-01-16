<?php 

require_once "../../classes/conexao.php";
require_once "../../classes/upd_ar.php";


$obj = new fornecedores1();

echo json_encode($obj->obterDados1($_POST['id_ref']));


 ?>

