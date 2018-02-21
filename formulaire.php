<?php

$jsonURL="todo.json";

$jsonReceived = file_get_contents($jsonURL);

$log = json_decode($jsonReceived, true);

// var_dump($_POST);

if (isset($_POST['ajouter']) AND end($log)['nomtache'] != $_POST['tache']){

    // echo end($log)['nomtache'];

    $add_tache = $_POST['tache'];

    $array_tache = array("nomtache" => $add_tache,
                        "fin" => false);

    $log[] = $array_tache;


    $json_enc= json_encode($log, JSON_PRETTY_PRINT);

    //var_dump($json_enc);

    file_put_contents($jsonURL, $json_enc);
    $log = json_decode($json_enc, true);
   

}

if (isset($_POST['boutton'])){

    $choix=$_POST['tache'];
    // var_dump($choix);
      
    
    for ($init = 0; $init < count($log); $init ++){
        if (in_array($log[$init]['nomtache'], $choix)){
          $log[$init]['fin'] = true;
        }
    }
    var_dump($log);


    $json_enc= json_encode($log, JSON_PRETTY_PRINT);

    //var_dump($json_enc);

    file_put_contents($jsonURL, $json_enc);
    $log = json_decode($json_enc, true);

}

// foreach($log['nomtache'] as $valeur){
//                             echo "La checkbox $valeur a été cochée<br>";
//                     }







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
                <input type="submit" name="boutton" value="check" ><br />
                <?php

                    $i = 0;
                    foreach ($log as $key => $value){
                    //    print_r($value);
                       if ($value["fin"] == false)
                        echo "<input type='checkbox' name='tache[]' value='".$value["nomtache"]."'/><label for='choix'>".$value["nomtache"]."</label><br />";
                        $i++;
                    }
                ?>
                
                
            </form>
        </section>
        <section class="archive">
            <legend><strong>Archive
            </strong></legend>
            <form action="formulaire.php" method="post" name="formchecked">
                <?php

                     $i = 0;
                    foreach ($log as $key => $value){

                       if ($value["fin"] == true){
                        echo "<input type='checkbox' name='tache[]' value='".$value."'/><label for='choix'>".$value["nomtache"]."</label><br />";
                        $i++;

                
                        }
                    
                    }
                ?>
            </form>
        </section>

        <footer class="tache">
          <fieldset>
            <legend><strong>Ajouter une tâche</strong></legend>
            <form class="" action="formulaire.php" method="post">
              <label for="tache">La tâche à effectuer</label>
              <input type="text" name="tache" value="">
              <input type="submit" name="ajouter" value="Ajouter">
            </form>
          </fieldset>
        </footer>
    </div>
</body>
</html>
