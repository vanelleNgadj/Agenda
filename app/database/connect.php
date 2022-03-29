<?php

//Donnéé pour la connection à la base de données
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'agenda';

//variabl de connection qui sera utilsée pour tout appele de la base de donnée
$conn = new MySQLi($host, $user, $pass, $db_name);

//si la connection a échouée on renvoi un message
if($conn->connect_error){
    die('Connection à la base de donnée échouée: ' . $conn->connect_error);
}
//else {
//     echo "Connexion reusi";
// }

