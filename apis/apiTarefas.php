<?php

include_once('conexao.php');

$postjson = json_decode(file_get_contents('php://input'), true);


if($postjson['requisicao'] == 'add'){

   		
$nome = $postjson['nome'];
$descricao = $postjson['descricao'];
$data = $postjson['data'];
$hora = $postjson['hora'];
$cpf_adv = $postjson['cpf_adv'];


if($data == ''){
  $data = date('Y-m-d');
}


//VERIFICAR SE O REGISTRO JÁ ESTÁ CADASTRADO
  $res_c = $pdo->query("select * from tarefas where data = '$data' and hora = '$hora'");
  $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
  $linhas = count($dados_c);
  if($linhas == 0){



  $res = $pdo->prepare("INSERT into tarefas (nome, descricao, data, hora, advogado, status) values (:nome, :descricao, :data, :hora, :advogado, :status) ");

  $res->bindValue(":nome", $nome);
  $res->bindValue(":descricao", $descricao);
  $res->bindValue(":data", $data);
  $res->bindValue(":hora", $hora);
  $res->bindValue(":advogado", $cpf_adv);
  $res->bindValue(":status", 'Agendada');

  $res->execute();

	
  
    $id = $pdo->lastInsertId();


       
  
      if($query){
        $result = json_encode(array('success'=>true, 'id'=>$id));
  
        }else{
        $result = json_encode(array('success'=>false));
    
        }
     echo $result;


}


    
}else if($postjson['requisicao'] == 'listar'){

      $cpf_adv = $postjson['cpf_adv'];
      
      if($postjson['nome'] == ''){
    $query = $pdo->query("SELECT * from tarefas where advogado = '$cpf_adv' and data = curDate() order by hora asc");
  }else{
    $txtbuscar = $postjson['nome'];
    $query = $pdo->query("SELECT * from tarefas where advogado = '$cpf_adv' and data = '$txtbuscar' order by hora asc");

  }
   


    $res = $query->fetchAll(PDO::FETCH_ASSOC);

 	for ($i=0; $i < count($res); $i++) { 
      foreach ($res[$i] as $key => $value) {
      }


      $data = $res[$i]['data'];
      $advogado = $res[$i]['advogado'];

      $data2 = implode('-', array_reverse(explode('-', $data)));

      $res_cli = $pdo->query("SELECT * from advogados where cpf = '$cpf_adv'");
      $dados_cli = $res_cli->fetchAll(PDO::FETCH_ASSOC);
      $linhas_cli = count($dados_cli);
      $nome_advogado = $dados_cli[0]['nome'];


 		$dados[] = array(
 			'id' => $res[$i]['id'],
 			'nome' => $res[$i]['nome'],
 			'descricao' => $res[$i]['descricao'],
			'data' => $data2,
            'hora' => $res[$i]['hora'],
            'advogado' => $nome_advogado,
            'status' => $res[$i]['status'],
            
        
 		);

 }

        if(count($res) > 0){
                $result = json_encode(array('success'=>true, 'result'=>$dados));

            }else{
                $result = json_encode(array('success'=>false, 'result'=>'0'));

            }
            echo $result;

}






elseif($postjson['requisicao'] == 'editar'){
    

$id = $postjson['id'];
$nome = $postjson['nome'];
$descricao = $postjson['descricao'];
$data = $postjson['data'];
$hora = $postjson['hora'];


if($data == ''){
  $res = $pdo->prepare("UPDATE tarefas set nome = :nome, descricao = :descricao, hora = :hora where id = :id ");
}else{

$res = $pdo->prepare("UPDATE tarefas set nome = :nome, descricao = :descricao, data = :data, hora = :hora where id = :id ");
$res->bindValue(":data", $data);
}


  $res->bindValue(":nome", $nome);

  $res->bindValue(":descricao", $descricao);
  
  $res->bindValue(":hora", $hora);
  $res->bindValue(":id", $id);


  $res->execute();


       $id = $pdo->lastInsertId();
       
  
      if($query){
        $result = json_encode(array('success'=>true, 'id'=>$id));
  
        }else{
        $result = json_encode(array('success'=>false));
    
        }
     echo $result;

    }





elseif($postjson['requisicao'] == 'excluir'){
    
 $id = $postjson['id'];           
       

$pdo->query("DELETE from tarefas where id = '$id' ");




                 
      
          if($query){
            $result = json_encode(array('success'=>true));
      
            }else{
            $result = json_encode(array('success'=>false));
        
            }
         echo $result;
    
        }




elseif($postjson['requisicao'] == 'concluir'){
    
 $id = $postjson['id'];           
       

$pdo->query("UPDATE tarefas SET status = 'Concluida' where id = '$id' ");




                 
      
          if($query){
            $result = json_encode(array('success'=>true));
      
            }else{
            $result = json_encode(array('success'=>false));
        
            }
         echo $result;
    
        }



?>