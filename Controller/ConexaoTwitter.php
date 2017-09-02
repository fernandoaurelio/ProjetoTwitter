<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$DataBase = "twitter";

// Conexao ao DB

$conecta = mysqli_connect($host, $usuario, $senha, $DataBase);
if(!$conecta){
    echo "Houve um erro de conexão". mysqli_errno($conecta);
}