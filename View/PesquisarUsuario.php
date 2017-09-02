<?php 
    session_start();
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="ISO-8859-1">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script type="text/javascript">
		$(document).ready( function(){
			$('#EnviaBusca').click( function(){
				
				if($('#pesquisa').val() == ''){
					alert('Insira um nome ');
				}else{
					$.ajax({
						url:'../Controller/PesquisaUser.php',
						method:'post',
						data:{pesquisa : $('#pesquisa').val()},
						success : function(data){
							$('#MostraUser').html(data); // DIV que recebe o resultado

							// Ações para Seguir o usuario
						$('.botaoSeguir').click( function (){
							var id_usuario = $(this).data('id_usuario');
							$('#Btn_seguir'+id_usuario).hide();
							$('#Btn_unfollow'+id_usuario).show();

							$.ajax({
								url:'../Controller/Seguir.php',
								method:'post',
								data: {seguir_id_usuario : id_usuario},
								success: function(data){
									alert(data);
								}
							});
						});

						// Ações de Unfollow de usuario
						$('.botaoUnfollow').click( function(){
							var id_usuario = $(this).data('id_usuario');
							$('#Btn_seguir'+id_usuario).show();
							$('#Btn_unfollow'+id_usuario).hide();
							
							$.ajax({
								url:'../Controller/Unfollow.php',
								method:'post',
								data:{unfollow : id_usuario},
								success: function(data){
									alert(data);
								}
							});
						});
							
						}
					});
				}
			});
			

			
		});
		</script>
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
			  <li><a href="../View/home.php">Home</a></li>
                      <li><a href="../Controller/logOff.php">LogOff</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />
			<!-- Conteudo a Esquerda da Pagina -->
	    	<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-content">
						<div class="panel-header">
						Bem Vindo <strong><?= $_SESSION['usuario']; ?></strong>
						Seu ID é <?= $_SESSION['user_id'] ?>
						</div>
						<div class="panel-body">
							<div class="col-md-6">
							<p>Tweet</p>
							<hr />
							<p>1</p>
							</div>
							<div class="col-md-6">
							Seguidores
							<hr />
							1
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim do Conteudo a Esquerda -->

			<!-- Conteudo Central da Pagina -->
	    	<div class="col-md-6">
	    		<div class="panel panel-default">
					<div class="panel-content">
						<div class="panel panel-header">
							<p>Seus Tweets</p>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<input type="text" id="pesquisa" class="form-control" placeholder="Quem você quer Encontrar?" name="pesquisa">
							</div>
						</div>
						<div class="panel-footer">
						<button class="btn btn-success btn-md" id="EnviaBusca">Procurar</button>
						
						</div>

					</div>
				</div>
				<div id="MostraUser" class="list-group">
					
				</div>
			</div>
			<!-- Fim Conteudo Central da Pagina -->

			<!-- Conteudo a da  Direita da Pagina -->
			<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-content">
					<div class="panel-header">
					
					</div>
				</div>
			</div>
			</div>

			</div>
			<!-- Fim Conteudo a da  Direita da Pagina -->


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>