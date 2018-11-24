<?php

include_once '../model/Conexao.class.php';
include_once '../model/Manager.class.php';

$manager = new Manager();

//o que vier do $_POST['id']
$id = $_POST['id'];

if(isset($id) && !empty($id)){
	$manager->deleteClient("registros",$id);
	
	//?= enviar informacoes via URL para index.php
	header("Location: ../index.php?cliente_deleted");
}


?>