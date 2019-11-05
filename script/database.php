<?php

$servername = "localhost";
$username = "miseb";
$password = "aformac";

//creation bdd
try{
    $connexion = new PDO("mysql:host=$servername", $username, $password);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion ->exec("CREATE DATABASE IF NOT EXISTS quizzagogo CHARACTER SET utf8mb4 COLLATE utf8mb4_bin");
    echo 'BASE DE DONNEE CREE ';
    }
catch(PDOException $e)
    {
    echo ' echec de la connection : ' .$e->getMessage();
    }

try{
    $codesql = "CREATE TABLE IF NOT EXISTS questions(
        id INTEGER AUTO_INCREMENT NOT NULL,
        question TEXT,
        PRIMARY KEY (id_quizz))";

        $connexion->exec($codesql);
        echo 'Table questions créée ';

    $codesql = "CREATE TABLE IF NOT EXISTS reponse(
        id INTEGER AUTO_INCREMENT NOT NULL,
        réponse TEXT,
        PRIMARY KEY (id_question))";

        $connexion->exec($codesql);
        echo 'Table reponse créée ';


    }
catch(PDOException $e){
    echo 'Echec de la connexion : '.$e->getMessage();
}



?>  