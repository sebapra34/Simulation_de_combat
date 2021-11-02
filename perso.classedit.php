<?php

// affichage d'erreur : 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

///////////////////////////////CLASS PERSO//////////////////////////////////

class Perso {

    ////////////////////////////ATTRIBUTS ////////////////////////////

    public $perso_nom;
    public $perso_race;
    public $perso_PV;
    protected $perso_genre;
    protected $perso_XP;
    public $perso_arme;
    protected $perso_stats;
    protected $perso_classe;
    protected $perso_bourse;

    ////////////////////////////METHODES ////////////////////////////

    public function __construct($n,$r,$p,$g,$x,$a,$s,$c,$b){
        $this->perso_nom = $n;
        $this->perso_race = $r;
        $this->perso_PV = $p;
        $this->perso_genre = $g;
        $this->perso_XP = $x;
        $this->perso_arme = $a;
        $this->perso_stats = $s;
        $this->perso_classe = $c;
        $this->perso_bourse = $b;
    }

    public function getName() {
        echo "<br>"."le nom de ton personnage est :"."<br>";
        return strtoupper($this->perso_nom);
    }

    public function getPV() {
        return $this->perso_PV;
    }

    public function setPV($dgtRecu) {
        $this->perso_PV -= $dgtRecu;
    }

    public function attaque($victime) {
        //$victime->perso_vie -= $this->perso_armes[$armeAtk->arme_degat];
        $victime->setPV($this->perso_arme[0]->arme_degat);  
    }

    public function defend($perso) {  
        // if other  player : atk  -> -50% degats ?      (problematique : si J1 def et J2 attaque ensuite) =>  verification et incrementation/decrementation des pv a chaque fin de tour 
        // perso->perso_vie  
    }

    public function soigne($perso) {
        // quand le joueur est sous 50% vie (max 2x )
        // $perso->perso_vie += 10;
    } 

    public function special($victime) {
        //degats x 1.2 (max 2x)
        // $perso->perso_vie -= (this->perso_arme[$armeAtk->arme_degat])*1.2;
    }

    public function abandon($perso) {
        // combat perdu -> fin du combat
    }

    public function rien($perso) {
        // pas d'action, tour suivant
    }

    public function affiche() {

        foreach($this as $key => $value) {

            if (is_array($value)) {

                // echo $value[0]->arme_nom."<br>";
                // echo "<br>";
                // echo $value[1]->arme_nom;
                $value = implode("<br>", $value);  
            } 
                echo "<div id='".$key."_".$this->perso_nom."'>".$value."</div>"."<br>"; 
        }
    }



    public function __toString() {
        $res = "<table style='text-align:center; width:300px; border:1px solid black; border-collapse:collapse;'><tr><td style='border:1px solid black;'><b>Property</b></td><td style='border:1px solid black;'><b>Value</b></td></tr>";
        foreach ($this as $key => $value) {
            // echo gettype($value);

            if (is_array($value)) {
                //trnaformation en chaine 
                $mavar = implode("<br>", $value);

                $res .= "<tr><td style='border:1px solid black;'>$key</td><td style='border:1px solid black;'>$mavar</td></tr>";
            } else {
                $res .= "<tr><td style='border:1px solid black;'>$key</td><td style='border:1px solid black;'>$value</td></tr>";
            } 
        }
        $res .= "</table>";
        return $res;
    }
}

///////////////////////////////CLASS ARMES ///////////////////////////:

class Arme {

    //////////////////////////ATTRIBUTS//////////////////////////

    public $arme_type;
    public $arme_nom;
    public $arme_degat;
    public $arme_status;
    public $arme_prix;

    ///////////////////////METHODES//////////////////////////

    public function __construct ($t,$n,$d,$u,$p) {
        $this->arme_type = $t;
        $this->arme_nom = $n;
        $this->arme_degat = $d;
        $this->arme_status = $u;
        $this->arme_prix = $p;
    }

    public function __toString() {
        $res = "<table style='text-align:center; width:300px; border:1px solid black; border-collapse:collapse;'><tr><td style='border:1px solid black;'><b>Property</b></td><td style='border:1px solid black;'><b>Value</b></td></tr>";
        foreach ($this as $key => $value) {
            // echo gettype($value);
            $res .= "<tr><td style='border:1px solid black;'>$key</td><td style='border:1px solid black;'>$value</td></tr>";
        }
        $res .= "</table>";
        return $res;
    }
}

///////////////////////////// CLASSES CARAC ARMES /////////////////////////

class ATK extends Arme {
}

class DEF extends Arme {
}


//////////////////////////////CLASSE COMBAT /////////////////////////////

class Combat {

    ////////////////////// ATTRIBUTS ///////////////////
    public $combat_nb_tours;
    public $combat_lieu;
    public $perso1;
    public $perso2;


    ///////////////////// METHODES ////////////////////
    public function __construct ($t,$l,$p1, $p2) {
        $this->combat_nb_tours = $t;
        $this->combat_lieu = $l;
        // le construct auto-invoque toute la function init ci-dessous a chaque fois qu'un new combat est initié
        // ( et donc l'echo $pierre qui ramene toute ses carac :)
        $this->init($p1, $p2);
    }

    public function init ($p1, $p2) {
        $hache = new Arme("ATK","hache",7,40,1500);
        $lance = new Arme("ATK", "épieu du back-end",32,70,200000);
        $epee = new Arme("ATK","epee",9,35,5000);
        $bouclier = new Arme("DEF","bouclier",5,150,750);
        $boubou = new Arme("DEF","petit bouclier",2,100,250);

        $this->perso1 = new Perso($p1,"humain",50,"homme",10,[$lance,$boubou],[],"lancier",1231);
        // >>>>>>>>>>>>affichage :
        echo $this->perso1->getName();
        echo $this->perso1;

        $this->perso2 = new Perso($p2,"humain",45,"?",11,[$epee,$bouclier],[],"guerrier",1);
        echo $this->perso2->getName();
        echo $this->perso2;
     }

    public function tour () {    
    }

    public function fin () {
    }

    public function __toString() {
        $res = "<table style='text-align:center; width:300px; border:1px solid black; border-collapse:collapse;'><tr><td style='border:1px solid black;'><b>Property</b></td><td style='border:1px solid black;'><b>Value</b></td></tr>";
        foreach ($this as $key => $value) {
            // echo gettype($value);
            $res .= "<tr><td style='border:1px solid black;'>$key</td><td style='border:1px solid black;'>$value</td></tr>";
        }
        $res .= "</table>";
        return $res;
    }
}
?>