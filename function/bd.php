<?php
try{
    $pdo= new PDO('mysql:dbname=mamoud;host=localhost','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch (PDOException $e){
    die ('Erreur'.$e->getMessage());
}
