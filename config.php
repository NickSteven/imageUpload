<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "fileupload";

try{
	$conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	die('Erreur à la connexion de la base de donnée');
}