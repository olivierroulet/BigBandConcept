<?php $this->layout('solopageconnected_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-1.5 pull-left">
					<a href="redirect_role" class="btn btn-primary">Menu principal</a>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-sm-6 col-sm-offset-3">
					<h2 class="title-one">Gestion des utilisateurs</h2>
					<h3>Rechercher un utilisateur</h3>
					<?php
					$post = $_POST;
					$US_email = isset($post['US_email']) ? $post['US_email'] : '';
					?>
					<form method="post" action="rechercher_un_utilisateur">
						
						<div class="form-group">
							<label for="US_email">Email de l'utilisateur</label>
							<input type="text" name="US_email" value="<?php echo $US_email;?>" id="US_email" class="form-control" placeholder="Adresse mail" tabindex="4">
						</div> 
						<button type="submit" class="btn btn-success">Rechercher</button>
						<a href="lister_les_utilisateurs" class="btn btn-success">Tous les utilisateurs</a>
					</form>

					<h3>Liste des utilisateurs</h3>
				</div>


			</div>
			<div class="row">
				<?php 
				if(!empty($users)):?>
					<hr>
					<?php foreach ($users as $user): 

					switch ($user['US_idURole']) {
						case 1:
						$role='Administrateur';
						break;
						case 2:
						$role='Employeur';
						break;
						case 3:
						$role='Artiste';
						break;
						case 4:
						$role='Fan';
						break;
					}?>

					<div class='row text-center'>
						<div class='col-sm-1'>
							<a class="btn btn-warning" href="updater_un_utilisateur?id=<?php echo $user['US_id'];?>">Modifier</a>
						</div>
						<div class='col-sm-4'>
							<?=$user['US_FirstName']. ' ' . $user['US_LastName'] ; ?>
						</div>
						<div class='col-sm-4'>
							<?=$user['US_email']; ?>
						</div>
						<div class='col-sm-2'>
							<?=$role; ?>
						</div>
						<div class='col-sm-1'>
							<a class="btn btn-danger" href="supprimer_un_utilisateur?id=<?php echo $user['US_id'];?>">Supprimer</a>
						</div>
					</div>
					<hr>

				<?php endforeach; ?>
			<?php else: ?>
				<div class="alert alert-danger">
					Aucun utilisateur !
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php $this->stop('main_content') ?>


