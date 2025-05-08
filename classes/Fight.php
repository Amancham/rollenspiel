<?php 
class Fight {
    private $rounds;
    private $arena;

    public function __construct($arena) {
        $this->rounds = 0;
        $this->arena = $arena;
    }
    public function getRounds() {
        return $this->rounds;
    }
    public function setRounds($rounds) {
        $this->rounds = $rounds;
    }
    public function getArena() {
        return $this->arena;
    }
    public function setArena($arena) {
        $this->arena = $arena;
    }

    // fight itself 
    public function do_fight($spieler1, $spieler2) {
        $health1 = $spieler1->getHealth_curr();
        $health2 = $spieler2->getHealth_curr();
        $str1 = $spieler1->getStrength();
        $str2 = $spieler2->getStrength();

        // up the stats if arena type matches player type
        if($this->arena == $spieler1->getType()) {
            $health1 = $spieler1->getHealth_curr() * 1.2;
            $str1 = $spieler1->getStrength() * 1.1;
        }
        if($this->arena == $spieler2->getType()) {
            $health2 = $spieler2->getHealth_curr() * 1.2;
            $str2 = $spieler2->getStrength() * 1.1;
        }

        $attack_one = $health1 / $str2;
        $attack_two = $health2 / $str1;
        if($attack_one < $attack_two) {
            $winner = $spieler2->getCname();
            $winner_id = $spieler2->getId();
        }
        else if($attack_one > $attack_two) {
            $winner = $spieler1->getCname();
            $winner_id = $spieler1->getId();
        }
        else if($attack_one == $attack_two AND $spieler1->getStrength() > $spieler2->getStrength()) {
            $winner = $spieler1->getCname();
            $winner_id = $spieler1->getId();
        }
        else if($attack_one == $attack_two AND $spieler1->getStrength() < $spieler2->getStrength()) {
            $winner = $spieler2->getCname();
            $winner_id = $spieler2->getId();
        }
        else {
            $fighters = [$spieler1->getId(), $spieler2->getId()];
            $winner_id = $fighters[array_rand($fighters)];

        }
        $this->rounds++;
        $final_info = [
            'fighter1' => $spieler1->getId(),
            'fighter2' => $spieler2->getId(),
            'rounds' => $this->rounds,
            'winner' => $winner_id
        ];
        return $final_info;
    }
}