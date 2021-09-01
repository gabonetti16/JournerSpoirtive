<?php
function pdo() {
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=journeeSportive",'adminJSportif', '');
        $pdo->exec('SET NAMES utf8');
        return $pdo;
    }
    //si impossibilliter de se conecter affiche un message d'erreure
    catch(PDOException $e){
        echo "<p>Erreur: ".$e->getMessage() ;
        die() ;
    }
        
}

function getActivites(){
    $pdo = pdo();
    $select = $pdo->query("SELECT nomActivite FROM activite");
    while($ligne = $select->fetch()){
        $Activite = $ligne['nomActivite'];
        echo "<option value=$Activite>$Activite</option>";
    }
    
    }

?>