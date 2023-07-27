<?php 

date_default_timezone_set("America/Sao_Paulo");
$email_site = "hvfadvocacia@gmail.com";
$nome_empresa = "Sistema HVF Advocacia";

$endereco_empresa = "Rua do Potal Hugo Cursos Nº 1000, Centro - BH - MG - CEP 30555-555";
$texto_rodape = "Desenvolvido por Hugo Vasconcelos - Portal Hugo Cursos";
$telefone_empresa = "(00)00000-0000";

$url_sistema = "http://$_SERVER[HTTP_HOST]/sistema/";
$url = explode("//", $url_sistema);
if($url[1] == 'localhost/'){
	$url_sistema = "http://$_SERVER[HTTP_HOST]/sistema/";
}


//BANCO DE DADOS LOCAL
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'advocacia';



//BANCO DE DADOS HOSPEDADO
// $host = 'sh-pro24.hostgator.com.br';
// $usuario = 'hugocu75_adv';
// $senha = 'hospedagem';
// $banco = 'hugocu75_advocacia';




//VALORES PARA A COMBOBOX DE PAGINAÇÃO
$opcao1 = 10;
$opcao2 = 20;
$opcao3 = 50;

 ?>