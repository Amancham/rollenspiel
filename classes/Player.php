<?php 
class Player {
    private $id;
    private $cname;
    private $pname;
    private $health_max;
    private $health_curr;
    private $strength;
    private $type;
    private $created;

    // constructor for the class
    public function __construct($array) {
        if(array_key_exists('id', $array)) {
            $this->id = $array['id'];
        }
        else {
            $this->id = 0;
        }
        $this->cname = $array['cname'];
        $this->pname = $array['pname'];
        $this->health_max = $array['health_max'];
        if(array_key_exists('health_curr', $array)) {
            $this->health_curr = $array['health_curr'];
        }
        else {
            $this->health_curr = $array['health_max'];
        }
        $this->strength = $array['strength'];
        $this->type = $array['ctype'];
        if(array_key_exists('created', $array)) {
            $this->created = strtotime($array['created']);
        }
        else {
            $this->created = time();
        }
    }
    // getter and setter for all stats
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getCname() {
        return $this->cname;
    }
    public function setCname($cname) {
        $this->cname = $cname;
    }
    public function getPname() {
        return $this->pname;
    }
    public function setPname($pname) {
        $this->pname = $pname;
    }
    public function getHealth_max() {
        return $this->health_max;
    }
    public function setHealth_max($health) {
        $this->health_max = $health;
    }
    public function getHealth_curr() {
        return $this->health_curr;
    }
    public function setHealth_curr($health) {
        $this->health_curr = $health;
    }
    public function getStrength() {
        return $this->strength;
    }
    public function setStrength($strength) {
        $this->strength = $strength;
    }
    public function getType(){
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }
    public function getCreated() {
        return $this->created;
    }
    public function setCreated($created) {
        $this->created = $created;
    }

    // other functions, e.g. display, changes and so on
    public function show_status() {
        $health_percent = round(($this->health_curr/$this->health_max) * 100, 1);
        echo('<h1>'.$this->cname.'</h1>');
        echo('<div class="health_outer" style="width: 300px;">');
        echo('<div class="health" style="width:'.$this->health_curr.'px"></div>');
        echo('<div class="health_number">'.$health_percent.' %</div></div>');
        echo('<div class="stats">Lebenspunkte: '.$this->health_curr.'/'.$this->health_max.'</div>');
        echo('<div class="stats">Angriffswert: '.$this->strength.'</div>');
        echo('<div class="stats">Attribut: '.$this->type.'</div>');
    }

    public function has_birthday() {
        // TODO: Add fallback if day < 0 in combination with months!!
        if(date('m-d') == date('m-d', $this->created)) {
            if (date('Y') - date('Y', $this->created) == 0) {
                echo("<div class=\"age\">Der Charakter ist frisch geboren</div>");
            }
            else {
                $years = (date('Y') - date('Y', $this->created));
                echo("<div class=\"age\">Der Charakter hat heute seinen ".$years."ten Geburtstag!</div>");
            }
        } else {
            $years = (date('Y') - date('Y', $this->created));
            $months = (date('m') - date('m', $this->created));
            $days = (date('d') - date('d', $this->created));
            if ($years == 0) {
                $age_years = "";
            }
            else if ($years == 1) {                
                $age_years = " ".$years." Jahr";
            }
            else if ($years > 1) {
                $age_years = " ".$years." Jahre";
            }
            if ($months == 0) {
                $age_months = "";
            }
            else if($months == 1) {
                $age_months = " ".$months." Monat";
            }
            else if($months > 1) {
                $age_months = " ".$months." Monate";
            }
            if($days == 0) {
                $age_days = "";
            }
            else if($days == 1) {
                $age_days = " ".$days." Tag";
            }
            else if ($days > 1) {
                $age_days = " ".$days." Tage";
            }
            echo("<div class=\"age\">Alter: ".$age_days.$age_months.$age_years."</div>");
        }
    }
}