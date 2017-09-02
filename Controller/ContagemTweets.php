<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo " Faça Login";
}
require_once('ConexaoTwitter.php');


$user_id = $_SESSION['user_id'];
$tweetes = 0;

$sqlTweet = "SELECT COUNT(*) AS tweets FROM tweets WHERE user_id = $user_id";
$query = mysqli_query($conecta,$sqlTweet);
if($query){
	$tweetes = mysqli_fetch_array($query);
	echo $tweetes['tweets'];
}else{
	echo "Erro".mysqli_error($conecta);
}

?>