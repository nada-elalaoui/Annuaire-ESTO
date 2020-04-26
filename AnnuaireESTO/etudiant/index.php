<?php
    require("../base.php");
    session_start();
    if(!isset($_SESSION['etudiant'])){
       header("Location: ../index.php"); 
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
    <div id="eindex">
    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='index.php';">Acceuil</button>
    </div>
    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='profile.php';">Mon Profile</button>

    </div>
    <div class="dropdown">
        <button class="dropbtn">PARAMETERES</button>
        <div class="dropdown-content">
            <a href="edit.php?edit=nom"> Nom</a>
            <a href="edit.php?edit=prenom"> Prénom</a>
            <a href="edit.php?edit=email"> E-Mail</a>
            <a href="edit.php?edit=tel"> Téléphone</a>
            <a href="edit.php?edit=mdp"> Mot de passe</a>
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
                       <th>CNE-PPR</th>
                       <th>Email</th>
                       <th>Description</th>
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