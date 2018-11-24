<?php
//////////classe de conexao
class Conexao {
	
	public static $instance;
	
	public static function get_instance(){
		//se a instancia nao existir ira instanciar a conexao
		//array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); para inserir no banco com utf8
		if(!isset(self::$instance)){
			self::$instance = new PDO("mysql:host=localhost;dbname=agendamentos;","root","",
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}
		
		return self::$instance;
	}
	
}

?>