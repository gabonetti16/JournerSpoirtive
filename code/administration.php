<?php require './fonctionBD.inc.php'; 
    pdo();
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
        if(isset($_REQUEST['nomClasse']))
        {
            $classe = $_REQUEST['nomClasse'];
            implemntClasse($classe);
        }

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