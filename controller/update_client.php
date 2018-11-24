<?php

include_once '../model/Conexao.class.php';
include_once '../model/Manager.class.php';

$manager = new Manager();

$update_client = $_POST;//tudo que vier do POST
$id = $_POST['id'];

if(isset($id) && !empty($id)){
	$manager->updateClient("registros",$update_client, $id);
	
	//redirecionando para index
	header("Location: ../index.php?client_update");
}

?>