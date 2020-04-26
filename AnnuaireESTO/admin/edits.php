<?php
    require("../base.php");
    session_start();
    if(!isset($_SESSION['admin'])){
       header("Location: index.php"); 
    }
    if(isset($_GET['table'])){
        setcookie("table", $_GET['table'] , time() + (86400 * 30), "/");
        setcookie("email", $_GET['email'] , time() + (86400 * 30), "/");
    }

    if(isset($_POST['modifier'])){
        $champ = $_POST['titre'];
        $nvaleur = $_POST['nvaleur'];

        $table = $_COOKIE['table'];
        $email = $_COOKIE['email'];

        $sql =   "update $table set $champ='".$nvaleur."' where email='".$email."'";
        echo $sql;
        mysqli_query($con, $sql);

        if($champ == "email") setcookie("email", $nvaleur , time() + (86400 * 30), "/");

        echo "<script>alert('Modification du champs ".$champ." avec succès') </script>";

    }

    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Modification</title>
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
    
    <div id="formulaire" >
        <form id="form" action="" method="post" class="sfmsearch">
        <img src="../src/edit.png">

            <div class="titre">
            </div>
            <div class="groupe">
            <select name="titre">
                <option value="nom" disabled> Qu'est que vous voulez modifier?</option>
                <option value="nom">Nom</option>
                <option value="prenom">Prénom</option>
                <option value="tel">Telephone</option>
                <option value="email">E-Mail</option>
                <option value="mdp">Mot de passe</option>
                </select>
            </div>
            <div class="groupe">
                <input type="text" name="nvaleur" placeholder="Saisir la nouvelle valeur..." style="text-align: center"required>
            </div>
                <div class="groupe">
                <button id="connexion" name="modifier" value="modifier" type="submit">Modifier</button>
            </div>
        </form>
    </div>
    <script src="../src/jss.js"></script>

</body>

</html>