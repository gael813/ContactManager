<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test",$conn);



 * mysql_connect is deprecated
 * using mysqli_connect instead


$databaseHost = 'localhost';
$databaseName = 'test';
$databaseUsername = 'root';
$databasePassword = 'root';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
?>
*/

$serveur = "localhost";
$port = "3308";
$dbname = "userManagement";
$user = "root";
$pass = "";

try{
	//Database connexion
	$bdd = new PDO("mysql:host=$serveur;port=$port;dbname=$dbname",$user,$pass);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

	//Create users table
	$users = "CREATE TABLE IF NOT EXISTS contacts (
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		email VARCHAR(100) NOT NULL,
		name VARCHAR(100) NULL,
		age INT(2) NOT NULL);";
	$bdd->exec($users);    
}
catch(PDOException $e){
	echo 'Erreur : '.$e->getMessage();
}
