<?php 
/*
nom:Bonetti
prenom:Gabriel
classe:I.DA-P3B
date:02.02.2021
projet:faire un site pour un journee sportive
but:revision php
*/

    require './fonctionBD.inc.php'; 
    pdo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Journer Sportive</title>
</head>

<body>
    <?php
        if(isset($_REQUEST['nom']))
    ?>
    <h1>Inscription à la Journée Sportive du CFPT</h1>
    
    <a href="./formulaire.php">formulaire</a>
    <a href="./administration.php">admin</a>
    <a href="./edition.php">edit</a>

    <form action="#" method="POST">
        <p>Nom:<input type="text" placeholder="Yorke">
        </p>

        <p>Prenom:<input type="text" placeholder="Tham">
        </p>

        <p>Classe:<input type="text" placeholder="IFA-P2B">
        </p>

        <p>Premier choix:
        <select id="choix1">
            <?php
                //ajout les activiter dans la liste déroulante
                getActivites();
            ?>
        </select>
        </p>
        
        <p>Deuxieme choix:
        <select id="choix2">
            <?php
                //ajout les activiter dans la liste déroulante
                getActivites();
            ?>
        </select>
        </p>

        <p>Troisieme choix:
        <select id="choix3">
            <?php
                //ajout les activiter dans la liste déroulante
                getActivites();
            ?>
        </select>
        </p>
        

        <input type="submit" value="Confirmer">
        <input type="submit" value="Annuler">
    </form>


</body>
<footer>
    <p>Bonetti Gabriel</p>
</footer>

</html>