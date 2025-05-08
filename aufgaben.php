<?php 
define('KEEP_OUT', true);
include "classes/Player.php";
include "classes/Fight.php";
include "classes/RB_Fight.php";
include "classes/Database.php";
$configs = include('ressources/init');

?>
    <?php include "header.php" ?>
    <div id="content">
    <?php 
    // create a character first
    $array1 = [
        'name' => 'Hans',
        'health_max' => 300,
        'strength' => 15
    ];
    $spieler1 = new Player($array1);
    $array2 = [
        'name' => 'Greta',
        'health_max' => 300,
        'strength' => 10
    ];
    $spieler2 = new Player($array2);
    // manipulate the creation date format (hour, minute, second, month, day, year): 
    // $fake_date = mktime(11, 12, 55, 4, 1, 2024);
    // $spieler1->setCreated($fake_date);
    // manipulate current health
    // $spieler1->setHealth_curr(300);
    $db = new Database($configs['server'], $configs['benutzer'], $configs['pw'], $configs['db']);
    $spieler1 = $db->load_player(1);
    $spieler2 = $db->load_player(2);
    //$db->save_player($spieler1);
    //$db->save_player($spieler2);
    // display the stats
    
    $spieler1->show_status();
    $spieler1->has_birthday();
    $spieler2->show_status();
    $spieler2->has_birthday();
    echo("<hr>");
    $fight = new Fight("Sandplatz");
    $fight_info = $fight->do_fight($spieler1, $spieler2);
    $fight2 = new RB_Fight("Wüste");
    $fight2_info = $fight2->do_fight($spieler1, $spieler2);

    $db->save_fight($fight, $fight_info);
    $db->save_fight($fight2, $fight2_info);
    
    ?>
    </div>
    <?php include "footer.php" ?>
