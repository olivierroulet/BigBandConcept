<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Enregistrement d'un artiste</h2>
	<p>Bon courage !!!</p>
	<p>lien vers la doc<a href="../docs/tuto/" title="Documentation de BigBand">docs/tuto</a></p>



<!-- ** Fin des boutons NAVIGATION ************************ -->	
<!-- ** Début du formulaire d' ajout d' ARTISTE ' ************************ -->	


<div class="container-fluid" style="width:65%; margin-left: 50px;" align="right">
	<div class="row main">
		<div class="main-login main-right">
			<h2><i class="fa fa-file-o fa-md" aria-hidden="true"></i>Ajout d'un artiste</h2>
				<?php
			        if(!empty($formErrors)){
			            echo '<p style="color:red">'.implode('<br>', $formErrors);
			        }        if($formValid == true){
			            echo '<p style="color:green">Vous êtes désormais inscrit</p>';
			        }    
				?>
			<div class="col col-md-12 mobiform">						
				<form class="form form-horizontal" method="post">
					<div class="col col-md-12">
						<label for "AR_Prenom"><i class="fa fa-user fa" aria-hidden="true"></i>Prénom</label>
						<input type="text" name="AR_Prenom" id="AR_Prenom"  placeholder="Jean-Elie"/>
						<label for "AR_Nom"><i class="fa fa-user fa" aria-hidden="true"></i>Nom de famille</label>
						<input type="text" name="AR_Nom" id="AR_Nom" placeholder="de la Fontaine"/>
						<label for "AR_Pseudo"><i class="fa fa-user fa" aria-hidden="true"></i>Pseudo / Nom de scène</label>
						<input type="text" name="AR_Pseudo" id="AR_Pseudo" placeholder="Nom de scène"/>
					</div>
					<div class="col col-md-12">	
						<label for "AR_Adresse_Mail"><i class="fa fa-envelope-o fa" aria-hidden="true"></i>Adresse messagerie électronique</label>
						<input type="email" name="AR_Adresse_Mail" id="AR_Adresse_Mail"  placeholder="pre.nom@MonSite.fr"/>
						<label for "US_Password"><i class="fa fa-lock fa-lg" aria-hidden="true"></i> Mot de passe</label>
						<input type="password" name="US_Password" id="US_Password"  placeholder=""/>
						<label for "mdp2"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i> Confirmer le mot de passe</label>
						<input type="password" name="mdp2" id="mdp2"  placeholder=""/>

						<label for "AR_Emploi_Occupe">Emploi occupé</label>
						<input type="text" name="AR_Emploi_Occupe" id="AR_Emploi_Occupe"  placeholder=""/>
						<label for "AR_Civilite">Civilité</label>
						<select name="AR_Civilite" id="AR_Civilite">
							<option value="Mr">Mr</option>
							<option value="Mme">Mme</option>
						</select>
						<label for "AR_Numero">Numero de la voie/rue</label>
						<input type="text" name="AR_Numero" id="AR_Numero"  placeholder=""/>
						<label for "AR_Voie">Voie</label>
						<input type="text" name="AR_Voie" id="AR_Voie"  placeholder=""/>
						<label for "AR_Batiment">Bâtiment</label>
						<input type="text" name="AR_Batiment" id="AR_Batiment"  placeholder=""/>

<!-- Liste de colonnes non utilisées par le formulaire :
	AR_Idartiste, , , , , , , , , , , , , , , , AR_Anniversaire, , , , , , AR_Createur, AR_Date_De_Creation, AR_Modificateur, AR_Date_De_Modification FROM artistes  -->

						<label for "AR_Adresse_Ligne_1">Adresse</label>
						<input type="text" name="AR_Adresse_Ligne_1" id="AR_Adresse_Ligne_1"  placeholder=""/>
						<label for "AR_Code_Postal">Code Postal</label>
						<input type="text" name="AR_Code_Postal" id="AR_Code_Postal"  placeholder=""/>
						<label for "AR_Ville">Ville</label>
						<input type="text" name="AR_Ville" id="AR_Ville"  placeholder=""/>

						<label for "AR_Telephone_1">Téléphone mobile</label>
						<input type="text" name="AR_Telephone_1" id="AR_Telephone_1" value="+33(0)601020304" placeholder="+33(0)601020304"/>
						<label for "AR_Telephone_2">Téléphone fixe</label>
						<input type="text" name="AR_Telephone_2" id="AR_Telephone_2"  placeholder=""/>
						<!-- insérer un séparateur -->
						<label for "AR_N_De_Securite_Sociale">Numéro de Sécurité Sociale</label>
						<input type="text" name="AR_N_De_Securite_Sociale" id="AR_N_De_Securite_Sociale"  placeholder=""/>
						<label for "AR_N_Du_Guso">Numéro du GUSO</label>
						<input type="text" name="AR_N_Du_Guso" id="AR_N_Du_Guso"  placeholder=""/>
						<label for "AR_Numero_Conges_Spectacle">Numéro de Congés Spectacle</label>
						<input type="text" name="AR_Numero_Conges_Spectacle" id="AR_Numero_Conges_Spectacle"  placeholder=""/>
						<label for "AR_Date_De_Naissance">Date de Naissance</label>
						<input type="date" name="AR_Date_De_Naissance" id="AR_Date_De_Naissance"  placeholder=""/>
						<label for "AR_Lieu_De_Naissance">Lieu de Naissance</label>
						<input type="text" name="AR_Lieu_De_Naissance" id="AR_Lieu_De_Naissance"  placeholder=""/>

						<label for "AR_Nationalite">Nationalité</label>
						<input type="text" name="AR_Nationalite" id="AR_Nationalite" value="FR" placeholder="code sur 2 caractères"/>

						<label for "AR_NewsLetterYN"><i class="fa fa-hand-peace-o fa-lg" aria-hidden="true"></i>Souscrire à la newsletter ?</label>
						<input type="checkbox" name="AR_NewsLetterYN" checked title ="cochée = oui">
						<div class="col col-md-12" align="right">
							<button type="submit" class="btn btn-default"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i> Envoi</button>
						</div>
					</div>
				</form>				
			</div>
		</div>
	</div>
</div>		<!-- <div class="main-login main-center"> -->
<!-- ** Fin du formulaire d' ajout d' ARTISTE ' ************************ -->	

<?php $this->stop('main_content') ?>
