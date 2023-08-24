<?php
	$link = 'mysql:host=localhost; dbname=bd_libreria';
	$user = 'root';
	$password = '';
	try{
		$pdo = new PDO($link, $user, $password);
	} catch (PDOException $e) {
		print "Error!!!!".$e->getMessage()."<br>";
		die();
	}
?>