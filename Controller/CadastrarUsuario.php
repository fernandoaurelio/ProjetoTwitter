<?php

require_once './ConexaoTwitter.php';

// Variaveis

$usuario = filter_input(INPUT_POST, "usuario");
$email = filter_input(INPUT_POST, "email");
$senha = md5(filter_input(INPUT_POST, "senha"));

// Avalia se Cadastro  existe
$Procura = "SELECT * FROM user WHERE usuario = '$usuario'";
$queryProcura = mysqli_query($conecta,$Procura);
$resposta = mysqli_fetch_array($queryProcura);
if(isset($resposta['usuario'])){
	header('Location:http://localhost/ProjetoTwitter/View/inscrevase.php?erro=2');
	die();
}else{
	// SQL de Cadastro

$cadastrar = "INSERT INTO user (usuario, email, senha) VALUES ('$usuario','$email','$senha')";

// Realiza a Query

$query = mysqli_query($conecta, $cadastrar);
if($query){
    header('Location:http://localhost/ProjetoTwitter/View/inscrevase.php?ok=1');
}else{

    echo "Infelismente, nao consegui te cadastrar";
}

}

