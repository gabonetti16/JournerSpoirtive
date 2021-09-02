<?php require './fonctionBD.inc.php'; 
    pdo();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edition</title>
</head>
<body>
    
<a href="./formulaire.php">formulaire</a>
    <a href="./administration.php">admin</a>
    <a href="./edition.php">edit</a>
    <form action="#" method="POST">
    <?php
    $nouveauNomA = "";
        affichageActivite();

        if ( isset($_GET["ancienNomA"]) ) {
            $_SESSION["ancienNomA"]= $_GET['ancienNomA'];
        }
        if(isset($_REQUEST['nouveauNomA'])){
            $nouveauNomA = $_REQUEST['nouveauNomA'];
            suprimerActivite();
            editActivite($nouveauNomA);
        }

    ?>
    <input type='text' name='nouveauNomA'> 
    <input type='submit' value='valider'>
    </form>
    
    <form action="#" method="POST">
    <?php
    $nouveauNomC = "";
        affichageClasse();

        if ( isset($_GET["ancienNomC"]) ) {
            $_SESSION["ancienNomC"]= $_GET['ancienNomC'];
        }
        if(isset($_REQUEST['nouveauNomC'])){
            $nouveauNomC = $_REQUEST['nouveauNomC'];
            suprimerClasse();
            editClasse($nouveauNomC);
        }


    ?>
    <input type='text' name='nouveauNomC'> 
    <input type='submit' value='valider'>
    </form>
</body>
</html>