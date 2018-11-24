<?php

include_once '../model/Conexao.class.php';
include_once '../model/Manager.class.php';

$manager = new Manager();
//$data tudo que vier do POST
$data = $_POST;

//insert no banco 
if(isset($data) && !empty($data)) {
	
	$manager->insertClient("registros",$data);
	//?= enviar informacoes via URL para index.php
	header("Location: ../index.php?client_add_success");
}





?>