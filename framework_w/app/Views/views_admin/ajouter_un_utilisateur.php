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
                    <h3>Ajouter un utilisateur</h3>
                    <?php 

    $post = $_POST;
$US_FirstName = isset($post['US_FirstName']) ? $post['US_FirstName'] : '';
$US_LastName = isset($post['US_LastName']) ? $post['US_LastName'] : '';
$US_idURole = isset($post['US_idURole']) ? $post['US_idURole'] : '';
$US_email = isset($post['US_email']) ? $post['US_email'] : '';

if(!empty($formErrors)){
                    ?>
                    <div class="status alert alert-danger" style="">
                        <?php
    echo '<p style="color:red">'.implode('<br>', $formErrors);
                        ?>
                    </div>
                    <?php
}
if($formValid == true){ ?>
    <div class="alert alert-succes" style="">
        <?php
        echo '<p style="color:green">L\'utilisateur a bien etais ajouté';
                    ?>
                </div>

<?php
                }

                ?>
                <form method="POST" action="ajouter_un_utilisateur">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="US_FirstName">Prénom</label>
                            <input type="text" class="form-control" name="US_FirstName" value="<?php echo $US_FirstName;?>" id="US_FirstName" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="US_LastName">Nom</label>
                            <input type="text" class="form-control" name="US_LastName" value="<?php echo $US_LastName;?>" id="US_LastName" placeholder="Nom">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="US_email">Adresse Mail</label>
                            <input type="email" class="form-control" name="US_email" value="<?php echo $US_email;?>" id="US_email" placeholder="Adresse email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="US_idURole">Rôle de cet utilisateur</label>
                            <select class="form-control" id="US_idURole" name="US_idURole" placeholder="Indiquez le rôle de l'utilisateur à ajouter">
                                <option <?php if ($US_idURole==''){echo 'selected';}?> value=''>Choisissez le rôle de votre utilisateur</option>
                                <option <?php if ($US_idURole==1){echo 'selected';}?> value='1'>Administrateur</option>
                                <option <?php if ($US_idURole==2){echo 'selected';}?> value='2'>Employeur</option>
                                <option <?php if ($US_idURole==3){echo 'selected';}?> value='3'>Artiste</option>
                                <option <?php if ($US_idURole==4){echo 'selected';}?> value='4'>Fan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-2">
                        <button type="submit" class="btn btn-success">Ajouter cet utilisateur</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">


        </div>

    </div>
    </div>
</section>
<?php $this->stop('main_content') ?>


