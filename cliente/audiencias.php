<?php $pagina = 'audiencias';
$agora = date('Y-m-d'); ?>

<div class="container">
<div class="row botao-novo">
	<div class="col-md-12">
		
			

	</div>
</div>

<div class="row mt-4">
	<div class="col-md-6 col-sm-12">
		

	</div>


	

	<div class="col-md-6 col-sm-12">

		<div class="float-right mr-4">
			<form id="frm" class="form-inline my-2 my-lg-0" method="post">

				<input class="form-control form-control-sm mr-sm-2" type="text" name="txtbuscar2" id="num_processo" placeholder="Número do Processo">
			
				<input class="form-control form-control-sm mr-sm-2" type="date" name="txtbuscar" id="txtbuscar" value="">

				<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>


<div id="listar">
	
</div>



</div>






<!--CHAMADA DA MODAL OBSERVAÇÕES -->
<?php 
if(@$_GET['funcao'] == 'obs' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>

	<div class="modal" id="modal-obs" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Observações</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">

						<?php 
						$res = $pdo->query("select * from audiencias where id = '$id'");
						$dados = $res->fetchAll(PDO::FETCH_ASSOC);
						$obs = $dados[0]['obs'];
						 ?>
					
						<div class="form-group">
							
							<label class="form-control"><?php echo @$obs ?></label>
						</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-obs">Cancelar</button>
											
						
					</form>
				</div>
			</div>
		</div>
	</div>

	
<?php } ?>



<script>$('#modal-obs').modal("show");</script>






	<!--MASCARAS -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

	<script src="../js/mascaras.js"></script>




	<!--AJAX PARA BUSCAR OS DADOS -->
	<script type="text/javascript">
		$(document).ready(function(){

			var pag = "<?=$pagina?>";
			$('#btn-buscar').click(function(event){
				event.preventDefault();	

				$.ajax({
					url: pag + "/listar.php",
					method: "post",
					data: $('form').serialize(),
					dataType: "html",
					success: function(result){
						$('#listar').html(result)

					},


				})

			})


		})
	</script>








	<!--AJAX PARA LISTAR OS DADOS -->
	<script type="text/javascript">
		$(document).ready(function(){

			var pag = "<?=$pagina?>";

			$.ajax({
				url: pag + "/listar.php",
				method: "post",
				data: $('#frm').serialize(),
				dataType: "html",
				success: function(result){
					$('#listar').html(result)

				},


			})
		})
	</script>



	<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
	<script type="text/javascript">
		$('#num_processo').keyup(function(){
			$('#btn-buscar').click();
		})
	</script>







	<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
	<script type="text/javascript">
		$('#txtbuscar').change(function(){
			$('#btn-buscar').click();
		})
	</script>



	


<!--AJAX PARA LANÇAR OBS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-obs').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/obs.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					
					$('#btn-buscar').click();
					$('#btn-cancelar-obs').click();

				},
				
			})
		})
	})
</script>
