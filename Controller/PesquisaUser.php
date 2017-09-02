<?php 
session_start();
require_once('ConexaoTwitter.php');

$pesquisa = $_POST['pesquisa'];
$id_user = $_SESSION['user_id'];
$sql = "SELECT u.*, us.* FROM user AS u LEFT JOIN usuario_seguidores AS us ON(us.id_usuario = $id_user AND u.id = us.seguido_id_usuario)WHERE u.usuario LIKE '%$pesquisa%' AND u.id <> $id_user";
$query = mysqli_query($conecta, $sql);
if($query){
while($busca = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	if($busca['usuario'] == ''){
		echo "Usuario Inexistente";
	}else{
		echo "<a href='#' class='list-group-item'>";
		echo"<strong>".$busca['usuario']."</strong><small> " .$busca['email']."</small>";
		echo"<p class='list-group-item-text pull-right'>";

		// Condição para não seguir quem já foi seguido
		$Status_follow = isset($busca['seguido_id_usuario']) && !empty($busca['seguido_id_usuario']) ? "S" : "N";
		$Btn_seguir_display = 'block';
		$Btn_unfollow_display = 'block';
		if($Status_follow == "N"){
			$Btn_unfollow_display = "none";
		}else{
			$Btn_seguir_display = "none";
		}

		// FIm da Condição
		
		echo"<button type='button' class='btn btn-primary btn-sm botaoSeguir' style='display:".$Btn_seguir_display."' data-id_usuario = ".$busca['id']." id='Btn_seguir".$busca['id']."'>Seguir</button>";
		echo"<button type='button' class='btn btn-danger btn-sm botaoUnfollow' style='display:".$Btn_unfollow_display."' data-id_usuario = ".$busca['id']." id='Btn_unfollow".$busca['id']."'>Unfollow</button>";
		echo"</p>";
		echo"<div class='clearfix'></div>";
		echo"</a>";
	}
}
}

?>