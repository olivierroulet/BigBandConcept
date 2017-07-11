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
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="title-one">Gestion des employeurs</h2>
            <div class="row">
                <?php 
                if(!empty($employeurs)):?>
                <hr>
                <?php foreach ($employeurs as $employeur): 

                switch ($employeur['US_idURole']) {
                    case 1:
                        $role='Administrateur';
                        break;
                    case 2:
                        $role='Employeur';
                        break;
                    case 3:
                        $role='Artiste';
                        break;
                    case 4:
                        $role='Fan';
                        break;
                }?>

                <div class='row text-center'>
                    <div class='col-sm-1'>
                        <a class="btn btn-warning" href="updater_un_utilisateur?id=<?php echo $employeur['US_id'];?>">Modifier</a>
                    </div>
                    <div class='col-sm-4'>
                        <?=$employeur['US_FirstName']. ' ' . $employeur['US_LastName'] ; ?>
                    </div>
                    <div class='col-sm-4'>
                        <?=$employeur['US_email']; ?>
                    </div>
                    <div class='col-sm-2'>
                        <?=$role; ?>
                    </div>
                    <div class='col-sm-1'>
                        <!--							<a class="btn btn-danger" href="supprimer_un_utilisateur?id=<?php echo $employeur['US_id'];?>">Supprimer</a>-->
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $employeur['US_id'];?>">Supprimer</button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal<?php echo $employeur['US_id'];?>" role="dialog">
                            <div class="modal-dialog modal-sm">

<!--                                 Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">ATTENTION !</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voulez vous vraiment supprimer cet utilisateur ? Sa suppresion sera definitive</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-default" href="supprimer_un_utilisateur?id=<?php echo $user['US_id'];?>">Supprimer</a>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Revenir à la liste</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <hr>

                <?php endforeach; ?>
                <?php else: ?>
                <div class="alert alert-danger">
                    Aucun utilisateur !
                </div>
                <?php endif; ?>
            </div>
                </div>
            </div>
        </div>
    </div>
        </section>
    <?php $this->stop('main_content') ?>