<?php
//including the database connection file
require_once("../models/configContact.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$bdd->exec("DELETE FROM contacts WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:../views/contact.php");
?>

