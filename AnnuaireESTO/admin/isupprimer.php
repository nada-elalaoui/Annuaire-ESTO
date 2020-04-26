<?php
    require("../base.php");
    session_start();
    if(!isset($_SESSION['admin'])){
       header("Location: index.php"); 
    }
    if(isset($_POST['supprimer'])){

        $sql =   "delete from filliere where titre='".$_POST['titre']."'";
        mysqli_query($con, $sql);

        echo "<script>alert('Suppression du Fillière ".$_POST['titre']." avec succès') </script>";
    }
    $felas = "select titre from filliere";

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
                    <?php 
                    $result = mysqli_query($con, $felas);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>

                    <option value="<?php echo $row['titre']; ?>"><?php echo $row['titre']; ?></option>

                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
                <div class="groupe">
                <button id="connexion" name="supprimer" value="Rechercher" type="submit">Supprimer</button>
            </div>
        </form>
    </div>
    <script src="../src/jss.js"></script>

</body>

</html>