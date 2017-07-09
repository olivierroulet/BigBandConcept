<?php $this->layout('layout', ['title' => 'Actualités-évènements']) ?>
<?php $this->start('main_content') ?>

<section class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">

<article id="actuUpdate">
	<h1 class="text-center">Mise à jour d'un évènement</h1>

<?= $_SESSION['user'] ; ?>
 	<div>
		Titre <input type="text" value="<?=$current_news['AC_Com1'];?>">
		<br>
		<button type="nav" class="btn btn-default"> <?=$current_news['AC_Id'];?></button>
		<hr>
		<!-- < ?=debug($current_news);?> -->
	</div>

<div class="container-fluid">
	<div class="row main text-center">
		<div class="main-actu">

		<h2 class="text-center"><i class="fa fa-file-o fa-md" aria-hidden="true"></i> Ajout d'un évènement</h2>
		<hr>

			<div class="col col-md-12 mobiform">						
					<!-- 					<div class="padd20"><br><i class="glyphicon glyphicon-triangle-left"></i></div> -->
				<form class="form form-horizontal" method="post">
					<div class="col col-md-12">
						<label for "AC_Date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Date de l' évènement</label>
						<input type="datetime" name="AC_Date" id="AC_Date" value="<?=$current_news['AC_Date'];?>"/>
					</div>
					<div class="col col-md-12">	
						<label for "AC_Com1"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Commentaire sommaire (50 caractères max) <exp>*</exp></label>
						<input type="textarea" name="AC_Com1" id="AC_Com1"  value="<?=$current_news['AC_Com1'];?>"/>
					</div>
					<div class="col col-md-12">	
						<label for "AC_Com2"><i class="fa fa-book" aria-hidden="true"></i> Commentaire détaillé (500 caractères max)</label>
						<input type="textarea" name="AC_Com2" id="AC_Com2" cols="12" rows="4" value="<?=$current_news['AC_Com2'];?>"/>
					</div>
						<div class="col col-md-12">
							<label for "AC_Num"><i class="fa fa-folder-o" aria-hidden="true"></i> Référence unique de l' évènement</label>
							<input type="text" name="AC_Num" id="AC_Num" value="<?=$current_news['AC_Num'];?>"/>
							<label for "AC_Puce"><i class="fa fa-cubes" aria-hidden="true"></i> Puce (demain image)</label>
							<input type="textarea" name="AC_Puce" id="AC_Puce" value="<?=$current_news['AC_Puce'];?>"/>

						<div class="col col-md-12">	
							<label for "AC_Notes"><i class="fa fa-envelope-s" aria-hidden="true"></i> Note (non publiée, même si public)</label>
							<input type="textarea" name="AC_Notes" id="AC_Notes" value="<?=$current_news['AC_Notes'];?>"/>
						</div>
						<div class="col col-md-12">	
							<label for "AC_Adresse"><i class="fa fa-envelope-o" aria-hidden="true"></i> Adresse détaillée du lieu de l' évènement</label>
							<input type="text" name="AC_Adresse" id="AC_Adresse" value="<?=$current_news['AC_Adresse'];?>"/>
						</div>
						<div class="col col-md-12">	
							<label for "AC_Code_Postal"><i class="fa fa-address-card" aria-hidden="true"></i> Code postal</label>
							<input type="text" name="AC_Code_Postal" id="AC_Code_Postal" value="<?=$current_news['AC_Code_Postal'];?>"/>
						</div>
						<div class="col col-md-12">	
							<label for "AC_Lieu"><i class="fa fa-address-card" aria-hidden="true"></i> Lieu générique (ex Stade de France ;-)</label>
							<input type="text" name="AC_Lieu" id="AC_Lieu" value="<?=$current_news['AC_Lieu'];?>"/>
						</div>																					

						<label for "AC_Visibilite"><i class="fa fa-eye" aria-hidden="true"></i> Visibilité</label>
						<select name="AC_Visibilite">
							<option value="Public">Public</option>
							<option value="Privé">Privé</option>
							<option value="Brouillon">Brouillon</option>
						</select>    
						</div>                    
					</div>

					<div class="padd20"></div>

					<div class="col col-md-12" align="left">
						<button type="submit" class="btn btn-default"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i> Envoi</button>
					</div>
					    <?php
					    if(!empty($formErrors)){
                			print_r($formErrors);
                		}
					 ?>
				</div>

			</form>				
						<!-- < ?php print_r($_POST); ?> -->
		</div>
	</div>
</div>
</div>		<!-- <div class="main-login main-center"> -->

</article>
</div>
</div>
</section>

<?php $this->stop('main_content') ?>
