<?php 
require_once('../models/config.php');

// Check if data is not empty
if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']))
    {
        // Sécurity of XSS attack
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Inject SQL code for find the account
        $check = $bdd->prepare('SELECT pseudo, email, password FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0)
        {
             if(strlen($pseudo) <= 100)
             {
                 if(strlen($email) <= 100)
                 {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $password = hash('sha256', $password);

                        $insert = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :password)');
                        $insert->execute(array(
                            'pseudo' => $pseudo,
                            'email' => $email,
                            'password' => $password
                        ));
                        header('Location: ../views/register.php?reg_err=success');
                    }
                 }
                 else
                 {
                    header('Location: ../views/register.php?reg_err=email_length');
                 }
             }
             else
             {
                 header('Location: ../views/register.php?reg_err=pseudo_length');
             }
        }
        else
        {
            header('Location: ../views/register.php?reg_err=already');
        }
    }