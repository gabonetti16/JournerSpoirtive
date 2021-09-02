<?php
/*
nom:Bonetti
prenom:Gabriel
classe:I.DA-P3B
date:02.02.2021
projet:faire un site pour un journee sportive
but:revision php
*/

//fonction de conection
function pdo() {
    try{
        //se conecter sur sql avec le compte admin
        $pdo = new PDO("mysql:host=localhost;dbname=journeeSportive",'adminJSportif', '');
        //executer en utf8
        $pdo->exec('SET NAMES utf8');
        return $pdo;
    }
    //si impossibilliter de se conecter affiche un message d'erreure
    catch(PDOException $e){
        echo "<p>Erreur: ".$e->getMessage() ;
        die() ;
    }
        
}

//inseration des activiter dans la liste déroulante
function getActivites(){
    $pdo = pdo();
    //slection tout les nom des activiter
    $select = $pdo->query("SELECT nomActivite FROM activite");
    //ajoute les activiter dans la lisrte
    while($ligne = $select->fetch()){
        $Activite = $ligne['nomActivite'];
        echo "<option value=$Activite>$Activite</option>";
    }
    
}
//ajout de classe dans la base de donner
function implemntClasse($classe){
    $pdo = pdo();
    //vérifie si la variable est vide
    if($classe != "")
    {
        $insertion = $pdo->exec("INSERT INTO classe (nomClasse) VALUES ('$classe')");
    }
}
//ajout d'activiter dans la base de donner
function implemntActivite($nomActivite){
    $pdo = pdo();
    //vérifie si la variable est vide
    if($nomActivite != "")
    {
        $insertion = $pdo->exec("INSERT INTO activite (nomActivite) VALUES ('$nomActivite')");
    }
}
//affiche les activité dans la page d'édite
function affichageActivite(){
    $pdo = pdo();
    //selection tout les nom activiter et leurs id
    $select = $pdo->query("SELECT nomActivite, idActivite FROM activite");
    
    //gére l'afichage
    while($ligne = $select->fetch()){
    $activite = $ligne['nomActivite'];
    $idA = $ligne['idActivite'];
    echo "<p>  $activite <a href=./edition.php?ancienNomA=$activite> edit</a> <a href=./edition.php?ancienNomA=$idA>Suprimer</a> </p>";
    }
}
//fonction pour changer le nom de l'activiter
function editActivite($nouveauNomA){
    $pdo=pdo();
    $ancienNomA = $_SESSION['ancienNomA'];
    if($nouveauNomA != "")
    {
        $insertion = $pdo->exec("UPDATE activite SET nomActivite='$nouveauNomA' WHERE nomActivite='$ancienNomA'");
    }
}
//affiche les classe dans la page d'édite
function affichageClasse(){
    $pdo = pdo();
    //selection tout les nom de classe et leurs id
    $select = $pdo->query("SELECT nomClasse, idClasse FROM classe");
    
    //gére l'afichage
    while($ligne = $select->fetch()){
    $classe = $ligne['nomClasse'];
    $idC = $ligne['idClasse'];
    echo "<p>  $classe <a href=./edition.php?ancienNomC=$classe> edit</a> <a href=./edition.php?ancienNomC=$idC>Suprimer</a> </p>";
    }
}
//fonction pour changer le nom de la classe
function editClasse($nouveauNomC){
    $pdo=pdo();
    $ancienNomC = $_SESSION['ancienNomC'];
    if($nouveauNomC != "")
    {
        $insertion = $pdo->exec("UPDATE classe SET nomClasse='$nouveauNomC' WHERE nomClasse='$ancienNomC'");
    }
}

//suprimer une activiter selectioner
function suprimerActivite(){
    $pdo=pdo();
    $ancienNomA = $_SESSION['ancienNomA'];
    $suppresion = $pdo ->exec("DELETE  from activite where idActivite = '$ancienNomA';");
}

//suprimer une classe selectioner
function suprimerClasse(){
    $pdo=pdo();
    $ancienNomC = $_SESSION['ancienNomC'];
    $suppresion = $pdo ->exec("DELETE  from classe where idClasse = '$ancienNomC';");
}

?>