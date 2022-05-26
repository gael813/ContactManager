<?php 
require_once("../models/configContact.php");

$sql = "SELECT * FROM contacts;";

$q = $bdd->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Gestion des Contacts</title>
</head>

<body>
    <a href="../index.php">Déconnexion</a>
    <div class="container">
<a class="btn btn-primary mt-5" href="./add.php" role="button">Ajouter un contact</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Age</th>
      <th scope="col">Email</th>
      <th scope="col">Modifier</th>
    </tr>
  </thead>
  <tbody>    
	<?php 
	// For each contact in DB display in table
	while($res = $q->fetch()) { 	
        $name = $res['name'];	
        $age = $res['age'];
        $email = $res['email'];
        $id = $res['id'];
		echo "<tr>";
		echo "<td>".$name."</td>";
		echo "<td>".$age."</td>";
		echo "<td>".$email."</td>";	
		echo "<td><a href=\"edit.php?id=$id\">Modifier</a> | <a href=\"../controllers/delete.php?id=$id\" onClick=\"return confirm('Voulez-vous vraiment supprimer ce contact?')\">Supprimer</a></td>";	
        echo "</tr>";	
	}
	?>
</div>
    </tbody>
	</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>