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
            $winner = $fighters[array_rand($fighters)];

        }
        $this->rounds++;
        $final_info = [
            'fighter1' => $spieler1->getId(),
            'fighter2' => $spieler2->getId(),
            'rounds' => $this->rounds,
            'winner' => $winner
        ];
        return $final_info;
    }
}