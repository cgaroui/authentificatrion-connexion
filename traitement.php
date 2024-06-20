<?php
session_start();

if(isset($_GET["action"])) {
    switch($_GET["action"]) {
        case "register" :
            //connexion à la BDD
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
                        // var_dump($user);
                        header("Location: login.php");exit;
                    }else{
                       
                        //insertion de l'utilisateur en BDD
                        // je verifie le mdp et sa confirmation sont les meme et que le mdp est >= 5 caractères 
                        if($pass1 == $pass2 && strlen($pass1) >= 5) { 
                            $insertUser = $pdo->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
                            $insertUser->execute([
                                "username"  => $username,
                                "email" =>$email,
                                "password"  =>password_hash($pass1, PASSWORD_DEFAULT)
                            ]);
                            header("Location: login.php");exit;

                        }else {
                           echo "Les mots de passe ne sont pas identiques ou mot de passe trop court";
                        }
                    }
                }else {
                    echo "probleme de saisie dans le champs de formulaire"; 
                }
            header("Location: register.php");exit;
        break;

        case "login" : 
            //je verifie si je soumet bien mon formulaire 
            if(isset($_POST["submit"])) {
                //connexion à la BDD
                $pdo = new PDO("mysql:host=localhost;dbname=authentification_chaima;charset=utf8", "root", "");
                //filtrer les champs ( sécurité contre les failles XSS)
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           
                //verifier que mes filtres sont passées
                if($email && $password){ 
                    $requete = $pdo->prepare("SELECT * from user WHERE email = :email");
                    $requete->execute(["email"=> $email]);
                    $user = $requete->fetch();      // je recupère dans la variable $user les informations de la requete fetch 
                    //  var_dump($user);die;
                    //est ce que l'utilisateur existe
                    if($user) {
                        
                        $hash = $user["password"];
                        //$hash représente le mot de passe haché stocké en base de données, et $password est le mot de passe saisi dans le formulaire. password_verify vérifie si les deux mots de passe correspondent
                        if(password_verify($password, $hash)){
                            $_SESSION["utilisateur"] = $user; //on stocke dans le tableau utilisateur les information de user 
                           header("Location: home.php");
                            exit;
                        }else {
                            echo "utilisateur inconnu ou mot de passe incorrect ";
                            // header("Location: login.php"); exit;
                        }
                    }else {
                        echo "utilisateur inconnu ou mot de passe incorrect";
                        // header("Location: login.php"); exit;
                    }
                }
            }
            header("Location: login.php");exit;
        break;

        case "profil":
            header("Location: profil.php" );exit;

        case "logout":
            unset($_SESSION["utilisateur"]);
            header("Location: home.php");exit;
        break;

        }   
   

}
