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
           
            <div class="row text-center">
                <form method="POST" action ="updater_un_utilisateur?id=<?php $idToModif['US_id']?>" class="form-inline">
                    <div class="form-group">
                        <input hidden name="idToModif" id="idToModif" type="text" value="<?= $idToModif['US_id']?>">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class='form-group'>
                                    <label for="US_FirstName">Prenom</label>
                                    <input class="form-control" name="US_FirstName" type="text" value="<?= $idToModif['US_FirstName']?>"><br>
                                    <label for="US_Pseudo">Pseudo</label>
                                    <input class="form-control" name="US_Pseudo" type="text" value="<?= $idToModif['US_Pseudo']?>"><br>
                                    <label for="US_tel">téléphone</label>
                                    <input class="form-control" name="US_tel" type="text" value="<?= $idToModif['US_tel']?>"><br>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class='form-group'>
                                    <label for="US_LastName">Nom</label>
                                    <input class="form-control" name="US_LastName" type="text" value="<?= $idToModif['US_LastName']?>"><br>
                                    <label for="US_email">Email</label>
                                    <input class="form-control" name="US_email" type="text" value="<?= $idToModif['US_email']?>"><br>
                                    <label for="US_idURole">Role</label><br>
                                    <select class="form-control"  name="US_idURole" id="US_idURole">
                                        <option <?php if ($idToModif['US_idURole'] == 1){echo 'selected';}?> value="1">Administrateur</option>
                                        <option <?php if ($idToModif['US_idURole'] == 2){echo 'selected';}?> value="2">Employeur</option>
                                        <option <?php if ($idToModif['US_idURole'] == 3){echo 'selected';}?> value="3">Artiste</option>
                                        <option <?php if ($idToModif['US_idURole'] == 4){echo 'selected';}?> value="4">Fan</option>
                                    </select><br>
                                </div>
                            </div>
                            <div class="col-sm-4 text-center">
                                <label for="US_AuthorizedYN">Autorisation compte</label>
                                <select class="form-control"  name="US_AuthorizedYN" id="US_AuthorizedYN">
                                    <option <?php if ($idToModif['US_AuthorizedYN'] == 0){echo 'selected';}?> value="0">Non autorisé à se créer un compte</option>
                                    <option <?php if ($idToModif['US_AuthorizedYN'] == 1){echo 'selected';}?> value="1">Autorisé à se créer un compte</option>
                                </select>
                                <br>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-warning" value="">mettre a jour</button>
                            </div>

                        </div>
                        
                    </div>
                    
                </div>
            </form>

        </div>
    </div>
</div>
</section>

<?php $this->stop('main_content') ?>


