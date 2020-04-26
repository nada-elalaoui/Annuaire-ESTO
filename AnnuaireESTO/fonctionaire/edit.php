<?php
    require("../base.php");
    session_start();
    if(!isset($_SESSION['fonctionaire'])){
       header("Location: ../index.php"); 
    }
    if(isset($_GET['edit'])) setcookie("edit", $_GET['edit'] , time() + (86400 * 30), "/");
    $edit = isset($_GET['edit']) ? $_GET['edit'] : $_COOKIE['edit'];
    if(isset($_POST['modifier'])){

        $sql =   "update employee set $edit='".$_POST['champ']."' where email='".$_SESSION['fonctionaire']."'";
        mysqli_query($con, $sql);
        if($edit == "email") $_SESSION['fonctionaire'] = $_POST['champ'];
        echo "<script>alert('Modification du champs ".$edit." avec succès') </script>";
    }
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Modification de <?php echo $edit; ?></title>
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
        <img src="../src/edit.png">

            <div class="titre">
            </div>
            <div class="groupe">
                <input type="text" name="champ" placeholder="Nouveau <?php echo $edit; ?>..." required>
            </div>
                <div class="groupe">
                <button id="connexion" name="modifier" value="Rechercher" type="submit">Modifier</button>
            </div>
        </form>
    </div>
    <script src="../src/jss.js"></script>

</body>

</html>