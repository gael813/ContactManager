<?php 
    // 
    session_start();
    require_once('../models/config.php');

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Check if users exist in database
        $email = addslashes($email);
        $check = $bdd->prepare('SELECT pseudo, email, password FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();         
        $row = $check->rowCount();
        if($row > 0)
        {
            // Check if email is valid
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Hash the password
                $password = hash('sha256', $password);
                // Check if password hash is valid with the password enter
                if($data['password'] === $password)
                {
                    // Session user equals email
                    $_SESSION['user'] = $data['email'];
                    header('Location:../views/contact.php');
                }
                else
                {
                    echo "password";
                    header('Location:../views/connection.php?login_err=password');
                }
            }
            else
            {
                echo "email";
                header('Location:../views/connection.php?login_err=email');
            }
        }
        else
        {
            echo "already";
            header('Location:../views/connection.php?login_err=already');
        }
    }