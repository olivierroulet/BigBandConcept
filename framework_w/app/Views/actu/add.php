<?php $this->layout('solopageconnected_layout', ['title' => 'Actualités-évènements']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section" id="actuadd">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Ajout d'un évènement</h2>
				</div>
			</div>
		</div>
				<div class="col col-md-12">
				</div>
	<div class="row text-center">

			<div class="clients-wrapper">
				<div class="row text-center">
					<div class="col-md-12">
					<div class="col-md-8">&nbsp;</div>
						<div class="col-md-2">
							<a href="redirect_role" class="btn btn-block btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Menu principal</a>
						</div>
						<div class="col-sm-2">
							<a href="<?=$this->url('Actu_Add');?>" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-refresh"></i><i class="fa fa-window-restore" aria-hidden="true"></i> Ajouter un évènement</a>
							
							<!-- < ?= '<a href="' .$this->url('ActuINS', ['AC_Id' => $reponse['AC_Id']]).'">Insérer</a>'; ?> -->
						</div>
						<div class="col-md-12">
								<!--  <a href="redirect_role" class="btn btn-block btn-default">préc.</a>
									<a href="redirect_role" class="btn btn-block btn-default">suiv.</a> -->
						</div>
					</div> <!-- fin de row -->
				</div>
				<div class="row">
				&nbsp;
				</div>

			</div>



	<div class="container-fluid">
	
		<div class="row main">
<!-- 			<h2 class="text-center"><i class="fa fa-file-o fa-md" aria-hidden="true"></i> Ajout d'un évènement</h2>
				<hr> -->
			<div class="col col-md-12">	
			<form class="form form-horizontal" method="POST">

					<div class="col col-md-6 text-right">
						<label for "AC_Date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Date de début de l' évènement</label>
						<input type="datetime" name="AC_Date" id="AC_Date"/>
					</div>	
					<div class="col col-md-6 text-right">
						<label for "AC_DateFin"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Date de fin de l' évènement</label>
						<input type="datetime" name="AC_DateFin" id="AC_DateFin"/>
					</div>						
					<div class="col col-md-6 text-right">						
						<label for "AC_Com1"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Description (50c max)<exp>*</exp></label>
						<textarea name="AC_Com1" id="AC_Com1" cols="30" rows="6"/> </textarea>
					</div>
					<div class="col col-md-6 text-right">
						<label for "AC_Com2"><i class="fa fa-book" aria-hidden="true"></i> Description détaillée (500c max)</label>
						<input type="text" name="AC_Com2" id="AC_Com2"/>
					</div>
					<div class="col col-md-6 text-right">
						<label for "AC_Puce"><i class="fa fa-cubes" aria-hidden="true"></i> Chemin du media</label>
						<input type="text" name="AC_Puce" id="AC_Puce"/>
					</div>
					<div class="col col-md-12 text-right>	
						<label for "AC_Notes"><i class="fa fa-envelope" aria-hidden="true"></i>  Note interne</label>
						<input type="text" name="AC_Notes" id="AC_Notes"/>
					</div>					
					<div class="col col-md-6 text-right">
						<label for "AC_Num"><i class="fa fa-folder-o" aria-hidden="true"></i> Référence de l' évènement</label>
						<input type="text" name="AC_Num" id="AC_Num"/>
					</div>
					<div class="col col-md-6 text-right">	
						<label for "AC_Adresse"><i class="fa fa-envelope-o" aria-hidden="true"></i> Adresse précise du lieu</label>
						<input type="text" name="AC_Adresse" id="AC_Adresse"/>
					</div>
						<div class="col col-md-6 text-right">	
							<label for "AC_Lieu"><i class="fa fa-address-card" aria-hidden="true"></i> Nom du lieu</label>
							<input type="text" name="AC_Lieu" id="AC_Lieu"/>
						</div>						
						<div class="col col-md-6 text-right">	
							<label for "AC_Code_Postal"><i class="fa fa-address-card" aria-hidden="true"></i> Code postal</label>
							<input type="text" name="AC_Code_Postal" id="AC_Code_Postal"/>
						</div>
						<div class="col col-md-6 text-right">
						<label for "AC_Visibilite"><i class="fa fa-eye" aria-hidden="true"></i> Visibilité</label>
						<select name="AC_Visibilite">
							<option value="Public">Public</option>
							<option value="Restreint">Restreint</option>
							<option value="Brouillon">Brouillon</option>
						</select>    
						</div>                    

<div class="col col-md-12" align="right"></div>
					<div class="col col-md-12" align="right">
						<button type="submit" class="btn btn-default"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i> Enregistrer</button>
					</div>

				</div>
			</form>			

		</div>

	</div>

</div>
</div>		<!-- <div class="main-login main-center"> -->

</article>
</div>
</div>
</section>
<?php $this->stop('main_content') ?>
