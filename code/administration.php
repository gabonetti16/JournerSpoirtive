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
    <title>admin</title>
</head>
<body>
    <h1>Page admin</h1>
    <?php
    //quand on appuye sur le boutton valider ajoute une classe
        if(isset($_REQUEST['nomClasse']))
        {
            $classe = $_REQUEST['nomClasse'];
            implemntClasse($classe);
        }

    //quand on appuye sur le boutton valider ajoute une activiter
        if(isset($_REQUEST['nomActivite']))
        {
            $nomActivite = $_REQUEST['nomActivite'];
            implemntActivite($nomActivite);
        }
    ?>
    <a href="./formulaire.php">formulaire</a>
    <a href="./administration.php">admin</a>
    <a href="./edition.php">edit</a>

    <form method="POST" action="#">
        <p>activite:<input type="text" name="nomActivite">
        </p>

        <p>Classe:<input type="text" name="nomClasse">
        </p>
        
        <input type="submit" value="ajouter" name="classe">
    </form>
    
</body>

<footer>
    <p>Bonetti Gabriel</p>
</footer>
</html>