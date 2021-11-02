<?php
session_start();

require ("perso.classedit.php");
// $versus = new Combat (20,"foret", $p1, $p2);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>My little game</title>
</head>
<body>
    <div id="choixplayers">
        <p> Name player 1 : <input type="text" name="j1" id="j1"/></p>
        <p> Name player 2 : <input type="text" name="j2" id="j2"/> </p>
        <p><input type="button" id="btn" value="OK" onclick="sendRequest();"></p>
        </br></br>
        <div> MON TABLEAU PAR CREATE.PHP VIA REQUETE AJAX : </div></br>
    </div>
        <div id="play"></div>
       

    
    <script>

       function sendRequest() {
            console.log(j1.value);
            console.log(j2.value);

            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "create.php", true);
            xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.onreadystatechange=function() {
                if (this.readyState == 4 && this.status == 200) {
                    //reponse
                    var response = this.responseText;
                    // stockage de la réponse dans une div "play"
                    play.innerHTML= response;
                    // console.log(play);
                }
            };
            var data = {p1:j1.value, p2:j2.value};
            console.log(data);
            xhttp.send(JSON.stringify(data));
            
            hide = document.getElementById("choixplayers");
            hide.style.display='none';
        }


    </script>

    <?php
    require("gameround.php");
    // var_dump($_SESSION['game']);
    // var_dump(unserialize($_SESSION['game']));
    ?>
</body>
</html>


