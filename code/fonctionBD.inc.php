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

function affichageActivite(){
    $pdo = pdo();
    $select = $pdo->query("SELECT nomActivite, idActivite FROM activite");
    
    while($ligne = $select->fetch()){
    $activite = $ligne['nomActivite'];
    $idA = $ligne['idActivite'];
    echo "<p>  $activite <a href=./edition.php?ancienNomA=$activite> edit</a> <a href=./edition.php?ancienNomA=$idA>Suprimer</a> </p>";
    }
}

function editActivite($nouveauNomA){
    $pdo=pdo();
    $ancienNomA = $_SESSION['ancienNomA'];
    if($nouveauNomA != "")
    {
        $insertion = $pdo->exec("UPDATE activite SET nomActivite='$nouveauNomA' WHERE nomActivite='$ancienNomA'");
    }
}

function affichageClasse(){
    $pdo = pdo();
    $select = $pdo->query("SELECT nomClasse, idClasse FROM classe");
    
    while($ligne = $select->fetch()){
    $classe = $ligne['nomClasse'];
    $idC = $ligne['idClasse'];
    echo "<p>  $classe <a href=./edition.php?ancienNomC=$classe> edit</a> <a href=./edition.php?ancienNomC=$idC>Suprimer</a> </p>";
    }
}

function editClasse($nouveauNomC){
    $pdo=pdo();
    $ancienNomC = $_SESSION['ancienNomC'];
    if($nouveauNomC != "")
    {
        $insertion = $pdo->exec("UPDATE classe SET nomClasse='$nouveauNomC' WHERE nomClasse='$ancienNomC'");
    }
}

function suprimerActivite(){
    $pdo=pdo();
    $ancienNomA = $_SESSION['ancienNomA'];
    $suppresion = $pdo ->exec("DELETE  from activite where idActivite = '$ancienNomA';");
}

function suprimerClasse(){
    $pdo=pdo();
    $ancienNomC = $_SESSION['ancienNomC'];
    $suppresion = $pdo ->exec("DELETE  from classe where idClasse = '$ancienNomC';");
}

?>