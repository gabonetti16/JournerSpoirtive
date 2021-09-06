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

DEFINE('DB_HOST',"localhost"); // CHEMIN D'ADRESE
DEFINE('DB_NAME',"journeesportive"); //nom de la base de donnée
DEFINE('DB_USER',"root");//nom de l'utilisateur
DEFINE('DB_PASS',"");//MDP de la base de donnée
function getConnexion(){

    static $dbh = null;

    if ($dbh === null) {
        try{
     $connectionString = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . '';
     $dbh = new PDO($connectionString, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
     $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
    echo("<p> Erreur: ".$e->getMessage());


    die();
}
}

    return $dbh;
}
/*
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
*/
//inseration des activiter dans la liste déroulante
function getActivites(){
    $pdo = getConnexion();
    //slection tout les nom des activiter
    $select = $pdo->query("SELECT nomActivite FROM activite");
    //ajoute les activiter dans la lisrte
    while($ligne = $select->fetch()){
        $Activite = $ligne['nomActivite'];
        $idActivite = $ligne['idActivite'];
        echo "<option value=$idActivite>$Activite</option>";
    }
    
}

function getClasse(){
    $pdo = getConnexion();
    //slection tout les nom des activiter
    $select = $pdo->query("SELECT * FROM classe");
    //ajoute les activiter dans la lisrte
    while($ligne = $select->fetch()){
        $Classe = $ligne['nomClasse'];
        $idClasse = $ligne['idClasse'];
        echo "<option value=$idClasse>$Classe</option>";
    }
}

//ajout de classe dans la base de donner
function implemntClasse($classe){
    $pdo = getConnexion();
    //vérifie si la variable est vide
    if($classe != "")
    {
        $insertion = $pdo->exec("INSERT INTO classe (nomClasse) VALUES ('$classe')");
    }
}
//ajout d'activiter dans la base de donner
function implemntActivite($nomActivite){
    $pdo = getConnexion();
    //vérifie si la variable est vide
    if($nomActivite != "")
    {
        $insertion = $pdo->exec("INSERT INTO activite (nomActivite) VALUES ('$nomActivite')");
    }
}
//affiche les activité dans la page d'édite
function affichageActivite(){
    $pdo = getConnexion();
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
    $pdo=getConnexion();
    $ancienNomA = $_SESSION['ancienNomA'];
    if($nouveauNomA != "")
    {
        $insertion = $pdo->exec("UPDATE activite SET nomActivite='$nouveauNomA' WHERE nomActivite='$ancienNomA'");
    }
}
//affiche les classe dans la page d'édite
function affichageClasse(){
    $pdo = getConnexion();
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
    $pdo=getConnexion();
    $ancienNomC = $_SESSION['ancienNomC'];
    if($nouveauNomC != "")
    {
        $insertion = $pdo->exec("UPDATE classe SET nomClasse='$nouveauNomC' WHERE nomClasse='$ancienNomC'");
    }
}

//suprimer une activiter selectioner
function suprimerActivite(){
    $pdo=getConnexion();
    $ancienNomA = $_SESSION['ancienNomA'];
    $suppresion = $pdo ->exec("DELETE  from activite WHERE idActivite = '$ancienNomA';");
}

//suprimer une classe selectioner
function suprimerClasse(){
    $pdo=getConnexion();
    $ancienNomC = $_SESSION['ancienNomC'];
    $suppresion = $pdo ->exec("DELETE  from classe WHERE idClasse = '$ancienNomC';");
}
function ajoutereleve($nomEleve, $prenomEleve, $idClasse){
    $pdo=getConnexion();
    $insertion = $pdo->exec("INSERT INTO eleve (nom, prenom, idClasse) VALUES ('$nomEleve', '$prenomEleve', $idClasse)");
        $idEleve = $pdo->lastInsertId();
        return $idEleve;
}

function inscription($idEleve, $idActivite, $noPref){
    $pdo=getConnexion();
    $requete = "INSERT INTO inscrire (idActivite, idEleve, ordrePref) VALUES ($idActivite, $idEleve, $noPref)";
    $inscription1 = $pdo->prepare($requete);
    $inscription1->execute();
}

?>