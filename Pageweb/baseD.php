<?php

function getBD()
{
    $host = 'localhost';
    $dbname = 'fcqprrzr_CINEDATA';
    $username = 'fcqprrzr_malala';
    $password = 'Cinedata12';

    $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";

    try {
        $bdd = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    return $bdd;
}
