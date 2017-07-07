<?php $this->layout('solopageconnected_layout', ['title' => 'MàJ d\' un artiste']) ?>

<?php $this->start('main_content') ?>


<!-- SELECT `AR_Idartiste`, `AR_ID_InUsersTable`, `AR_Etiquette_Artiste`, `AR_Etiquette_Artiste_Inversee`, `AR_Emploi_Occupe`, `AR_Civilite`, `AR_Nom`, `AR_Prenom`, `AR_Pseudo`, `AR_Password`, `AR_Numero`, `AR_Batiment`, `AR_Voie`, `AR_Adresse_Ligne_1`, `AR_Adresse_Ligne_2`, `AR_Code_Postal`, `AR_Ville`, `AR_Telephone_1`, `AR_Telephone_2`, `AR_Adresse_Mail`, `AR_N_De_Securite_Sociale`, `AR_N_Du_Guso`, `AR_Numero_Conges_Spectacle`, `AR_Date_De_Naissance`, `AR_Anniversaire`, `AR_Lieu_De_Naissance`, `AR_Nationalite`, `AR_Etiquette_Dpae`, `AR_NewsLetterYN`, `AR_Etiquette_Feuille_De_Mandat`, `AR_Etiquette_Feuille_De_Presence`, `AR_Createur`, `AR_Date_De_Creation`, `AR_Modificateur`, `AR_Date_De_Modification` FROM `artistes`  -->


<!-- ** Fin des boutons NAVIGATION ************************ -->	
<!-- ** Début du formulaire d' ajout d' ARTISTE ' ************************ -->	

<section id="artistes" class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">

				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Fiche Artiste</h2>
				</div>
				<div class="col-sm-12"> 

			<h2><i class="fa fa-file-o fa-md" aria-hidden="true"></i> Fiche artiste</h2>
			<?php
			if(!empty($formErrors)){
				echo '<p style="color:red">'.implode('<br>', $formErrors);
			}        if($formValid == true){
				echo '<p style="color:white; font-weight:bold,">Vous êtes désormais inscrit</p>';
			}    
// on récupère la saisie si v::validator a trouvé des erreurs.
			$post = $_POST;
			$AR_Prenom = isset($post['AR_Prenom']) ? $post['AR_Prenom'] : '';
			$AR_Nom = isset($post['AR_Nom']) ? $post['AR_Nom'] : '';
			$AR_Pseudo = isset($post['AR_Pseudo']) ? $post['AR_Pseudo'] : '';
			$AR_Adresse_Mail = isset($post['AR_Adresse_Mail']) ? $post['AR_Adresse_Mail'] : '';
			$AR_Password = isset($post['AR_Password']) ? $post['AR_Password'] : '';
			$AR_Emploi_Occupe = isset($post['AR_Emploi_Occupe']) ? $post['AR_Emploi_Occupe'] : '';
			$AR_Civilite = isset($post['AR_Civilite']) ? $post['AR_Civilite'] : '';
			$AR_Numero = isset($post['AR_Numero']) ? $post['AR_Numero'] : '';
			$AR_Voie = isset($post['AR_Voie']) ? $post['AR_Voie'] : '';
			$AR_Batiment = isset($post['AR_Batiment']) ? $post['AR_Batiment'] : '';
//			$AR_Adresse_Ligne_1 = isset($post['AR_Adresse_Ligne_1']) ? $post['AR_Adresse_Ligne_1'] : '';
			$AR_Code_Postal = isset($post['AR_Code_Postal']) ? $post['AR_Code_Postal'] : '';
			$AR_Ville = isset($post['AR_Ville']) ? $post['AR_Ville'] : '';
			$AR_Telephone_1 = isset($post['AR_Telephone_1']) ? $post['AR_Telephone_1'] : '';
			$AR_Telephone_2 = isset($post['AR_Telephone_2']) ? $post['AR_Telephone_2'] : '';
			$AR_N_De_Securite_Sociale = isset($post['AR_N_De_Securite_Sociale']) ? $post['AR_N_De_Securite_Sociale'] : '';
			$AR_N_Du_Guso = isset($post['AR_N_Du_Guso']) ? $post['AR_N_Du_Guso'] : '';
			$AR_Numero_Conges_Spectacle = isset($post['AR_Numero_Conges_Spectacle']) ? $post['AR_Numero_Conges_Spectacle'] : '';
			$AR_Date_De_Naissance = isset($post['AR_Date_De_Naissance']) ? $post['AR_Date_De_Naissance'] : '';
			$AR_Lieu_De_Naissance = isset($post['AR_Lieu_De_Naissance']) ? $post['AR_Lieu_De_Naissance'] : '';
			$AR_Nationalite = isset($post['AR_Nationalite']) ? $post['AR_Nationalite'] : '';
			$AR_NewsLetterYN = isset($post['AR_NewsLetterYN']) ? $post['AR_NewsLetterYN'] : '';

			?>
			<div class="col col-md-12 mobiform">						
				<form class="form form-horizontal" method="post">
					<div class="col col-md-12">
						<label for "AR_Prenom"><i class="fa fa-user fa" aria-hidden="true"></i>Prénom</label>
						<input type="text" name="AR_Prenom" value="<?php echo $AR_Prenom;?>" id="AR_Prenom"/>
						<label for "AR_Nom"><i class="fa fa-user fa" aria-hidden="true"></i>Nom de famille</label>
						<input type="text" name="AR_Nom" id="AR_Nom" value="<?php echo $AR_Nom;?>"placeholder="de la Fontaine"/>
						<label for "AR_Pseudo"><i class="fa fa-user fa" aria-hidden="true"></i>Pseudo / Nom de scène</label>
						<input type="text" name="AR_Pseudo" id="AR_Pseudo" value="<?php echo $AR_Pseudo;?>"placeholder="Nom de scène"/>
					</div>
					<div class="col col-md-12">	
						<label for "AR_Adresse_Mail"><i class="fa fa-envelope-o fa" aria-hidden="true"></i>Adresse messagerie électronique</label>
						<input type="email" name="AR_Adresse_Mail" id="AR_Adresse_Mail" value="<?php echo $AR_Adresse_Mail;?>" placeholder="pre.nom@MonSite.fr" required/>
						<label for "AR_Password"><i class="fa fa-lock fa-lg" aria-hidden="true"></i> Mot de passe</label>
						<input type="password" name="AR_Password" id="AR_Password" required  title = "au moins 8 caractères"/>
						<label for "mdp2"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i> Confirmer le mot de passe</label>
						<input type="password" name="mdp2" id="mdp2"  title = "au moins 8 caractères" required/>

						<label for "AR_Emploi_Occupe">Emploi occupé</label>
						<input type="text" name="AR_Emploi_Occupe" id="AR_Emploi_Occupe" value="<?php echo $AR_Emploi_Occupe;?>"/>
						<label for "AR_Civilite">Civilité</label>
						<select name="AR_Civilite" id="AR_Civilite">
							<option value="Mr">Mr</option>
							<option value="Mme">Mme</option>
						</select>
						<label for "AR_Numero">Numero de la voie/rue</label>
						<input type="text" name="AR_Numero" id="AR_Numero"  value="<?php echo $AR_Numero;?>"/>
						<label for "AR_Voie">Voie</label>
						<input type="text" name="AR_Voie" id="AR_Voie"  value="<?php echo $AR_Voie;?>"/>
						<label for "AR_Batiment">Bâtiment</label>
						<input type="text" name="AR_Batiment" id="AR_Batiment" value="<?php echo $AR_Batiment;?>"/>


