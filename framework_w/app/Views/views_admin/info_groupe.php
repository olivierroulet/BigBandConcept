<?php $this->layout('solopageconnected_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>


<section class="parallax-section">
    <div class="container">
        <div class="clients-wrapper">
            <div class="row text-center">
                <div class="col-sm-1.5 pull-left">
                    <a href="redirect_role" class="btn btn-primary">Menu principal</a>
                </div>

            <p><?php echo $group['GI_Name']?></p>
            <p><?php echo $group['GI_PhotoMainPagePath']?></p>
            <p><?php echo $group['GI_PhotoMainPagePath']?></p>
            <p><?php echo $group['GI_Logo']?></p>
            <p><?php echo $group['GI_Address']?></p>
            <p><?php echo $group['GI_Addr_ZipCode']?></p>
            <p><?php echo $group['GI_Addr_City']?></p>
            <p><?php echo $group['GI_AddrPhone']?></p>
            <p><?php echo $group['GI_Addr_Country']?></p>
            <p><?php echo $group['GI_OpeningHours']?></p>
            <p><?php echo $group['GI_Comments']?></p>
            <p><?php echo $group['GI_News']?></p>
            <p><?php echo $group['GI_RoleID']?></p>
            </div> 
        </div>

    </div>



</section>





<?php $this->stop('main_content') ?>