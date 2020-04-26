<?php
    require("../base.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: login.php");
    }
    if(isset($_POST['valider'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['nom'];
        $mdp = $_POST['pass'];
        $cne = $_POST['cne'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $filliere = $_POST['filliere'];
        $query = "insert into etudiant(nom, prenom, email, mdp, cne, tel, filliere, description)";
        $query .= "values('".$nom."','".$prenom."','".$email."','".$mdp."','".$cne."','".$tel."','".$filliere."', 'Etudiant')";
        mysqli_query($con, $query);   
        echo "<script>alert('Ajoute du ".$nom." ".$prenom." avec succès') </script>";


    }
    $felas = "select titre from filliere";

    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajouter un Étudiant</title>
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
                <h3>Ajouter un Etudiant</h3>
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
                <input type="password" class="motdepasse" name="pass" placeholder="MOT DE PASSE" required><button class="passview" id="passview" type="button"></button>
            </div>
            <div class="groupe">
                <input type="number" name="tel" placeholder="TEL" required>
            </div>
            <div class="groupe">
                <input type="text" name="cne" placeholder="CNE" required>
            </div>

            <div class="groupe">
                <select name="filliere">
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
                <button id="connexion" name="valider" value="valider" type="submit">Valider</button>
            </div>
        </form>
    </div>
    <script src="../src/jss.js"></script>

</body>

</html>