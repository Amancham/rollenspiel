<?php
class Database {
    private $host;
    private $user;
    private $pwd;
    private $db_name;
    private $pdo;

    public function __construct($host, $user, $pwd, $db_name) {
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->db_name = $db_name;
        $conn = new PDO("mysql:host=".$host.";dbname=".$db_name."", $user, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $conn;
    }
    public function getHost() {
        return $this->host;
    }
    public function setHost($host) {
        $this->host = $host;
    }
    public function getUser() {
        return $this->user;
    }
    public function setUser($user) {
        $this->user = $user;
    }
    public function getPwd() {
        return $this->pwd;
    }
    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }
    public function getDb_name() {
        return $this->db_name;
    }
    public function setDb_name($db_name) {
        $this->db_name = $db_name;
    }
    public function getPdo() {
        return $this->pdo;
    }
    public function setPdo($pdo) {
        $this->host = $pdo;
    }
    public function save_player($player) {
        if($player->getId() == 0) {
            $sql = "INSERT INTO player (name, health_max, health_curr, strength) VALUES ('".$player->getName()."', ".$player->getHealth_max().", ".$player->getHealth_curr().", ".$player->getStrength().");";
            $this->pdo->exec($sql);
        }
        else {
            $sql = "UPDATE player SET name = '".$player->getName()."', health_max = ".$player->getHealth_max().", health_curr = ".$player->getHealth_curr().", strength = ".$player->getStrength()."  WHERE id = ".$player->getId().";";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }
    public function load_player($id) {
        $sql = "SELECT * FROM player WHERE id = ".$id.";";
        foreach($this->pdo->query($sql) as $row) {

            return new Player($row);
        }
    }
    public function save_fight($fight, $fight_info) {
        $sql = "INSERT INTO fight (fighter1, fighter2, winner, arena, rounds) VALUES (".$fight_info['fighter1'].", ".$fight_info['fighter2'].", ".$fight_info['winner'].", '".$fight->getArena()."', ".$fight_info['rounds'].");";
        $this->pdo->exec($sql);
    }
}