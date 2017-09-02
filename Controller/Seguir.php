<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo " Faça Login";
}
require_once('ConexaoTwitter.php');

$seguir_id_usuario = $_POST['seguir_id_usuario'];
$user_id = $_SESSION['user_id'];

$sqlTweet = "INSERT INTO usuario_seguidores (id_usuario,seguido_id_usuario) VALUES($user_id, $seguir_id_usuario )";
$query = mysqli_query($conecta,$sqlTweet);
if($query){
	echo " Cadastro Realizado com Sucesso!";
}else{
	echo "Erro".mysqli_error($conecta);
}

?>