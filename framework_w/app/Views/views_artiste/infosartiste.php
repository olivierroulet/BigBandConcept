<?php $this->layout('solopageconnected_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<!-- SELECT `AR_Idartiste`, `AR_ID_InUsersTable`, `AR_Etiquette_Artiste`, `AR_Etiquette_Artiste_Inversee`, `AR_Emploi_Occupe`, `AR_Civilite`, `AR_Nom`, `AR_Prenom`, `AR_Pseudo`, `AR_Password`, `AR_Numero`, `AR_Batiment`, `AR_Voie`, `AR_Adresse_Ligne_1`, `AR_Adresse_Ligne_2`, `AR_Code_Postal`, `AR_Ville`, `AR_Telephone_1`, `AR_Telephone_2`, `AR_Adresse_Mail`, `AR_N_De_Securite_Sociale`, `AR_N_Du_Guso`, `AR_Numero_Conges_Spectacle`, `AR_Date_De_Naissance`, `AR_Anniversaire`, `AR_Lieu_De_Naissance`, `AR_Nationalite`, `AR_Etiquette_Dpae`, `AR_NewsLetterYN`, `AR_Etiquette_Feuille_De_Mandat`, `AR_Etiquette_Feuille_De_Presence`, `AR_Createur`, `AR_Date_De_Creation`, `AR_Modificateur`, `AR_Date_De_Modification` FROM `artistes`  -->


<section id="clients" class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
			
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Fiche Artiste</h2>
				</div>
				<div class="col-sm-12"> 
					
					<?php
					if(!empty($formErrors)){
						?>
						<div class="status alert alert-danger" style=""><?php
							echo '<p style="color:red">'.implode('<br>', $formErrors);?>
						</div>
						<?php
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $this->stop('main_content') ?>
