<?php
    session_start();
    if(isset($_POST['valider'])){
        $email = $_POST['email'];
        $mdp = $_POST['pass'];
        if ($email == 'admin@site.com' && $mdp == '1234') {
            $_SESSION['admin'] = $email;
            header("Location: index.php");

        }
        echo "<script>alert('Données  Incorrect') </script>";
       
       
    }

    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="../src/style.css">

</head>

<body>
    <div id="formulaire">
        <form id="form" action="" method="post">
            <div class="titre">
                <h3>SE CONNECTER ADMIN</h3>
            </div>
            <div class="groupe">
                <input type="email" name="email" placeholder="Votre nom d'utilisateur" required>
            </div>
            <div class="groupe">
                <input type="password" name="pass" placeholder="Votre Mot de passe " required>
            </div>
            <div class="groupe">
                <button type="submit"  name="valider" id="connexion">Connexion</button>
            </div>

        </form>
    </div>
</body>

</html>