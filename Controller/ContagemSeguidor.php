<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo " Faça Login";
}
require_once('ConexaoTwitter.php');


$user_id = $_SESSION['user_id'];
$seguidores = 0;

$sqlTweet = "SELECT COUNT(*)AS seguidores FROM usuario_seguidores WHERE id_usuario = $user_id";
$query = mysqli_query($conecta,$sqlTweet);
if($query){
	$seguidores = mysqli_fetch_array($query);
	echo $seguidores['seguidores'];
}else{
	echo "Erro".mysqli_error($conecta);
}

?>