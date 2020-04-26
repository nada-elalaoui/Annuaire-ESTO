<?php
    require("../base.php");
    if(isset($_POST['valider'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['nom'];
        $mdp = $_POST['pass'];
        $ppr = $_POST['ppr'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $description = $_POST['description'];
        $query = "insert into employee(nom, prenom, email, mdp, ppr, tel, description)";
        $query .= "values('".$nom."','".$prenom."','".$email."','".$mdp."','".$ppr."','".$tel."','".$description."')";
        echo $query;
        mysqli_query($con, $query);

        session_start();
        $_SESSION['fonctionaire'] = $email;
        header("Location: index.php");

    }
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>S'inscrire</title>
    <link rel="stylesheet" type="text/css" href="../src/style.css">
</head>

<body>
    <div id="formulaire">
        <form id="form" action="" method="post">
            <div class="titre">
                <h3>S'INSCRIRE</h3>
            </div>
            <div class="groupe">
                <input type="text" name="nom" placeholder="NOM" required>
            </div>
            <div class="groupe">
                <input type="text" name="prenom" placeholder="PRENOM" required>
            </div>

            <div class="groupe">
                <input type="email" name="email" placeholder="EMAIL" required>
            </div>
            <div class="groupe">
                <input type="number" name="tel" placeholder="TEL" required>
            </div>
            <div class="groupe">
                <input type="text" name="ppr" placeholder="PPR" required>
            </div>
            <div class="groupe">
                <input type="password" class="motdepasse" name="pass" placeholder="MOT DE PASSE" required><button class="passview" id="passview" type="button"></button>
            </div>
            <div class="groupe">
                <select name="description">
                    <option value="Enseignant">Enseignant</option>
                    <option value="Fonctionaire">Fonctionaire</option>

                </select>
            </div>

            <div class="groupe">
                <button id="connexion" name="valider" type="submit">Valider</button>
            </div>
        </form>
    </div>
    <script src="../src/jss.js"></script>

</body>

</html>