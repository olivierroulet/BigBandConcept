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
	<link rel="stylesheet" href="<?= $this->assetUrl('admin/css/style.css') ?>">

</head>
<body>
	<div class="preloader">
		<div class="preloader-wrap">
			<div class="preloader-inner"> 
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
				
			</div> 
		</div><!--/navbar--> 
	</header> <!--/#navigation-->

	<br><br>
		<?= $this->section('main_content') ?>
	
	<footer id="footer"> 
		<div class="container"> 
			<div class="text-center"> 
				<p>Copyright &copy; 2017 - <a href="#home">BigBand</a> | All Rights Reserved</p> 
			</div> 
		</div> 
	</footer> <!--/#footer--> 
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