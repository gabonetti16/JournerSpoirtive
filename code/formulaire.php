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
    getConnexion();
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

    <?php

        if(isset($_REQUEST['nom'])){
            $nom = $_REQUEST['nom'];

            if(isset($_REQUEST['prenom'])){
                $prenom = $_REQUEST['prenom'];
                $classe = $_REQUEST['classe'];

                $activite1 = $_REQUEST['activite1'];
                $activite2 = $_REQUEST['activite2'];
                $activite3 = $_REQUEST['activite3'];
                $idEleve = ajoutereleve($nom, $prenom, $classe);
                inscription($idEleve,$activite1, 1);
                //inscription($nom, $prenom, $classe,$activite2,2);
                //inscription($nom, $prenom, $classe,$activite3,3);
                
            
            }
            else
            {
                echo"mareche pas prenom";
            }
        }
        else
        {
            echo"marche pas nom";
        }
        $nom = "";

    ?>

    <form action="#" method="POST">
        <p>Nom:<input type="text" placeholder="Yorke" name="nom">
        </p>

        <p>Prenom:<input type="text" placeholder="Tham" name="prenom">
        </p>

        <p>Classe:
        <select id="Classe" name="classe">
            <?php
                //ajout les activiter dans la liste déroulante
                getClasse();
            ?>
        </select>
        </p>

        <p>Premier choix:
        <select id="choix1" name="activite1">
            <?php
                //ajout les activiter dans la liste déroulante
                getActivites();
            ?>
        </select>
        </p>
        
        <p>Deuxieme choix:
        <select id="choix2" name="activite2">
            <?php
                //ajout les activiter dans la liste déroulante
                getActivites();
            ?>
        </select>
        </p>

        <p>Troisieme choix:
        <select id="choix3" name="activite3">
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