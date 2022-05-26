<?php 
require_once('../models/configContact.php');

if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['email'])) {
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
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Retour en arriére</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$insert = $bdd->prepare('INSERT INTO contacts(name, age, email) VALUES (:name, :age, :email)');
		$insert->execute(array(
			'name' => $name,
			'age' => $age,
			'email' => $email
		));
		
        header('Location: ../views/contact.php');
	}
}