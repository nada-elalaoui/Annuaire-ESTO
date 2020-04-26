<?php
    require("../base.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Acceuil</title>
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
        <form id="form" action="resultats.php" method="post" class="sfmsearch" onsubmit=" return verifierRecherche(this)">
        <img src="../src/search.png">

            <div class="titre">
            </div>
            <div class="groupe">
                <input type="text" name="search" placeholder="Rechercher..." required>
            </div>
            
               <table>
                   <caption>Rechercher par </caption>
                   <tr>
                       <th>Nom</th>
                       <th>Prénom</th>
                       <th>CNE/PPR</th>
                       <th>Email</th>
                       <th>Description</th>
                       <th>Telephone</th>

                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="nom" value="nom">
                        </td>
                        <td>
                            <input type="checkbox" name="prenom" value="prenom">
                        </td>
                        <td>
                            <input type="checkbox" name="identifiant" value="identifiant">
                        </td>
                        <td>
                            <input type="checkbox" name="email" value="email">
                        </td>
                        <td>
                            <input type="checkbox" name="tel" value="tel">
                        </td>
                        <td>
                            <input type="checkbox" name="description" value="description">
                        </td>
                    </tr>
                </table>
                <div class="groupe">
                <button id="connexion" name="valider" value="Rechercher" type="submit">Rechercher</button>
            </div>
        </form>
    </div>
    <script src="../src/jss.js"></script>

</body>

</html>