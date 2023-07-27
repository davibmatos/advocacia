<?php 

require_once("../../conexao.php");

$id = $_POST['id'];


//BUSCAR A IMAGEM PARA EXCLUIR DA PASTA
$query_con = $pdo->query("SELECT * FROM documentos WHERE id = '$id'");
$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
$imagem = $res_con[0]['arquivo'];
if($imagem != 'sem-foto.jpg'){
	@unlink('../../img/arquivos/'.$imagem);
}

$res = $pdo->prepare("DELETE from documentos where id = :id ");
$res->bindValue(":id", $id);

$res->execute();




?>