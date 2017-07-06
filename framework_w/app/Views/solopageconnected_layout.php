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
	<link rel="stylesheet" href="<?= $this->assetUrl('publique/css/styleconnected.css') ?>">
	<link rel="shortcut icon" href="images/ico/favicon.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
	</div><!--/.preloader-->
	<header id="navigation"> 
		<div class="navbar navbar-inverse navbar-fixed-top" role="banner"> 
			<div class="container"> 
				<div class="navbar-header"> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
					</button> 
					<a class="navbar-brand" href="accueil"><h1><img src="assets/publique/images/logobigband2.png" alt=""></h1></a>  
				</div> 
				<div class="pull-right"><a href="logout" class="btn btn-error">Se déconnecter</a>	</div>
			</div> 
		</div><!--/navbar--> 
	</header> <!--/#navigation-->

	<section>
		<?= $this->section('main_content') ?>
	</section>
	 
	<script type="text/javascript" src="assets/publique/js/jquery.js"></script> 
	<script type="text/javascript" src="assets/publique/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/publique/js/smoothscroll.js"></script> 
	<script type="text/javascript" src="assets/publique/js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="assets/publique/js/jquery.prettyPhoto.js"></script> 
	<script type="text/javascript" src="assets/publique/js/jquery.parallax.js"></script> 
	<script type="text/javascript" src="assets/publique/js/main.js"></script>
</body>
</html>