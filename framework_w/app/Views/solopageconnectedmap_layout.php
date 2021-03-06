<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Outil professionnel de promotion et de gestion de groupe de musique : Big Band">
        <meta name="keywords" content="" /> 
        <meta name="author" content=""> 
        <title><?= $this->e($title) ?></title>
        <link rel="stylesheet" href="<?= $this->assetUrl('publique/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('publique/css/prettyPhoto.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('publique/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('publique/css/animate.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('publique/css/main.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('publique/css/responsive.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('admin/css/styleconnected.css') ?>">
        <link rel="shortcut icon" href="images/ico/favicon.png"> 
        <script src="http://maps.google.com/maps?file=api&amp;v=3&amp;sensor=false&amp;key=AIzaSyBf9Wsrb27kOXKUoEBq3V3PBfANi3VtJkE" type="text/javascript"></script>
    </head>
    <body>
        <div class="preloader">
            <div class="preloder-wrap">
                <div class="preloder-inner"> 
                    <div class="ball"></div> 
                    <div class="ball"></div> 
                    <div class="ball"></div> 
                    <div class="ball"></div> 
                    <div class="ball"></div> 
                    <div class="ball"></div> 
                    <div class="ball"></div>
                </div>
            </div>
        </div>
        <!-- /.preloader -->
        <header id="navigation"> 
            <div class="navbar navbar-inverse navbar-fixed-top" role="banner"> 
                <div class="container"> 
                    <div class="navbar-header"> 

                        <a class="navbar-brand" href="administrateur_accueil"><img src="assets/publique/images/logobigband3.png" alt=""></a>  
                    </div> 
                    <div class="pull-right"><a href="logout" class="btn btn-danger">Se déconnecter</a>
                    </div> 
                </div><!--/navbar--> 
            </div>
        </header> <!--/#navigation-->
<section>
            <?= $this->section('main_content') ?>
        </section>
	<script type="text/javascript" src="<?=$this->assetUrl('/publique/js/jquery.js');?>"></script>
	<script type="text/javascript" src="<?=$this->assetUrl('/publique/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?=$this->assetUrl('/publique/js/smoothscroll.js');?>"></script>
	<script type="text/javascript" src="<?=$this->assetUrl('/publique/js/jquery.isotope.min.js');?>"></script>
	<script type="text/javascript" src="<?=$this->assetUrl('/publique/js/jquery.prettyPhoto.js');?>"></script>
	<script type="text/javascript" src="<?=$this->assetUrl('/publique/js/jquery.parallax.js');?>"></script>
	<script type="text/javascript" src="<?=$this->assetUrl('/publique/js/main.js');?>"></script>
		<?=$this->section('js');?>
	</body>
	</html>
