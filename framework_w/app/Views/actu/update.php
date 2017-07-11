<?php $this->layout('solopageconnected_layout', ['title' => 'Actualités-évènements']); ?>
<!-- solopage_layout ou solopageconnected_layout -->
<?php $this->start('main_content'); ?>


<section class="parallax-section" id="actuupd">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Mise à jour d'un évènement</h2>
				</div>
			</div>
		</div>
		<div class="col col-md-12">
		</div>
		<div class="container container-fluid">
			<div class="row text-center">
				<div class="row main text-center">
					<div class="col col-md-12">			
					<div class="col col-md-12"> &nbsp; </div>				

<!-- ___________________ début du formulaire ___________________ -->				

		<form class="form form-horizontal" method="POST">

				<div class="col col-md-12">
				    <fieldset class="form-group row">
					<div class="col col-md-3 text-left">
						<label for "AC_Date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Date de début de l' évènement</label>
						<input type="datetime" size="16" name="AC_Date" id="AC_Date" value="<?=$current_news['AC_Date'];?>"/>
					</div>
					<div class="col col-md-3 text-left">
						<label for "AC_DateFin"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Date de fin de l' évènement</label>
						<input type="datetime" size="16" name="AC_DateFin" id="AC_DateFin" value="<?=$current_news['AC_DateFin'];?>"/>
					</div>					
					<div class="col col-md-3 text-left">
						<label for "AC_Num"><i class="fa fa-folder-o" aria-hidden="true"></i> Référence de l' évènement</label>
						<input type="text" size="12" name="AC_Num" id="AC_Num" value="<?=$current_news['AC_Num'];?>"/>
					</div>					
					<div class="col col-md-2 text-right">																		
						<label for "AC_Visibilite"><i class="fa fa-eye" aria-hidden="true"></i> Visibilité</label>
						<select name="AC_Visibilite">
							<option value="Public">Public</option>
							<option value="Restreint">Restreint</option>
							<option value="Brouillon">Brouillon</option>
						</select>    
					</div>
					</fieldset>
				</div>
				<div class="col col-md-12"> &nbsp; </div>
				<div class="col col-md-12">	
					<div class="col col-md-4 text-left">	
						<label for "AC_Com1"><i class="fa fa-sticky-note" aria-hidden="true"></i>Libellé de l' évènement (50c max) <sup>*</sup></label>
						<textarea name="AC_Com1" id="AC_Com1" cols="30" rows="6" value="<?=$current_news['AC_Com1'];?>"/> </textarea>
					</div>
					<div class="col col-md-4 text-left">	
						<label for "AC_Com2"><i class="fa fa-book" aria-hidden="true"></i> Commentaire détaillé (500c max)</label>
						<textarea name="AC_Com2" id="AC_Com2" cols="30" rows="6" value="<?=$current_news['AC_Com2'];?>"/> </textarea>
					</div>		
					<div class="col col-md-4 text-left">	
						<label for "AC_Puce"><i class="fa fa-cubes" aria-hidden="true"></i> Puce (150c max) </label>
						<textarea name="AC_Puce" id="AC_Puce" cols="35" rows="6" value="<?=$current_news['AC_Puce'];?>"/> </textarea>
					</div>
				</div>
				<div class="col col-md-12"> &nbsp; </div>
				<div class="col col-md-12 text-right">	
					<div class="col col-md-3 text-left">	
						<label for "AC_Notes"><i class="fa fa-envelope-s" aria-hidden="true"></i> Note (150c max)</label>
						<textarea name="AC_Notes" cols="30" rows="6" id="AC_Notes" value="<?=$current_news['AC_Notes'];?>"/> </textarea>
					</div>
					<div class="col col-md-3 text-left">	
						<label for "AC_Adresse"><i class="glyphicon glyphicon-road" aria-hidden="true"></i> Adresse précise du lieu</label>
						<input type="text" name="AC_Adresse" id="AC_Adresse" value="<?=$current_news['AC_Adresse'];?>"/>
					</div>
					<div class="col col-md-3 text-left">	
						<label for "AC_Lieu"><i class="glyphicon glyphicon-tent" aria-hidden="true"></i> Lieu d' usage <sub>(ex Stade de France ;-)</sub></label>
						<input type="text" name="AC_Lieu" id="AC_Lieu" value="<?=$current_news['AC_Lieu'];?>"/>
					</div>					
					<div class="col col-md-2 text-left">	
						<label for "AC_Code_Postal"><i class="fa fa-address-card" aria-hidden="true"></i> Code postal</label>
						<input type="text" name="AC_Code_Postal" id="AC_Code_Postal" size="9" value="<?=$current_news['AC_Code_Postal'];?>"/>
					</div>
				</div>
				<div class="col col-md-12"> &nbsp; </div>				
			<div class="col col-md-12 text-right">
				<button type="submit" class="btn btn-default"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i> Valider</button>
			</div>
		<?php
			if(!empty($formErrors)){
				print_r($formErrors);
			}
			?>


		</form>		

		</div>		
					<!-- < ?php print_r($_POST); ?> -->
				</div>
			</div>

	</div>		<!-- <div class="main-login main-center"> -->
</section>

<?php $this->stop('main_content'); ?>
