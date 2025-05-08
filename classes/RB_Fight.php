<?php
class RB_Fight {
    //currently broken, did not update to the new type mechanic yet
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
    public function do_fight($spieler1, $spieler2) {
        // TODO: Add agility and evade to make fights more interesting.
        $i = 1;
        if($spieler1->getStrength() > $spieler2->getStrength()) {
            echo("Der Kampf beginnt. ".$spieler1->getName()." fängt an.<br/>");
            $first = $spieler1;
            $second = $spieler2;
        }
        else if($spieler1->getStrength() < $spieler2->getStrength()) {
            echo("Der Kampf beginnt. ".$spieler2->getName." fängt an.<br/>");
            $first = $spieler2;
            $second = $spieler1;
        }
        else {
            $fighters = [$spieler1, $spieler2];
            $randomized = $fighters[array_rand($fighters, 2)];
            $first = $fighters[$randomized[0]];
            $second = $fighters[$randomized[1]];
        }
        while($spieler1->getHealth_curr() > 0 AND $spieler2->getHealth_curr() > 0) {
            $this->setRounds($i);
            
            $first_attack = $second->getHealth_curr() - $first->getStrength();
            $second->setHealth_curr($first_attack);
            if($second->getHealth_curr() > 0) {
                $second_attack = $first->getHealth_curr() - $second->getStrength();
                $first->setHealth_curr($second_attack);
            }
            $i++;
        }
        if($spieler1->getHealth_curr() > 0 AND $spieler2->getHealth_curr() <= 0) {
            echo("Hurra! ".$spieler1->getName()." hat den Kampf nach ".$this->getRounds()." Runden gewonnen.");
            $winner_id = $spieler1->getId();
            
        }
        else if($spieler1->getHealth_curr() <= 0 AND $spieler2->getHealth_curr() > 0) {
            echo("Hurra! ".$spieler2->getName()." hat den Kampf nach ".$this->getRounds()." Runden gewonnen.");
            $winner_id = $spieler2->getId();
        }
        else {
            echo("Whops. Something went wrong ... ");
        }
        $final_info = [
            'fighter1' => $spieler1->getId(),
            'fighter2' => $spieler2->getId(),
            'rounds' => $this->rounds,
            'winner' => $winner_id
        ];
        return $final_info;
    }
}