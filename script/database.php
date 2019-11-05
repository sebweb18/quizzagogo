<?php

$servername = "localhost";
$username = "miseb";
$password = "aformac";

try{
    $connexion = new PDO("mysql:host=$servername", $username, $password);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion ->exec("CREATE DATABASE IF NOT EXISTS quizzagogo CHARACTER SET utf8mb4 COLLATE utf8mb4_bin");
    echo 'BASE DE DONNEE CREE ';
    }
catch(PDOException $e){
echo ' echec de la connection : ' .$e->getMessage();
    }


//creation table
try {
    $connexion = new PDO("mysql:host=$servername;dbname=quizzagogo", $username,$password);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$codesql = "CREATE TABLE IF NOT EXISTS questions(
    id INT AUTO_INCREMENT NOT NULL,
    question VARCHAR(250),
    id_quizz INT(4),
    PRIMARY KEY (id))";

    $connexion->exec($codesql);
    echo 'Table questions créée ';

$codesql2 = "CREATE TABLE IF NOT EXISTS reponses(
    id INT AUTO_INCREMENT NOT NULL,
    reponse VARCHAR(250),
    id_question INT,
    PRIMARY KEY (id))";

    $connexion->exec($codesql2);
    echo 'Table reponse créee ';

$codesql3 = "CREATE TABLE IF NOT EXISTS fonctions(
    id INT AUTO_INCREMENT NOT NULL,
    fonction VARCHAR(250),
    PRIMARY KEY (id))";

    $connexion->exec($codesql3);
    echo 'Table fonction créee ';

$codesql4 = "CREATE TABLE IF NOT EXISTS themes(
    id INT AUTO_INCREMENT NOT NULL,
    theme VARCHAR(250),
    PRIMARY KEY (id))";
    
    $connexion->exec($codesql4);
    echo 'Table themes créee ';

$codesql5 = "CREATE TABLE IF NOT EXISTS utilisateur(
    id INT AUTO_INCREMENT NOT NULL,
    nom VARCHAR(250),
    prenom VARCHAR(250),
    mdp VARCHAR(250),
    id_fonction INT,
    PRIMARY KEY (id))";
    
    $connexion->exec($codesql5);
    echo 'Table utilisateur créee ';

$codesql6 = "CREATE TABLE IF NOT EXISTS quizz(
    id INT AUTO_INCREMENT NOT NULL,
    nomquizz VARCHAR(250),
    id_theme INTEGER, FOREIGN KEY(id_theme) REFERENCES themes(id),
    id_utilisateur INT,   
    PRIMARY KEY (id))";
        
    $connexion->exec($codesql6);
    echo 'Table quizz créee ';
    
}
catch(PDOException $e){
    echo 'Echec de la connexion : '.$e->getMessage();
}