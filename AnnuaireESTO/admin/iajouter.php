<?php
    require("../base.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: login.php");
    }
    if(isset($_POST['valider'])){
        $titre = $_POST['titre'];
       
        $query = "insert into filliere values('".$titre."')";
        mysqli_query($con, $query);

        echo "<script>alert('Ajoute du la Filliere ".$titre." avec succès') </script>";

        

    }
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajouter un Fonctionaire</title>
    <link rel="stylesheet" type="text/css" href="../src/style.css">
</head>

<body>
<div id="eindex">

<div class="dropdown">
        <button class="dropbtn" onclick="location.href='index.php';">Acceuil</button>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Utilisateurs</button>
        <div class="dropdown-content">
            <a href="eajouter.php">Aj. Etudiant</a>
            <a href="fajouter.php">Aj. Fonctionaire</a>
            <a href="index.php">Rechercher</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Fillières</button>
        <div class="dropdown-content">
            <a href="iajouter.php"> Ajouter</a>
            <a href="isupprimer.php"> Supprimer</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='../deconnecter.php';">Déconnexion</button>
    </div>
    </div>
    
    <div id="formulaire">
        <form id="form" action="" method="post">
            <div class="titre">
                <h3>Ajouter une Fillière</h3>
            </div>
            <div class="groupe">
                <input type="text" name="titre" placeholder="Titre du Fillière" required>
            </div>

            <div class="groupe">
                <button id="connexion" name="valider" type="submit">Ajouter</button>
            </div>
        </form>
    </div>
    <script src="../src/jss.js"></script>

</body>

</html>