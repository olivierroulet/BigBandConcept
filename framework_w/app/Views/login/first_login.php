<?php $this->layout('solopage_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section id="clients" class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Premiere connexion</h2>
					<p>Employeur</p>
					<p>Artiste</p>
					<p>Administrateur</p>
				</div>
				<div class="col-sm-12"> 
					
					<?php
					if(!empty($formErrors)){
						?>
						<div class="status alert alert-danger" style=""><?php
							echo '<p style="color:red">'.implode('<br>', $formErrors);?>
						</div>
						<?php
					} else if(!empty($message)){
						?>
						<div class="status alert alert-danger" style=""><?php
							echo '<p style="color:red">'.$message;?>

						</div>
						<?php
					} else
					if(isset($formValid) && !empty($formValid)){
						?>
						<div class="status alert alert-success" style=""><?php
							echo '<p style="color:green">Votre compte a été créé avec les identifiants que vous avez renseignés'.'<br>';
							echo '<a href="">Se connecter</a>';?>
						</div>
						<?php
					}
					?>
				</div>
				<form method="POST" action="first_login">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="email">Adresse Mail</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Votre adresse mail">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="username">Pseudo</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="Votre nom d'utilisateur">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="password1">Mot de passe</label>
							<input type="password" class="form-control" id="password1" name="password1" placeholder="Votre mot de passe">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="password2">Confirmez votre mot de passe</label>
							<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirmez votre mot de passe">
						</div>
					</div>
					<div class="col-sm-8 col-sm-offset-2">
						<button type="submit" class="btn btn-primary">Créer votre compte</button>

					</h2>

				</div>
			</form>
		</div>
	</div>
</section><!--/#clients-->

<?php $this->stop('main_content') ?>
