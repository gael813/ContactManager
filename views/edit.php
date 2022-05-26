<?php 
require_once("../controllers/edit.php");

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
	<div class="container">
		<a class="btn btn-primary mt-5" role="button" href="./contact.php">Liste Contacts</a>
		<div class="modal-dialog" role="log">
			<div class="modal-content rounded-5 shadow">
				<div class="modal-body p-5 pt-0 mt-5">
					<form class="" action="../controllers/edit.php" method="post"> 
						<div class="form-floating mb-3">
							<input type="name" class="form-control rounded-4" name="name" id="floatingInput"
								placeholder="name" required="required" value="<?php echo $name;?>">
							<label for="floatingInput">Nom</label>
						</div>
						<div class="form-floating mb-3">
							<input type="age" class="form-control rounded-4" name="age" id="floatingPassword"
								placeholder="age" required="required" value="<?php echo $age;?>">
							<label for="floatingPassword">Age</label>
						</div>
						<div class="form-floating mb-3">
							<input type="email" class="form-control rounded-4" name="email" id="floatingPassword"
								placeholder="exemple@email.fr" required="required" value="<?php echo $email;?>">
							<label for="floatingPassword">Email</label>
						</div>
						<div class="col text-center">
							<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
							<button class="w-50 mb-2 mt-5 btn rounded-4 btn-primary col text-center" name="update" type="submit">Ajouter</button>
						</div>
					</form>
				</div>
			</div>
		</div>	
	</div>	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
</body>
</html>
