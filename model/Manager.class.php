<?php
//classe de gerenciamento
//metodo para insert no banco
class Manager extends Conexao{
	
	public function insertClient($table, $data){
		$pdo = parent::get_instance();
		$fields = implode(",",array_keys($data));
		$values = ":".implode(", :",array_keys($data));
		$sql = "INSERT INTO $table ($fields) VALUES ($values)";
		$statement = $pdo->prepare($sql);
		
		foreach($data as $key => $value){
			$statement->bindValue(":$key",$value,PDO::PARAM_STR);
			
		}
		$statement->execute();
	}
	

//metodo para select no banco
public function listClient($table) {
	$pdo = parent::get_instance();
	$sql = "SELECT * FROM $table ORDER BY name ASC";
	$statement = $pdo->query($sql);
	$statement->execute();
	//retornando todos os registros
	return $statement->fetchAll();
}

//metodo para delete no banco
public function deleteClient($table, $id){
	$pdo = parent::get_instance();
	$sql = "DELETE FROM $table WHERE id = :id";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(":id",$id);
	$statement->execute();
}	

//metodo para pegar Info do banco para update	
public function getInfo($table, $id){
	$pdo = parent::get_instance();
	$sql = "SELECT * FROM $table WHERE id = :id";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(":id",$id);
	$statement->execute();
	
	return $statement->fetchAll();
}
	
	public function updateClient($table, $data, $id){
		$pdo = parent::get_instance();
		$new_values = "";//responsavel por levar novos valores ao banco de dados
		
		foreach($data as $key => $value){
			$new_values .= "$key=:$key, ";
		}
//substr tirando dois espacos
		$new_values = substr($new_values, 0, -2);
		$sql = "UPDATE $table SET $new_values WHERE id = :id";
		$statement =$pdo->prepare($sql);
		
		foreach($data as $key => $value){
			$statement->bindValue(":$key",$value,PDO::PARAM_STR);
		}
		$statement->execute();
	}

}

?>