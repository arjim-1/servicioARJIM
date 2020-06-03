<?php
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$datebase = 'php_login_database';

	try {
		$conn = new PDO("mysql:host=$server;dbname=$datebase;", $username, $password);
	} catch (PDOException $e) {
		die('connected failed: '.$e->getMessage());
	}
?>