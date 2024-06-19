<?php

if(isset($_GET["action"])) {
    switch($_GET["action"]) {
        case "register" :
            $pdo = new PDO("mysql:host=localhost;dbname=authentification_chaima;charset=utf8", "root", "");
     

           
                //filtrer la saisie des champs du formulaire d'inscription 
                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
                $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                if($username && $email && $pass1 && $pass2){
                    // var_dump("ok");die;
                    $requete = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                    $requete->execute(["email" =>$email]);
                    $user = $requete->fetch();
                    //si mon utilisateur existe 
                    if($user){
                        header ("Location: register.php");exit;
                    }else{
                        //insertion de l'utilisateur en BDD
                        // je verifie le mdp et sa confirmation sont les meme et que le mdp esr >= 5 caractères 
                        if($pass1 == $pass2 && strlent($pass1) >= 5) { 
                            $insertUser = $pdo->prepare("INSERT INTO user (username, email, pass1) VALUES (:username, :email, :password)");
                            $insertUser->execute([
                                "username"  => $pseudo,
                                "email" =>$email,
                                "password"  =>password_hash($pass1, PASSWORD_DEFAULT)
                            ]);
                            header("Location: login.php");

                        }
                    }
                }
        break;
           
    }

}
?>