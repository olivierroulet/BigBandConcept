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
            <br>
            <div class="row">
                <form action="update_info_groupe" method="POST">
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" id="panel-heading-color">
                                <h3 class="panel-title">Nom du Groupe</h3>
                            </div>
                            <div class="panel-body">
                                <input name="GI_Name" type="text" value="<?php echo $group['GI_Name']?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" id="panel-heading-color">
                                <h3 class="panel-title">Photo</h3>
                            </div>
                            <div class="panel-body">
                                <input name="GI_PhotoMainPagePath" type="text" value="<?php echo $group['GI_PhotoMainPagePath']?>>">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" id="panel-heading-color">
                                <h3 class="panel-title">Logo</h3>
                            </div>
                            <div class="panel-body">
                                <input name="GI_Logo" type="text" value="<?php echo $group['GI_Logo']?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" id="panel-heading-color">
                                <h3 class="panel-title">Adresse</h3>
                            </div>
                            <div class="panel-body">
                                <input name="GI_Address" type="text" value="<?php echo $group['GI_Address']?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" id="panel-heading-color">
                                <h3 class="panel-title">Code Postal</h3>
                            </div>
                            <div class="panel-body">
                                <input name="GI_Addr_ZipCode" type="text" value="<?php echo $group['GI_Addr_ZipCode']?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" id="panel-heading-color">
                                <h3 class="panel-title">Ville</h3>
                            </div>
                            <div class="panel-body">
                                <input name="GI_Addr_City" type="text" value="<?php echo $group['GI_Addr_City']?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" id="panel-heading-color">
                                <h3 class="panel-title">Heure d'ouverture</h3>
                            </div>
                            <div class="panel-body">
                                <input name="GI_OpeningHours" type="text" value="<?php echo $group['GI_OpeningHours']?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" id="panel-heading-color">
                                <h3 class="panel-title">Commentaire</h3>
                            </div>
                            <div class="panel-body">
                                <input name="GI_Comments" type="text" value="<?php echo $group['GI_Comments']?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" id="panel-heading-color">
                                <h3 class="panel-title">News</h3>
                            </div>
                            <div class="panel-body">
                                <input  name="GI_News" type="text" value=" <?php echo $group['GI_News']?>">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning" id="btn-color-update" type="submit">Update</button>
                </form>
            </div>



        </div>

    </div>



</section>





<?php $this->stop('main_content') ?>