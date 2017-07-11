<?php $this->layout('solopageconnected_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section">

    <div class="container">

        <div class="clients-wrapper">

            <div class="row text-center">
                <div class="col-sm-1.5 pull-left">
                    <a href="redirect_role" class="btn btn-primary">Menu principal</a>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="title-one">Modifier cet utilisateur</h2>
                </div>
            </div>

            <div class="row">

            </div>
            <div class="row text-center">
                <form method="POST" action ="updater_un_utilisateur?id=<?php $idToModif['US_id']?>" class="form-inline">
                    <div class="form-group">
                        <input hidden name="idToModif" id="idToModif" type="text" value="<?= $idToModif['US_id']?>">
                        <label for="US_FirstName">Prenom</label>
                        <input name="US_FirstName" type="text" value="<?= $idToModif['US_FirstName']?>"><br>
                        <label for="US_LastName">Nom</label>
                        <input name="US_LastName" type="text" value="<?= $idToModif['US_LastName']?>"><br>
                        <label for="US_Pseudo">Pseudo</label>
                        <input name="US_Pseudo" type="text" value="<?= $idToModif['US_Pseudo']?>"><br>
                        <label for="US_email">Email</label>
                        <input name="US_email" type="text" value="<?= $idToModif['US_email']?>"><br>
                        <label for="US_tel">téléphone</label>
                        <input name="US_tel" type="text" value="<?= $idToModif['US_tel']?>"><br>
                        <label for="US_idURole">Role</label>
                        <select name="US_idURole" id="">
                            <option <?php if ($idToModif['US_idURole'] == 1){echo 'selected';}?> value="1">Administrateur</option>
                            <option <?php if ($idToModif['US_idURole'] == 2){echo 'selected';}?> value="2">Employeur</option>
                            <option <?php if ($idToModif['US_idURole'] == 3){echo 'selected';}?> value="3">Artiste</option>
                            <option <?php if ($idToModif['US_idURole'] == 4){echo 'selected';}?> value="4">Fan</option>
                        </select>
                        <button type="submit" class="btn btn-block btn-primary" value="">mettre a jour</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php $this->stop('main_content') ?>


