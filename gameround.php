<?php


$game = (unserialize($_SESSION['game']));
// nb de tours initialisés en arg dans create :
$combat_nb_tours = ($game->combat_nb_tours);

$p1 = $game->perso1;
$p2 = $game->perso2;

for ( $i=1; $i<=$combat_nb_tours; $i++) {
    // pour chaque tour de boucle : definir une action pour p1 et p2 (random)
    $DesRand = random_int(1, 100);
    $DesRand2 = random_int(1, 100);
        echo '<br>';

        echo 'action de '. ($game->perso1->perso_nom). ' au tour '. $i. ': <br>';
        echo 'action de '. ($game->perso2->perso_nom). ' au tour '. $i. ': <br>';

        if ($DesRand <= 30) { // p1 attaque
            $p1->attaque($p2);
            echo $p1->perso_nom. " attaque et inflige ". $p1->perso_arme[0]->arme_degat. ' degats <br>';
            // var_dump (method_exists($p1, "attaque"));
            echo '<br> il reste à '.$p2->perso_nom.' '.$p2->perso_PV.'pv <br>';
            if ($DesRand2 <= 30) { // p2 attaque
                $p2->attaque($p1);
                echo $p2->perso_nom. " attaque et inflige ". $p2->perso_arme[0]->arme_degat. ' degats <br>';
                // var_dump (method_exists($p1, "attaque"));
                echo '<br> il reste à '.$p1->perso_nom.' '.$p1->perso_PV.'pv <br>';
            }

            else if ($DesRand2 >=30 && $DesRand <=60) { //p2 defend
                echo $p2->perso_nom." defend avec ".$p2->perso_arme[1]->arme_nom.' et reduit les degats de '. $p2->perso_arme[1]->arme_degat.'<br>';
                $p2-> setPV(-($p2->perso_arme[1]->arme_degat)) ;
                echo 'il lui reste à la fin de ce tour : '.$p2->perso_PV. 'pv <br>';
            }

            else if ($DesRand2 >60 && $DesRand <=70) { //p2 se soigne
                echo $game->perso2->perso_nom." soin <br>";
            }

            else if ($DesRand2 >70 && $DesRand <= 80) { //p2 lache son special 
                echo $game->perso2->perso_nom." special prout <br>";
            }

            else if ($DesRand2 >80 && $DesRand <=90) { // p2 abandonne (le faible)
                echo $game->perso2->perso_nom." abandon <br>";
            }

            else { // p2 est un passif, il fait l'étoile de mer
                echo $game->perso2->perso_nom." rien <br>";
            }
        }

        else if ($DesRand >=30 && $DesRand <=60) { // p1 defend
            echo $game->perso1->perso_nom.' defend <br>';

            if ($DesRand2 <= 30) { // p2 attaque
                echo $game->perso2->perso_nom." attaque <br>";
            }

            else if ($DesRand2 >=30 && $DesRand <=60) { // p2 defend
                echo $game->perso2->perso_nom." defense <br>";
            }

            else if ($DesRand2 >60 && $DesRand <=70) { // p2 se soigne
                echo $game->perso2->perso_nom." soin <br>";
            }
        
            else if ($DesRand2 >70 && $DesRand <= 80) { // p2 lache son special matthis
                echo $game->perso2->perso_nom." special prout <br>";
            }

            else if ($DesRand2 >80 && $DesRand <=90) { // p2 abandonne le faible
                echo $game->perso2->perso_nom." abandon <br>";
            }

            else { // p2 est passif, il ne fait rien
                echo $game->perso2->perso_nom." rien <br>";
            }
        }

        else if ($DesRand >60 && $DesRand <=70) {
            echo $game->perso1->perso_nom.' soin <br>';
            if ($DesRand2 <= 30) {
                echo $game->perso2->perso_nom." attaque <br>";
            }
            else if ($DesRand2 >=30 && $DesRand <=60) {
                echo $game->perso2->perso_nom." defense <br>";
            }
            else if ($DesRand2 >60 && $DesRand <=70) {
                echo $game->perso2->perso_nom." soin <br>";
            }
            else if ($DesRand2 >70 && $DesRand <= 80) {
                echo $game->perso2->perso_nom." special prout <br>";
            }
            else if ($DesRand2 >80 && $DesRand <=90) {
                echo $game->perso2->perso_nom." abandon <br>";
            }
            else {
                echo $game->perso2->perso_nom." rien <br>";
            }
        }

        else if ($DesRand >70 && $DesRand <= 80) {
            echo $game->perso1->perso_nom.' special prout <br>';
            if ($DesRand2 <= 30) {
                echo $game->perso2->perso_nom." attaque <br>";
            }
            else if ($DesRand2 >=30 && $DesRand <=60) {
                echo $game->perso2->perso_nom." defense <br>";
            }
            else if ($DesRand2 >60 && $DesRand <=70) {
                echo $game->perso2->perso_nom." soin <br>";
            }
            else if ($DesRand2 >70 && $DesRand <= 80) {
                echo $game->perso2->perso_nom." special prout <br>";
            }
            else if ($DesRand2 >80 && $DesRand <=90) {
                echo $game->perso2->perso_nom." abandon <br>";
            }
            else {
                echo $game->perso2->perso_nom." rien <br>";
            }
        }
        else if ($DesRand >80 && $DesRand <=90) {
            echo $game->perso1->perso_nom.' abandon <br>';
            if ($DesRand2 <= 30) {
                echo $game->perso2->perso_nom." attaque <br>";
            }
            else if ($DesRand2 >=30 && $DesRand <=60) {
                echo $game->perso2->perso_nom." defense <br>";
            }
            else if ($DesRand2 >60 && $DesRand <=70) {
                echo $game->perso2->perso_nom." soin <br>";
            }
            else if ($DesRand2 >70 && $DesRand <= 80) {
                echo $game->perso2->perso_nom." special prout <br>";
            }
            else if ($DesRand2 >80 && $DesRand <=90) {
                echo $game->perso2->perso_nom." abandon <br>";
            }
            else {
                echo $game->perso2->perso_nom." rien <br>";
            }
        }

        else {
            echo $game->perso1->perso_nom." rien <br>";
            if ($DesRand2 <= 30) {
                echo $game->perso2->perso_nom." attaque <br>";
            }
            else if ($DesRand2 >=30 && $DesRand <=60) {
                echo $game->perso2->perso_nom." defense <br>";
            }
            else if ($DesRand2 >60 && $DesRand <=70) {
                echo $game->perso2->perso_nom." soin <br>";
            }
            else if ($DesRand2 >70 && $DesRand <= 80) {
                echo $game->perso2->perso_nom." special prout <br>";
            }
            else if ($DesRand2 >80 && $DesRand <=90) {
                echo $game->perso2->perso_nom." abandon <br>";
            }
            else {
                echo $game->perso2->perso_nom." rien <br>";
            }
        }
    

}

?>

