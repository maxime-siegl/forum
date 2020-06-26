<?php
//FONCTION QUI AFFICHE FORMULAIRE CREATION CONVERSATION SI USER EST CONNECTE
function form_conv()
    {                        
        ?>
            <form action="" method="POST">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" required>

                <label for="description">Description :</label>
                <input type="text" id="decription" name="description" required>

                <input type="submit" name="crea_conv" value="Créer">
            </form>
        <?php                 
    }