<!-- 	<label for "AR_Adresse_Ligne_1">Adresse</label>
	<input type="text" name="AR_Adresse_Ligne_1" id="AR_Adresse_Ligne_1" value="<?php echo $AR_Adresse_Ligne_1;?>"/> -->
						<label for "AR_Code_Postal">Code Postal</label>
						<input type="text" name="AR_Code_Postal" id="AR_Code_Postal" value="<?php echo $AR_Code_Postal;?>"/>
						<label for "AR_Ville">Ville</label>
						<input type="text" name="AR_Ville" id="AR_Ville"  value="<?php echo $AR_Ville;?>"/>

						<label for "AR_Telephone_1">Téléphone mobile</label>
						<input type="text" name="AR_Telephone_1" id="AR_Telephone_1" value="<?php echo $AR_Telephone_1;?>" placeholder="+33(0)601020304"/>
						<label for "AR_Telephone_2">Téléphone fixe</label>
						<input type="text" name="AR_Telephone_2" id="AR_Telephone_2"  value="<?php echo $AR_Telephone_2;?>"/>
						<!-- insérer un séparateur -->
						<label for "AR_N_De_Securite_Sociale">Numéro de Sécurité Sociale</label>
						<input type="text" name="AR_N_De_Securite_Sociale" id="AR_N_De_Securite_Sociale"  value="<?php echo $AR_N_De_Securite_Sociale;?>"/>
						<label for "AR_N_Du_Guso">Numéro du GUSO</label>
						<input type="text" name="AR_N_Du_Guso" id="AR_N_Du_Guso"  value="<?php echo $AR_N_Du_Guso;?>"/>
						<label for "AR_Numero_Conges_Spectacle">Numéro de Congés Spectacle</label>
						<input type="text" name="AR_Numero_Conges_Spectacle" id="AR_Numero_Conges_Spectacle"  value="<?php echo $AR_Numero_Conges_Spectacle;?>"/>
						<label for "AR_Date_De_Naissance">Date de Naissance</label>
						<input type="date" name="AR_Date_De_Naissance" id="AR_Date_De_Naissance"  value="<?php echo $AR_Date_De_Naissance;?>"/>
						<label for "AR_Lieu_De_Naissance">Lieu de Naissance</label>
						<input type="text" name="AR_Lieu_De_Naissance" id="AR_Lieu_De_Naissance"  value="<?php echo $AR_Lieu_De_Naissance;?>"/>

						<label for "AR_Nationalite">Nationalité</label>
						<input type="text" name="AR_Nationalite" id="AR_Nationalite" value="FR" value="<?php echo $AR_Nationalite;?>" placeholder="code sur 2 caractères en majuscules"/>

						<label for "AR_NewsLetterYN"><i class="fa fa-hand-peace-o fa-lg" aria-hidden="true"></i>Souscrire à la newsletter ?</label>
						<input type="checkbox" name="AR_NewsLetterYN" checked="<?php echo $AR_NewsLetterYN;?>" title ="cochée = oui">
						<div class="col col-md-12" align="right">
							<button type="submit" class="btn btn-default"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i> Envoi</button>
						</div>
					</div>
				</form>				
			</div>
		</div>
	</div>
</div>	
</div>
</section>
<!-- <div class="main-login main-center"> -->
<!-- ** Fin du formulaire d' ajout d' ARTISTE ' ************************ -->	

<?php $this->stop('main_content') ?>
