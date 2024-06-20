<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form id="registrationForm" action="traitement.php?action=register" method="POST">
            <label for="username">username</label>
            <input type="text" id="username" name="username" ><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" ><br>

            <label for="pass1">Mot de passe</label>
            <input type="password" id="password" name="pass1" ><br>

            <label for="pass2">Confirmer le mot de passe</label>
            <input type="password" id="confirm_password" name="pass2" ><br>

            <button type="submit" name="submit">S'inscrire</button><br>
        </form>
    </div>
</body>
</html>
