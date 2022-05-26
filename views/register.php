<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inscription</title>
</head>

<body>
    <div class="pt-4">
        <div class="col text-center">
            <a type="button" href="./connection.php"
            class="btn-outline-secondary w-10 mb-2 mt-5 btn rounded-4 col-4 text-center">Se connecter</a>
        </div>
    </div>
    <?php
            if(isset($_GET['reg_err']))
            {
                $err = htmlspecialchars($_GET['reg_err']);

                switch($err)
                {
                    case 'success':
                        ?>
                        <div class="alert alert-success text-center" role="alert">
                            <Strong>Succès</Strong> inscription réussie !
                        </div>
                    <?php
                    break;
                    case 'email':
                        ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <Strong>Erreur</Strong> non valide !
                        </div>
                    <?php 
                    break;   
                    case 'email_length':
                        ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <Strong>Erreur</Strong> email trop long !
                        </div>
                    <?php 
                    break; 
                    case 'pseudo_length':
                        ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <Strong>Erreur</Strong> pseudo trop long !
                        </div>
                    <?php 
                    break; 
                }
            }            
        ?>
    <div class="modal-dialog" role="log">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-body p-5 pt-0 mt-5">
                <form class="" action="../controllers/register.php" method="post"> 
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-4" name="email" id="floatingInput"
                            placeholder="name@example.com" required="required">
                        <label for="floatingInput">Adresse Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-4" name="pseudo" id="floatingInput"
                            placeholder="Pseudo" required="required">
                        <label for="floatingInput">Pseudo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-4" name="password" id="floatingPassword"
                            placeholder="Password" required="required">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                    <div class="col text-center">
                        <button class="w-50 mb-2 mt-5 btn rounded-4 btn-primary col text-center" type="submit">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>