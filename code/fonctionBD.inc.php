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

function implemntClasse($classe){
    $pdo = pdo();
    if($classe != "")
    {
        $insertion = $pdo->exec("INSERT INTO classe (nomClasse) VALUES ('$classe')");
    }
}

function implemntActivite($nomActivite){
    $pdo = pdo();
    if($nomActivite != "")
    {
        $insertion = $pdo->exec("INSERT INTO activite (nomActivite) VALUES ('$nomActivite')");
    }
}

?>