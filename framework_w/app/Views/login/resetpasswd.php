<?php $this->layout('solopage_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section id="clients" class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Réinitialisez votre mot de passe</h2>
					</div>
				<div class="col-sm-12"> 
					
					
				</div>
				<form method="POST">
					<div class="col-sm-4 col-sm-offset-2">
						<div class="form-group">
							<label for="password1">Mot de passe</label>
							<input type="password" class="form-control" id="password1" name="password1" placeholder="Votre mot de passe">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="password2">Confirmez votre mot de passe</label>
							<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirmez votre mot de passe">
						</div>
					</div>
					<div class="col-sm-8 col-sm-offset-2">
						<button type="submit" class="btn btn-success">Envoyer</button>

					</h2>

				</div>
			</form>
		</div>
	</div>
</section><!--/#clients-->

<?php $this->stop('main_content') ?>
