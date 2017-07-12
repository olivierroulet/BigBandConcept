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

                <h2 class="title-one">Gestion des employeurs</h2>

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

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Prenom</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['US_FirstName'];?>               </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Nom</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['US_LastName'];?>               </div>
                    </div>
                </div> 
                                      
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Email</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['US_email'];?>               </div>
                    </div>
                </div>                  

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Téléphone</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['US_tel'];?>               </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Raison Sociale</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['CL_Raison_Sociale'];?> </div>
                    </div>
                </div>   
                                    
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Statut Juridique</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['CL_Statut_Juridique'];?>
                        </div>
                    </div>
                </div> 
                                      
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Titulaire Licence Entrepreneur De Spectacles</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['CL_Titulaire_Licence_Entrepreneur_De_Spectacles'];?>
                        </div>
                    </div>
                </div>  
                                    
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Code postal/Ville</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['CL_Code_Postal'];?><?=$employeur['CL_Ville'];?>
                        </div>
                    </div>
                </div>                      
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Habitude de date</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['CL_Habitude_De_Date'];?>
                        </div>
                    </div>
                </div>  
                                           
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Date du prochain suivi</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['CL_Date_Du_Prochain_Suivi'];?>
                        </div>
                    </div>
                </div>  
                                         
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Bareme</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['CL_Type_Bareme'];?>
                        </div>
                    </div>
                </div> 
                                         
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Indicateur du suivi</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['CL_Indicateur_De_Suivi'];?>
                        </div>
                    </div>
                </div>   
                                     
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="panel-heading-color">
                            <h3 class="panel-title">Statut du client</h3>
                        </div>
                        <div class="panel-body">
                            <?=$employeur['CL_Statut_Du_Client'];?>
                        </div>
                    </div>
                </div><br>




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

</section>
<?php $this->stop('main_content') ?>