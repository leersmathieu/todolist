<?php

$jsonURL="todo.json";

$jsonReceived = file_get_contents($jsonURL);

$log = json_decode($jsonReceived) ;

if (isset($_POST['ajouter'])){

$add_tache = $_POST['tache'];



$array_tache = array("nomtache" => $add_tache,
                    "fin" => false);

$log[] = $array_tache;


$json_enc= json_encode($log, JSON_PRETTY_PRINT);

var_dump($json_enc);
file_put_contents($jsonURL, $json_enc);

}

// if (isset($_POST['boutton'])){


// }



// var_dump($add_tache);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="page">
        <section class="afaire">
            <form action="formulaire.php" method="post" name="formafaire">

                <?php

                    $i = 0;
                    foreach ($log as $key => $value){
                       
                       if ($value->{"fin"} == false)
                        echo "<input type='checkbox' name='choix' value=".$i."/><label for='choix'>".$value->{"nomtache"}."</label><br />";
                        $i++;
                    }
                ?>
                <input type="submit" nom="boutton" value="Check" >
                
            </form>
        </section>

        <section class="archive">
                <?php

                    
                    
                ?>
        </section>

        <footer class="tache">
          <fieldset>
            <legend><strong>Ajouter une tâche</strong></legend>
            <form class="" action="formulaire.php" method="post">
              <label for="tache">La tâche à effectuer</label>
              <input type="text" name="tache" value="">
              <input type="submit" name="ajouter" value="Ajouter">
              <pre><?php print_r($_POST); ?></pre>
            </form>
          </fieldset>
        </footer>
    </div>
</body>
</html>
