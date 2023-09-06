<?php
	$link = 'mysql:host=localhost::3906; dbname=proybiblioteca';
	$user = 'root';
	$password = '';
	try{
		$pdo = new PDO($link, $user, $password);
	} catch (PDOException $e) {
		print "Error!!!!".$e->getMessage()."<br>";
		die();
	}
?>
