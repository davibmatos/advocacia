<?php 

require_once("../../conexao.php");


$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$data = $_POST['data'];

$valor = str_replace(',', '.', $valor);


//SCRIPT PARA FOTO NO BANCO
$caminho = '../../img/pagamentos/' .$_FILES['foto']['name'];
    if ($_FILES['foto']['name'] == ""){
      $imagem = "sem-foto.png";
    }else{
      $imagem = $_FILES['foto']['name']; 
    }
    
    $imagem_temp = $_FILES['foto']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);


$func = $_SESSION['cpf_usuario'];




if($descricao == ''){
	echo "Preencha a Descrição!!";
	exit();
}

if($valor == ''){
	echo "Preencha o Valor!";
	exit();
}


	$res = $pdo->prepare("INSERT into pagar (descricao, valor, vencimento, pago, funcionario, foto) values (:descricao, :valor, :vencimento, :pago, :funcionario, :foto)");

	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":valor", $valor);
	$res->bindValue(":vencimento", $data);
	$res->bindValue(":pago", 'Não');
	$res->bindValue(":funcionario", $func);
	$res->bindValue(":foto", $imagem);

	$res->execute();







	

	echo "Cadastrado com Sucesso!!";



?>