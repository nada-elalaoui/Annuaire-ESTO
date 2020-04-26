<?php
    require("../base.php");
    session_start();
    if(!isset($_SESSION['etudiant'])){
       header("Location: ../index.php"); 
    }
    
    $result =  mysqli_query($con, "select prenom, nom, email, tel, cne, filliere from etudiant where email = '".$_SESSION['etudiant']."'");

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

        <form id="form" action="" method="post" class="sfmsearch">
        <div class="rmessage" style="background-color: #b5bdc4">VOTRE PROFILE</div>
        <?php  $row = mysqli_fetch_array($result); ?>
            <div class="rmessage"><?php echo $row[0]; ?></div>
            <div class="rmessage"><?php echo $row[1]; ?></div>

            <div class="rmessage"><?php echo $row[2]; ?></div>
            <div class="rmessage"><?php echo $row[3]; ?></div>
        </form>
    </div>
    <script src="../src/jss.js"></script>

</body>

</html>