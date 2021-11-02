<?php



session_start();


$_POST = json_decode(file_get_contents('php://input'), true); // -> tableau associatif
$p1=$_POST["p1"];
$p2=$_POST["p2"];

if ($_POST) {

    echo "données bien receptionnés dans create.php  :  "."</br>";
    // echo json_encode($_POST); on décode, lis la requete et re-encode en json
    echo "  je test pour recuperer ma valeur 1 : ".$_POST ["p1"]."</br>";

    require("perso.classedit.php");
    
    // $game = new Combat(20,'forêt', $_POST["p1"], $_POST["p2"]);
    $game = new Combat(20,'forêt', $p1, $p2);
    // echo $game->perso1->perso_race;
    $_SESSION['game'] = serialize($game); // linearisation de l'objet game pour pouvoir le stocker dans la session (on ne peut stocker que des chaines, pas des obj)
    
    
}
else {
    echo "pas de données receptionnées";
}
?>