<?php 
define('KEEP_OUT', true);
include ("../classes/Database.php");
$configs = include('../ressources/init');

$db = new Database($configs['server'], $configs['benutzer'], $configs['pw'], $configs['db']);

$table_player = "CREATE TABLE IF NOT EXISTS player (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    pname VARCHAR(30) NOT NULL,
    cname VARCHAR(30) NOT NULL,
    health_max INT(6) NOT NULL,
    health_curr INT(6) NOT NULL,
    strength INT(6) NOT NULL,
    ctype VARCHAR(30) NOT NULL,
    created TIMESTAMP NOT NULL
);";

$table_fight = "CREATE TABLE IF NOT EXISTS fight (
    fid INT(6) AUTO_INCREMENT PRIMARY KEY,
    fighter1 INT(6),
    fighter2 INT(6),
    winner INT(6),
    arena varchar(30),
    rounds INT(6)
);";

$db->getPdo()->exec($table_player);
echo("Table player was created successfully.<br>");
$db->getPdo()->exec($table_fight);
echo("Table fight was created successfully.<br>");

$db = null;

// Feuer, Wasser, Erde, Luft; 20% Angriff & 10% Leben