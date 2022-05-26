<?php
//including the database connection file
require_once("../models/configContact.php");
$baseID = 0;
if(isset($_POST['update'])) {	
	$id = $_POST['id'];
	$baseID = $id;
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Le titre n'est pas renseigné</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>La description n'est pas renseigné</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Le média n'est pas renseigné</font><br/>";
		}		
	} else {	
		//updating the table	
		$insert = $bdd->prepare("UPDATE contacts SET name= :newname, age= :newage, email= :newemail WHERE id=$baseID");

		$insert->execute(array(

       'newname' => $name,

       'newage' => $age,

       'newemail' => $email

       ));
       header('Location: ../views/contact.php');
	}
}
//getting id from url
try
{
	if ($baseID === 0)
	{
		$baseID = $_GET['id'];
	}
}
catch (PDOException $e) {
	
}
//selecting data associated with this particular id
$insert = $bdd->query("SELECT * FROM contacts WHERE id=$baseID");
$data = $insert->fetch();

$name = $data['name'];
$age = $data['age'];
$email = $data['email'];
?>