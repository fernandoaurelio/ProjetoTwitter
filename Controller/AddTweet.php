<?php
session_start();

require_once('ConexaoTwitter.php');

$tweet = $_POST['texto_tweet'];
$user_id = $_SESSION['user_id'];

$sqlTweet = "INSERT INTO tweets (tweetada, user_id) VALUES('$tweet', $user_id)";
$queryTweet = mysqli_query($conecta,$sqlTweet);

?>