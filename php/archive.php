<fieldset>
    <legend><strong>Archive</strong></legend>
    <form action="formulaire.php" method="post" name="formchecked">
        <?php
            foreach ($log as $key => $value){

                if ($value["fin"] == true){

                    echo "<input type='checkbox' name='tache[]' value='".$value."'checked disabled/>
                        <label class='line' for='choix'>".$value["nomtache"]."</label><br />";
                }
            }
        ?>
    </form>
</fieldset>