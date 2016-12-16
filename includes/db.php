<?php
    // Asocijativni niz
    $db["db_host"] = "localhost";
    $db["db_user"] = "root";
    $db["db_pass"] = "";
    $db["db_name"] = "cms";
    // Funkcija za pretvaranje u konstante i karaktere u velika slova iz Asoc niza koriscenjem petlje
    foreach($db as $key => $value) {
        define(strtoupper($key), $value);
    }
    // Konekcija na bazu koriscenjem konstanti i provera da li je ostvarena konekcija
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$connection) {
        echo "Unable to connect to DB " . mysqli_error();
    }  
?>