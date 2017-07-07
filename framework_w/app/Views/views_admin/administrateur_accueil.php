<?php $this->layout('solopageconnected_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Menu Administrateur</h2>
				</div>
			</div>
			<div class="row">
				
				<form method="post">
					<div class="col-sm-3 text-center">
						<div class="interface-employeurs">
							<label for="rechercheemployeur">EMPLOYEURS</label>
							<select class="btn btn-block btn-primary" name="rechercheemployeur">
								<option selected value="Tous les employeurs">Tous les employeurs</option>
								<option disabled value="">------------</option>
								<option value="Les derniers employeurs">Les derniers employeurs</option>
								<option disabled value="">------------</option>
								<option value="Anciens employeurs">Anciens employeurs</option>
								<option value="Employeurs potentiels">Employeurs potentiels</option>
								<option value="Employeurs actifs">Employeurs actifs</option>
								<option disabled value="">------------</option>
								<option value="Associations loi 1901">Associations loi 1901</option>
								<option value="Entreprises">Entreprises</option>
								<option value="Particuliers">Particuliers</option>
								<option value="Administrations">Administrations</option>
								<option disabled value="">------------</option>
							</select>
							<a href="" class="btn btn-block btn-primary">Rechercher un employeur</a>
							<a href="" class="btn btn-block btn-primary">Créer une fiche employeur</a>
							
						</div>
						<div class="interface-employeurs">OUTILS DE FONCTIONNEMENT
							<a href="gestion_des_utilisateurs" class="btn btn-block btn-primary">Gestion des utilisateurs<span class="pull-right"><?=$nbUtilisateurs;?></span></a>
							<a href="" class="btn btn-block btn-primary">Simulation de salaire GUSO</a>
							<a href="" class="btn btn-block btn-primary">Gestion des artistes</a>
						</div>
					</div>
					<div class="col-sm-3 text-center">
						<div class="interface-devis">
							<label for="recherchedevis">DEVIS</label>
							<select class="btn btn-block btn-primary" name="recherchedevis">
								<option selected value="Tous les devis">Tous les devis</option>
								<option disabled value="">------------</option>
								<option value="Les derniers devis">Les derniers devis</option>
								<option disabled value="">------------</option>
								<option value="Devis a faire">Devis à faire</option>
								<option value="Devis en attente">Devis en attente</option>
								<option value="Devis acceptés">Devis acceptés</option>
								<option value="Devis refusés">Devis refusés</option>
								<option disabled value="">------------</option>
							</select>
							<a href="" class="btn btn-block btn-primary">Rechercher un devis</a>
						</div>
					</div>
					<div class="col-sm-3 text-center">
						<div class="interface-contrats">
							<label for="recherchecontrat">CONTRATS</label>
							<select class="btn btn-block btn-primary" name="recherchedevis">
								<option selected value="Tous les contrats">Tous les contrats</option>
								<option disabled value="">------------</option>
								<option value="Contrats à venir">Contrats à venir</option>
								<option value="Contrats passés">Contrats passés</option>
								<option value="Contrat du jour">Contrat du jour</option>
								<option disabled value="">------------</option>
							</select>
							<a href="" class="btn btn-block btn-primary">Tous les contrats</a>
							<a href="" class="btn btn-block btn-primary">Rechercher un contrat</a>
						</div>
					</div>
					<div class="col-sm-3 text-center">
						<div class="interface-messagerie">MESSAGERIE WEB
							<a href="" class="btn btn-block btn-primary">Boite de reception</a>
							<a href="" class="btn btn-block btn-primary">Messages archivés</a>
						</div>
						<div class="interface-messagerie">SITE WEB 
							<a href="" class="btn btn-block btn-primary">Calendrier</a>
						</div>
						<div class="interface-messagerie">AGENDA 
							<a href="" class="btn btn-block btn-primary">A faire aujourd'hui</a>
						</div>
					</div>
				</form>
			</div>
			<div class="row text-center">
				<h4>COMPTE RENDU DE VOTRE BASE DE DONNEES</h4>
				<div class='col-sm-5 text-center'>
					<h5>Gestion des employeurs et devis</h5>
					Fiches employeurs : <?=$nbEmployeurs;?><br>
					Devis à faire : <?=$nbDevisAFaire;?><br> 
					Devis en attente : <?=$nbDevisEnAttente;?><br> 

				</div>
				<div class='col-sm-7 text-center'>
					<h5>Gestion des futurs contrats</h5>
					
				</div>
			</div>

		</div>
	</div>
</section>
<?php $this->stop('main_content') ?>

