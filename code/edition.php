<?php 
/*
nom:Bonetti
prenom:Gabriel
classe:I.DA-P3B
date:02.02.2021
projet:faire un site pour un journee sportive
but:revision php
*/

//link a la page inc
    require './fonctionBD.inc.php'; 
    pdo();
    //demare la session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edition</title>
</head>
<body>
    <!--section de navigation-->
    <a href="./formulaire.php">formulaire</a>
    <a href="./administration.php">admin</a>
    <a href="./edition.php">edit</a>
    <!--formulaire-->
    <form action="#" method="POST">
    <?php
    //initialise le variable nomveauNomA
    $nouveauNomA = "";

    //affiche toute les activiter
        affichageActivite();

        //regarde si la variable ancienNomA a est existante
        if ( isset($_GET["ancienNomA"]) ) {
            $_SESSION["ancienNomA"]= $_GET['ancienNomA'];
        }
        //regarde si on a appuyer sur le bouton et fait les fonction de suprimer ou d'édite
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

        //regarde si la variable ancienClasseA a est existante
        if ( isset($_GET["ancienNomC"]) ) {
            $_SESSION["ancienNomC"]= $_GET['ancienNomC'];
        }
        //regarde si on a appuyer sur le bouton et fait les fonction de suprimer ou d'édite
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