<?php
    require("base.php");
    session_start();
    if(isset($_POST['valider'])){
        $email = $_POST['email'];
        $mdp = $_POST['pass'];
        $sql1 = "select * from etudiant where email='".$email."' and mdp='".$mdp."'";
        $sql2 = "select * from employee where email='".$email."' and mdp='".$mdp."'";
        $result = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['etudiant'] = $email;
            header("Location: etudiant/index.php");
        }

        $result = mysqli_query($con, $sql2);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['fonctionaire'] = $email;
            header("Location: fonctionaire/index.php");
        }

        echo "<script>alert('Données  Incorrect') </script>";
       
       
    }
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="src/style.css">

</head>

<body>
    <div id="formulaire">
        <form id="form" action="" method="post">
            <div class="titre">
                <h3>SE CONNECTER</h3>
            </div>
            <div class="groupe">
                <input type="email" name="email" placeholder="Votre email" required>
            </div>
            <div class="groupe">
                <input type="password" name="pass" placeholder="Votre Mot de passe " required>
            </div>
            <div class="groupe">
                <button type="submit"  name="valider" id="connexion">Connexion</button>
            </div>
            <div class="inscription" id="maine">
                Vous voulez créer un compte? <a href="etudiant/inscrire.php">Etudiant </a><a href="fonctionaire/inscrire.php">Fonctionaire</a>
            </div>
        </form>
    </div>
</body>

</html>