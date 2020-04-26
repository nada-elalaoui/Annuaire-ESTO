<?php
    require("../base.php");
    session_start();
    if(!isset($_SESSION['admin'])){
       header("Location: login.php"); 
    }
    
    if(isset($_POST['valider'])){
        $search = $_POST['search'];

        $r1 = "select nom, prenom, email, description,tel from etudiant where ";
        $r2 = "select nom, prenom, email, description, tel from employee where ";

        $or = 0;
        if(isset($_POST['nom'])) { if($or){ $r1 .= 'or';  $r2 .= 'or'; }$r1 .= " nom like '%".$search."%'";  $r2 .= " nom like '%".$search."%'"; $or = 1;}
        if(isset($_POST['prenom'])) { if($or){ $r1 .= 'or';  $r2 .= 'or'; }$r1 .= " prenom like '%".$search."%'";  $r2 .= " prenom like '%".$search."%'"; $or = 1;}
        if(isset($_POST['email'])) { if($or){ $r1 .= 'or';  $r2 .= 'or'; }$r1 .= " email like '%".$search."%'";  $r2 .= " email like '%".$search."%'"; $or = 1;}
        if(isset($_POST['description'])) { if($or){ $r1 .= 'or';  $r2 .= 'or'; }$r1 .= " description like '%".$search."%'"; ; $r2 .= " description like '%".$search."%'"; $or = 1;}
        if(isset($_POST['tel'])) { if($or){ $r1 .= 'or';  $r2 .= 'or'; }$r1 .= " tel like '%".$search."%'";  $r2 .= " tel like '%".$search."%'"; $or = 1;}

        if(isset($_POST['identifiant']))  { if($or){ $r1 .= 'or';  $r2 .= 'or'; }$r1 .= " cne like '%".$search."%'";  $r2 .= " ppr like '%".$search."%'"; $or = 1;}
        
        $sql =  $r1.' UNION '.$r2;
        $result =  mysqli_query($con, $sql);
        setcookie("rr", $sql , time() + (86400 * 30), "/");

    }

    if(isset($_POST['supprimer'])){
        mysqli_query($con, "delete from etudiant where email ='".$_POST['supprimer']."'");
        mysqli_query($con, "delete from employee where email ='".$_POST['supprimer']."'");

        $result =  mysqli_query($con, $_COOKIE['rr']);
        echo "<script>alert('Suppression avec succès') </script>";

    }

    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>RESULTATS</title>
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

        <form id="form" action="" method="post" class="sfmsearch sfrs">
        <div class="rmessage">RESULTATS</div>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <table border="1" class="resultats">
            <tr>
                <td   style="background-color: <?php echo $row['description'] == 'Etudiant' ? '#fef200': ($row['description'] == 'Fonctionaire' ? '#bbffee':'#b3d9ff'); ?>;">
                    <?php echo $row['description'] ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $row['nom']." ".$row['prenom']; ?></td>
            </tr>
            <tr>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td><?php echo $row['tel']; ?></td>
            </tr>
            <tr>
                <td><button type="submit" name="supprimer" value="<?php echo $row['email']; ?>">Supprimer</button> <button type="button" onclick='location.href="edits.php?table=<?php echo $row['description'].'&email='.$row['email']; ?>";'>Modifier</button> </td>
            </tr>
            </table>
        <?php } ?>
        </form>
    </div>
    <script src="../src/jss.js"></script>

</body>

</html>