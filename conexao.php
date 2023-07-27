<?php 

require_once("config.php");
@session_start();



try {
	$pdo = new PDO("mysql:dbname=$banco;host=$host", "$usuario", "$senha");

	//conexao mysqli para o backyp e outras apis que precisem de mysqli
	$conn = mysqli_connect($host, $usuario, $senha, $banco);

} catch (Exception $e) {
	echo 'Erro ao conectar com o banco!!' .$e;
}


 ?>