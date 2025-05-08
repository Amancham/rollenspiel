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
        $attack_one = $spieler1->getHealth_curr() / $spieler2->getStrength();
        $attack_two = $spieler2->getHealth_curr() / $spieler1->getStrength();
        if($attack_one < $attack_two) {
            $winner = $spieler2->getName();
            $winner_id = $spieler2->getId();
        }
        else if($attack_one > $attack_two) {
            $winner = $spieler1->getName();
            $winner_id = $spieler1->getId();
        }
        else if($attack_one == $attack_two AND $spieler1->getStrength() > $spieler2->getStrength()) {
            $winner = $spieler1->getName();
            $winner_id = $spieler1->getId();
        }
        else if($attack_one == $attack_two AND $spieler1->getStrength() < $spieler2->getStrength()) {
            $winner = $spieler2->getName();
            $winner_id = $spieler2->getId();
        }
        else {
            $fighters = [$spieler1->getName(), $spieler2->getName()];
            $winner = $fighters[array_rand($fighters)];

            $fighters = [$spieler1, $spieler2];
            $randomized = $fighters[array_rand($fighters)];
            $winner = $fighters[$randomized[0]];
            $winner_id = $winner->getId();

        }
        echo("<h2>Hurra! ".$winner." hat gewonnen!</h2>");
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