<?php 

require_once("../../conexao.php");

$url_painel_cli = "";
$url_painel_adv = "";

$descricao = $_POST['descricao'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$local = $_POST['local'];
$processo = $_POST['numero'];
$data2 = implode('/', array_reverse(explode('-', $data)));

$res_proc = $pdo->query("SELECT * from processos where num_processo = '$processo'");
$dados_proc = $res_proc->fetchAll(PDO::FETCH_ASSOC);
$cpf_cliente = $dados_proc[0]['cliente'];
$advogado = $dados_proc[0]['advogado'];

//VERIFICAR SE O REGISTRO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("SELECT * from audiencias where data = '$data' and hora = '$hora' and advogado = '$advogado' and processo = '$processo'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);
if($linhas == 0){
	$res = $pdo->prepare("INSERT into audiencias (processo, descricao, data, hora, local, advogado, cliente) values (:processo, :descricao, :data, :hora, :local, :advogado, :cliente)");

	$res->bindValue(":processo", $processo);
	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":data", $data);
	$res->bindValue(":hora", $hora);
	$res->bindValue(":local", $local);
	$res->bindValue(":advogado", $advogado);
	$res->bindValue(":cliente", $cpf_cliente);
	

	$res->execute();



//CRIE UMA TAREFA COM ESSA NOVA AUDIENCIA
$res = $pdo->prepare("INSERT into tarefas (nome, descricao, data, hora, advogado, status) values ('Audiência', :descricao, :data, :hora, :advogado, 'Agendada')");

	
	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":data", $data);
	$res->bindValue(":hora", $hora);
	$res->bindValue(":advogado", $advogado);
	
	$res->execute();	



	//TRAZER O TOTAL DE AUDIENCIAS JÁ REALIZADAS NO PROCESSO
	$res_a = $pdo->query("SELECT * from processos where num_processo = '$processo'");
	$dados_a = $res_a->fetchAll(PDO::FETCH_ASSOC);
	$total_aud = $dados_a[0]['audiencias'];
	$total_aud = $total_aud + 1;
	
	$res_p = $pdo->prepare("UPDATE processos SET data_audiencia = :data_audiencia, hora_audiencia = :hora_audiencia, audiencias = :audiencias WHERE num_processo = '$processo'");

	$res_p->bindValue(":data_audiencia", $data);
	$res_p->bindValue(":hora_audiencia", $hora);
	$res_p->bindValue(":audiencias", $total_aud);
	

	$res_p->execute();




	echo "Cadastrado com Sucesso!!";



	//TRAZER O EMAIL DO ADVOGADO
	$res_ad = $pdo->query("SELECT * from advogados where cpf = '$advogado'");
	$dados_ad = $res_ad->fetchAll(PDO::FETCH_ASSOC);
	$email_adv = $dados_ad[0]['email'];


		//TRAZER O EMAIL DO CLIENTE
	$res_cl = $pdo->query("SELECT * from clientes where cpf = '$cpf_cliente'");
	$dados_cl = $res_cl->fetchAll(PDO::FETCH_ASSOC);
	$email_cli = $dados_cl[0]['email'];



	//CÓDIGO PARA DISPARAR EMAIL PARA O CLIENTE
	  $url_painel_cli = $url_sistema.'cliente';
	  $to = $email_cli;    //enviar para o email do cliente
      $subject = "Marcação de Audiência dia $data2";

      $message = "

      $descricao !! 
      <br>
      Local da Audiência<br>
      $local - $data2 - $hora
       

          <br><br><br> <i>Ver no seu painel do Cliente - <a title='@$url_painel_cli' href='@$url_painel_cli' target='_blank'>@$url_painel_cli</a></i>
         

                      ";

          $remet = $email_site;
          $headers = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=utf-8;' . "\r\n";
          $headers .= "From: " .$remet;
          @mail($to, $subject, $message, $headers);




         //CÓDIGO PARA DISPARAR EMAIL PARA O ADVOGADO
	  $url_painel_cli = $url_sistema.'advogado';
	  $to = $email_adv;    //enviar para o email do cliente
      $subject = "Marcação de Audiência dia $data2";

      $message = "

      $descricao !! 
      <br>
      Local da Audiência<br>
      $local - $data2 - $hora
       

          <br><br><br> <i>Ver no seu painel do Advogado - <a title='@$url_painel_adv' href='@$url_painel_adv' target='_blank'>@$url_painel_adv</a></i>
         

                      ";

          $remet = $email_site;
          $headers = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=utf-8;' . "\r\n";
          $headers .= "From: " .$remet;
          @mail($to, $subject, $message, $headers);

}else{
	echo "Esta Audiência já está cadastrada!!";
}

?>