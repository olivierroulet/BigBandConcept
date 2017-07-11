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

		<div class="container-fluid">
			<div class="row main text-center">
<!-- 			<h2 class="text-center"><i class="fa fa-file-o fa-md" aria-hidden="true"></i> Ajout d'un évènement</h2>
				<hr> -->
				<div class="col col-md-12">	
		<form class="form form-horizontal" method="POST">
					<div class="col col-md-6 text-right">
						<label for "AC_Date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Date de l' évènement</label>
						<input type="date" name="AC_Date" id="AC_Date"/>
					</div>	
					<div class="col col-md-6 text-right">						
						<label for "AC_Com1"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Commentaire sommaire (50 c max)<exp>*</exp></label>
						<input type="text" name="AC_Com1" id="AC_Com1"/>
					</div>
					<div class="col col-md-6 text-right">	
						<label for "AC_Com2"><i class="fa fa-book" aria-hidden="true"></i> Commentaire détaillé (500 c max)</label>
						<input type="text" name="AC_Com2" id="AC_Com2"/>
					</div>
					<div class="col col-md-6 text-right">
						<label for "AC_Puce"><i class="fa fa-cubes" aria-hidden="true"></i> Puce (demain image)</label>
						<input type="text" name="AC_Puce" id="AC_Puce"/>
					</div>
					<div class="col col-md-6 text-right>	
						<label for "AC_Notes"><i class="fa fa-envelope" aria-hidden="true"></i>  Note interne (non publiée, même si public)</label>
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
						<button type="submit" class="btn btn-default"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i> Envoi</button>
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
