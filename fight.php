<?php define('KEEP_OUT', true);
include "header.php" ?>
<div id="content">
    <h1>Fight for your life...</h1>
    <?php
    if (!isset($_GET['mode'])) {
        echo("<h2>Die Dunkelheit verschlingt dich</h2>");
        echo("<p>Bitte <a href=\"create.php\">erstelle einen Charakter</a> oder <a href=\"continue.php\">gib die entsprechenden Daten ein</a>, um weiterzuspielen.</p>");
    }
    if(isset($_GET['mode'])) {
        $mode=$_GET['mode'];
        switch($mode) {
            case 'new':
                break;
            case 'continue':
                break;
            case 'fight':
                break;
        }

        include('classes/Database.php');
        include('classes/Player.php');
        $configs = include('ressources/init');
        $db = new Database($configs['server'], $configs['benutzer'], $configs['pw'], $configs['db']);

        if($mode == 'new') {
            $p_name = addslashes($_POST['p_name']);
            $c_name = addslashes($_POST['c_name']);
            $new_character = [
                'pname' => $_POST['p_name'],
                'cname' => $_POST['c_name'],
                'health_max' => 300,
                'strength' => 15,
                'ctype' => $_POST['c_type']
            ];
            $created = new Player($new_character);
            $db->save_player($created);
            // call and return the ID of the character and create new Character object with the ID to make sure we save the character properly afterwards! 
            $character = $db->display_id($p_name, $c_name);
            
            
        }
        
        else if($mode == 'continue') {
    
        }
    
        else if($mode == 'fight') {
    
        }
    }

    
    ?>
</div>
<?php include "footer.php" ?>