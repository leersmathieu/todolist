<?php

$jsonURL="todo.json";
$jsonReceived = file_get_contents($jsonURL);
$datafile =  [$date,$childName, $teacherName, $reason];
$log = json_decode($dataReceived) ;
$log[] = $datafile;
$justifResult = json_encode($log);
file_put_contents($jsonURL, $justifResult);

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
            <form action="" method="post" name="formafaire">
                <input type="checkbox" name="choix" value="" /><label for="choix">Course</label>
                
            </form>
        </section>

        <section class="archive">

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
