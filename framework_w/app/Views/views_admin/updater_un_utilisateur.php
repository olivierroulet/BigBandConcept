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
                    <h2 class="title-one">Gestion des utilisateurs</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 col-sm-offset-3">
                    <a href="ajouter_un_utilisateur" class="btn btn-block btn-primary">Ajouter un utilisateur</a>
                </div>

                <div class="col-sm-3">
                    <a href="updater_un_utilisateur" class="btn btn-block btn-primary">Mettre à jour cet utilisateur</a>
                </div>

            </div>
            <div class="row">
                <form method="POST">
                    <div class="form-inline">
                        <input name="US_FirstName"type="text" value="<?= $toto['US_FirstName']?>">
                        <input name="US_LastName"type="text" value="<?= $toto['US_LastName']?>">
                        <select name="US_idURole" id="">
                            <option <?php if ($toto['US_idURole'] == 1){echo 'selected';}?> value="Administrateur">Administrateur</option>
                            <option <?php if ($toto['US_idURole'] == 2){echo 'selected';}?> value="Client/Employeur">Client/Employeur</option>
                            <option <?php if ($toto['US_idURole'] == 3){echo 'selected';}?> value="Artiste">Artiste</option>
                            <option <?php if ($toto['US_idURole'] == 4){echo 'selected';}?> value="Fan">Fan</option>
                        </select>
                        <input type="submit" class="btn btn-block btn-primary" value="mettre a jour">
                    </div>
                </form>

            </div>

            </section>

        <?php $this->stop('main_content') ?>


