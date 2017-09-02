<?php
session_start();
require_once 'ConexaoTwitter.php';


// Rcebe O que o user inserir nos Inputs

$login = filter_input(INPUT_POST, "usuario");
$senha = md5(filter_input(INPUT_POST, "senha"));

// Faz a Seleção da DB twiiter

$SelectaLogion = "SELECT * FROM user WHERE usuario ='$login' AND senha = '$senha' ";
$QueryLogin = mysqli_query($conecta, $SelectaLogion);
// Se conseguir realizar a Query ele prepara os resultados da tabela
if($QueryLogin){
	$resultado = mysqli_fetch_array($QueryLogin);
}else{
	echo " Nao Consegui Acessar a Base de Dados";
}
if(isset($resultado['usuario'])){
	$_SESSION['user_id'] = $resultado['id'];
	$_SESSION['usuario'] = $resultado['usuario'];
	$_SESSION['senha'] = $resultado['senha'];
	header('Location:http://localhost/ProjetoTwitter/View/home.php');
}else{
	header('Location:http://localhost/ProjetoTwitter/index.php?erro=1');
}




