<?php 

require_once("../../conexao.php");


$descricao = $_POST['descricao'];
$processo = $_POST['processo'];


//SCRIPT PARA FOTO NO BANCO
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);
$caminho = '../../img/arquivos/' .$nome_img;
    if ($_FILES['foto']['name'] == ""){
     echo "Escolha um arquivo!!";
	exit();
    }else{
      $imagem = $nome_img;
    }
    
    $imagem_temp = $_FILES['foto']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);




if($descricao == ''){
	echo "Preencha a Descrição!!";
	exit();
}




	$res = $pdo->prepare("INSERT into documentos (descricao, data, processo, arquivo) values (:descricao, curDate(), :processo, :arquivo)");

	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":processo", $processo);
	$res->bindValue(":arquivo", $imagem);
	

	$res->execute();



	echo "Cadastrado com Sucesso!!";



?>