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
				
				<div class="col-sm-3 text-center">
					<div class="interface-employeurs">EMPLOYEURS
						<a href="" class="btn btn-block btn-primary">Créer une fiche employeur</a>
						<a href="" class="btn btn-block btn-primary">Rechercher un employeur</a>
					</div>
					<div class="interface-employeurs">OUTILS DE FONCTIONNEMENT
						<a href="" class="btn btn-block btn-primary">Simulation de salaire GUSO</a>
						<a href="" class="btn btn-block btn-primary">Rechercher u</a>
					</div>
				</div>
				<div class="col-sm-3 text-center">
					<div class="interface-devis">DEVIS
						<a href="" class="btn btn-block btn-primary">Tous les devis</a>
						<a href="" class="btn btn-block btn-primary">Rechercher un devis</a>
					</div>
				</div>
				<div class="col-sm-3 text-center">
					<div class="interface-contrats">CONTRATS
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


