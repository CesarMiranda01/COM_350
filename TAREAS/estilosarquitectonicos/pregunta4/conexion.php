<?php
	$link = 'mysql:host=localhost; dbname=bd_personas';
	$user = 'root';
	$password = '';
	try{
		$pdo = new PDO($link, $user, $password);
		//$pdo = mysqli_connect("localhost", "root", "", "gestionbiblioteca");

	} catch (PDOException $e) {
		print "Error!!!!".$e->getMessage()."<br>";
		die();
	}
?>