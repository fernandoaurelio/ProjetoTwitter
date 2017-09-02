<?php 
 session_start();

require_once('ConexaoTwitter.php');

$user_id = $_SESSION['user_id'];

$sqlTweet = "SELECT DATE_FORMAT(t.Datatweet,'%d %M %Y %T') AS data_brasil ,t.Datatweet,t.tweetada, u.usuario FROM  tweets AS t JOIN user AS u ON (t.user_id = u.id) WHERE user_id = $user_id OR user_id IN (SELECT us.seguido_id_usuario FROM usuario_seguidores AS us WHERE us.id_usuario=$user_id) ORDER BY Datatweet DESC ";
$queryTweet = mysqli_query($conecta,$sqlTweet);
if($queryTweet){
	while($postagens = mysqli_fetch_assoc($queryTweet)){
		echo "<a href='#' class='list-group-item'>";
			echo "<h4 class='list-group-item-text'>".$postagens['usuario']." <small>- ".$postagens['data_brasil']."</small></h4>";
			echo "<p class='list-group-item-text'>".$postagens['tweetada']."</p>";
		echo "</a>";
	}
}

?>