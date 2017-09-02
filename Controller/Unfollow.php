<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo " Faça Login";
}
require_once('ConexaoTwitter.php');

$unfollow = $_POST['unfollow'];
$user_id = $_SESSION['user_id'];

$sqlTweet = "DELETE FROM usuario_seguidores WHERE id_usuario=$user_id and seguido_id_usuario=$unfollow";
$queryTweet = mysqli_query($conecta,$sqlTweet);
if($queryTweet){
	echo "Deixou de Seguir!";
}else{
	echo "Erro ".mysqli_error($conecta);
}
?>