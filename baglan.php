

<?php

try {

	$db=new PDO ("mysql:host=localhost;dbname=udemy;charset=utf8",'root','yuvan123456');

	echo "Veritabani baglantisi basarili";
	
} catch(PDOExpception $e){

	echo $e->getMessage();
}
	


?>