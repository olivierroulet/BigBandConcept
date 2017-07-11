<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="Application de promotion et de gestion de groupes et orchestres de musique : Big Band">
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
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script src="http://maps.google.com/maps?file=api&amp;v=3&amp;sensor=false&amp;key=AIzaSyDmBF9Ku4_8jIJBeHtALzTtaAZsUH6pAtY" type="text/javascript"></script>
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
					
					<a class="navbar-brand" href="logout"><h1><img src="assets/publique/images/logobigband2.png" alt=""></h1></a>  
				</div> 
				<div class="pull-right"><a href="logout" class="btn btn-danger">Se déconnecter</a>
				</div> 
			</div><!--/navbar--> 
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