<?php $this->layout('solopage_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>
<section id="contact">
	<div class="container">
		<div class="container">
			<div class="row text-center clearfix">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="contact-heading">
						<h2 class="title-one">Contactez-nous</h2>
						<p>Pour toute prestation ou renseignement</p>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="contact-details">
				<div class="col-sm-12"> 
					
					<?php
					if(!empty($formErrors)){
						?>
						<div class="status alert alert-danger" style=""><?php
							echo '<p style="color:red">'.implode('<br>', $formErrors);?>
						</div>
						<?php
					}
					else {
						?>
						<div class="status alert alert-success" style=""><?php
							echo '<p style="color:green">Votre demande a bien été envoyée';?>

						</div>
						<?php
					}
					?>


					<div id="contact-form-section">
						<form id="contact-form" name="contact-form" method="post" action="formulaire_employeur">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="CL_Prenom">Prénom</label>
										<input type="text" name="CL_Prenom" id="CL_Prenom" class="form-control" required="required" placeholder="Prénom" tabindex="1">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="CL_Nom">Nom</label>
										<input type="text" name="CL_Nom" id="CL_Nom" class="form-control" required="required" placeholder="Nom" tabindex="2">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="CL_Telephone">Telephone</label>
										<input type="text" name="CL_Telephone" id="CL_Telephone" class="form-control" required="required" placeholder="Téléphone" tabindex="3">
									</div>
								</div>
							</div><!--Fin de row -->
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="CL_Email1">Adresse mail</label>
										<input type="email" name="CL_Email1" id="CL_Email1" class="form-control" required="required" placeholder="Adresse mail" tabindex="4">
									</div> 
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="CL_Email2">Confirmez votre adresse mail</label>
										<input type="email" name="CL_Email2" id="CL_Email2" class="form-control" required="required" placeholder="Confirmez votre adresse mail" tabindex="4">
									</div>
								</div>
							</div><!--Fin de row -->
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="CL_Raison_Sociale">Raison sociale</label>
										<input type="text" name="CL_Raison_Sociale" id="CL_Raison_Sociale" class="form-control" placeholder="Raison sociale" tabindex="5">
									</div>
									<div class="form-group">
										<label for="CL_Statut_Juridique">Statut juridique</label>
										<select class="form-control" name="CL_Statut_Juridique" id="CL_Statut_Juridique" tabindex="6">
											<option selected value="">Indiquez votre statut juridique</option>
											<option value="particulier">Particulier</option>
											<option value="entreprise">Entreprise</option>
											<option value="administration">Administration</option>
											<option value="association loi 1901">Association loi 1901</option>
										</select>
									</div>
									<div class="form-group">
										<label for="CL_Titulaire_Licence_Entrepreneur_De_Spectacles">Titulaire de la licence d'entrepreneur de spectacle
											<input type="checkbox" name="CL_Titulaire_Licence_Entrepreneur_De_Spectacles" id="CL_Titulaire_Licence_Entrepreneur_De_Spectacles" tabindex="7">
										</label>
									</div>
								</div>
							</div><!-- fin de row -->
							<div class="row">
								<fieldset>
									<legend>Votre évènement</legend>
									<div class="col-lg-4">

										<div class="form-group">
											<label for="DV_Datedelaprestation">Date de votre évènement</label>
											<input type="text" name="DV_Datedelaprestation" id="DV_Datedelaprestation" class="form-control" placeholder="01/01/2018" tabindex="8">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="DV_Codepostal">Code postal</label>
											<input type="text" name="DV_Codepostal" id="DV_Codepostal" class="form-control"  placeholder="Code postal" tabindex="9">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="DV_Ville">Ville</label>
											<input type="text" name="DV_Ville" id="DV_Ville" class="form-control" placeholder="Ville" tabindex="10">
										</div>
									</div>
								</div><!--Fin de row -->
							</fieldset>
							<div class="form-group">
							<button type="submit" class="btn btn-success">Envoyer</button>
							</div>
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div>
</div>
</div>
</div> 
</section>

<?php $this->stop('main_content') ?>
