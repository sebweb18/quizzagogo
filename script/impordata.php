<?php

$servername = "localhost";
$username = "miseb";
$password = "aformac";

try { 

    $connexion =new PDO("mysql:host=$servername;dbname=quizzagogo", $username,$password); 
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "je suis connecté";

    $req =$connexion->prepare("INSERT INTO utilisateur (id, nom, prenom)
    VALUES
    ('miseb', 'aformac')");
    $req->execute(); 

    $req =$connexion->prepare("INSERT INTO themes (theme)
    VALUES
    ('animaux')");
    $req->execute(); 


} 
catch (PDOException $e){
die ("erreur de creation : ". $e);
}