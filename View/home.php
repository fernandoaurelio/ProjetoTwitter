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
		$(document).ready(function(){
			// Quando Clica no botão EnviarTweet
			$('#EnviarTweet').click( function(){
				if($('#texto_tweet').val() == ''){
					alert('Campo Vazio');
				}else{
					$.ajax({
						url:'../Controller/AddTweet.php',
						method:'post',
						data: $('#texto_tweet').serialize(),
						success: function(data){
							$('#texto_tweet').val('');
							MostrarPostagens();
						}
					});
				}
			});
			function MostrarPostagens(){
				$.ajax({
					url:'../Controller/PegaTweets.php',
					success: function(data){
						$('#tweets').html(data);
						
					}
				});
			}

			// Função que Faz COntagem de Seguidores
			function Seguidores(){
				$.ajax({
					url:'../Controller/ContagemSeguidor.php',
					success: function(data){
						$('#SeguidoresNums').html(data);
						
					}
				});
			}
			// FUncão Contagem de tweets
			// Função que Faz COntagem de Seguidores
			function Tweets(){
				$.ajax({
					url:'../Controller/ContagemTweets.php',
					success: function(data){
						$('#TweeterNums').html(data);
						
					}
				});
			}
			MostrarPostagens();
			Tweets();
			Seguidores();
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
							<p id="TweeterNums"></p>
							</div>
							<div class="col-md-6">
							Seguidores
							<hr />
							<p id="SeguidoresNums"></p>
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
								<textarea class="form-control" cols="70" rows="4" placeholder="O que está acontecendo?" id="texto_tweet" maxlength = "140" name="texto_tweet"></textarea>
							</div>
						</div>
						<div class="panel-footer">
						<button class="btn btn-success btn-md" id="EnviarTweet">Enviar Tweet</button>
						
						</div>

					</div>
				</div>
				<div id="tweets" class="list-group">
					
				</div>
			</div>
			<!-- Fim Conteudo Central da Pagina -->

			<!-- Conteudo a da  Direita da Pagina -->
			<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-content">
					<div class="panel-header">
					<a href="PesquisarUsuario.php">Pesquisar Pessoas</a>
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