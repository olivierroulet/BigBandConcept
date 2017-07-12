<?php $this->layout('solopageconnected_layout', ['title' => 'MàJ artiste']) ?>

<?php $this->start('main_content') ?>

<section id="artistes" class="parallax-section">

      <div class="clients-wrapper">
        <div class="row text-center">
          <div class="col-md-12">
          <div class="col-md-8">&nbsp;</div>
            <div class="col-md-2">
              <a href="redirect_role" class="btn btn-block btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Menu principal</a>
            </div>
            <div class="col-sm-2">
                <!-- hypothétique uri -->
            </div>
            <div class="col-md-12">
                <!--  <a href="redirect_role" class="btn btn-block btn-default">préc.</a>
                  <a href="redirect_role" class="btn btn-block btn-default">suiv.</a> -->
            </div>
          </div> <!-- fin de row -->
        </div>
        <div class="row">
        &nbsp;
        </div>

      </div>

      
	<div class="container">
		<div class="clients-wrapper">
				<div class="row text-center">
					<div class="col-md-12">
						<h2 class="title-one">Fiche Artiste</h2>
					</div>
				</div>	
			<div class="col-md-12"> 

			<?php
			// on récupère la saisie si v::validator a trouvé des erreurs.
			$post = $_POST;
			$AR_ActiveYN = isset($post['AR_ActiveYN']) ? $post['AR_ActiveYN'] : '';
			$AR_Prenom = isset($post['AR_Prenom']) ? $post['AR_Prenom'] : '';
			$AR_Nom = isset($post['AR_Nom']) ? $post['AR_Nom'] : '';
			$AR_Pseudo = isset($post['AR_Pseudo']) ? $post['AR_Pseudo'] : '';
			$AR_Adresse_Mail = isset($post['AR_Adresse_Mail']) ? $post['AR_Adresse_Mail'] : '';
			// $AR_Password = isset($post['AR_Password']) ? $post['AR_Password'] : '';
			$AR_Emploi_Occupe = isset($post['AR_Emploi_Occupe']) ? $post['AR_Emploi_Occupe'] : '';
			$AR_Civilite = isset($post['AR_Civilite']) ? $post['AR_Civilite'] : '';
			$AR_Numero = isset($post['AR_Numero']) ? $post['AR_Numero'] : '';
			$AR_Voie = isset($post['AR_Voie']) ? $post['AR_Voie'] : '';
			$AR_Batiment = isset($post['AR_Batiment']) ? $post['AR_Batiment'] : '';
			$AR_Adresse_Ligne_1 = isset($post['AR_Adresse_Ligne_1']) ? $post['AR_Adresse_Ligne_1'] : '';
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
			<div class="col col-md-12 table-bordered">						
<!-- ***********************************  début du formulaire  *********************************** -->
				<form class="form" method="POST">
				<div class="form-group">
			<div class="col col-md-12">&nbsp;  </div>

				<div class="col col-md-12">
					<div class="col col-md-4 text-left">		
						<label for "AR_Prenom"><i class="fa fa-user fa" aria-hidden="true"></i> Prénom </label>
						<input class="form-control" type="text" name="AR_Prenom" value="<?= $current_artist['AR_Prenom'];?>" id="AR_Prenom"/>

					</div>	
					<div class="col col-md-4 text-right">			
						<label for "AR_Nom"><i class="fa fa-user fa" aria-hidden="true"></i> Nom de famille </label>
						<input class="form-control" type="text" name="AR_Nom" id="AR_Nom" value="<?= $current_artist['AR_Nom'];?>"placeholder="de la Fontaine"/>
					</div>	

					<div class="col col-md-4 text-right">						
						<label for "AR_Pseudo"><i class="fa fa-user fa" aria-hidden="true"></i> Pseudo </label>
						<input class="form-control" type="text" name="AR_Pseudo" id="AR_Pseudo" value="<?= $current_artist['AR_Pseudo'];?>"placeholder="Nom de scène"/>
					</div>
				</div>

				<div class="col col-md-12"> 				
					<div class="col col-md-3 text-left">						
						<label for "AR_Civilite"> Civilité </label><br>
						<select class="form-control" name="AR_Civilite" id="AR_Civilite" >
							<option value="Mr">Mr</option>
							<option value="Mme">Mme</option>
						</select>
					</div>					
					<div class="col col-md-5 text-right">					
						<label for "AR_Adresse_Mail"><i class="fa fa-envelope-o fa" aria-hidden="true"></i> Adresse messagerie </label>
						<input class="form-control" type="email" name="AR_Adresse_Mail" id="AR_Adresse_Mail" value="<?= $current_artist['AR_Adresse_Mail'];?>" placeholder="pre.nom@MonSite.fr" required/>
					</div>
					<div class="col col-md-4 text-right">											
						<label for "AR_Emploi_Occupe"> Emploi occupé </label>
						<input class="form-control" type="text" name="AR_Emploi_Occupe" id="AR_Emploi_Occupe" value="<?= $current_artist['AR_Emploi_Occupe'];?>"/>
					</div>
				</div>
			<div class="col col-md-12">&nbsp;  </div>
					<div class="col col-md-12">	
						<div class="col col-md-4 text-left"> 
							<label for "AR_Date_De_Naissance"> Date de Naissance </label>
							<input class="form-control" type="date" size="10" name="AR_Date_De_Naissance" id="AR_Date_De_Naissance" value="<?= $current_artist['AR_Date_De_Naissance'];?>"/>
						</div>
						<div class="col col-md-4 text-right"> 			
							<label for "AR_Lieu_De_Naissance"> Lieu de Naissance </label>
							<input class="form-control" type="text" name="AR_Lieu_De_Naissance" id="AR_Lieu_De_Naissance" value="<?= $current_artist['AR_Lieu_De_Naissance'];?>"/>
						</div>
						<div class="col col-md-4 text-right">
							<label for "AR_Nationalite"> Nationalité </label>
							<input class="form-control" type="text" size="2" name="AR_Nationalite" id="AR_Nationalite" value="FR" value="<?= $current_artist['AR_Nationalite'];?>" title="code sur 2 caractères en MAJUSCULES"/>
						</div>						
					</div>
			<div class="col col-md-12"> &nbsp; </div>		
					<div class="col col-md-12"> 
						<div class="col col-md-2 text-left">
							<label for "AR_Numero"> N° de la rue </label>
							<input class="form-control" type="text" size="4" name="AR_Numero" id="AR_Numero"  value="<?= $current_artist['AR_Numero'];?>"/>
						</div>
						<div class="col col-md-3 text-left">
							<label for "AR_Voie"> Voie </label>
							<input class="form-control" type="text" size="6" name="AR_Voie" id="AR_Voie"  value="<?= $current_artist['AR_Voie'];?>"/>
						</div>
						<div class="col col-md-3 text-left">
							<label for "AR_Batiment"> Bâtiment </label>
							<input class="form-control" type="text" size="3" name="AR_Batiment" id="AR_Batiment" value="<?= $current_artist['AR_Batiment'];?>"/>
						</div>
						<div class="col col-md-4 text-right">
							<label for "AR_Adresse_Ligne_1"> Adresse </label>
							<input class="form-control" type="text" name="AR_Adresse_Ligne_1" id="AR_Adresse_Ligne_1" value="<?= $current_artist['AR_Adresse_Ligne_1'];?>"/>
						</div>
					</div>
					<div class="col col-md-12"> 
						<div class="col col-md-3 text-right">
							<label for "AR_Code_Postal"> Code Postal </label>
							<input class="form-control" type="text" size="5" name="AR_Code_Postal" id="AR_Code_Postal" value="<?= $current_artist['AR_Code_Postal'];?>"/>
						</div>
						<div class="col col-md-3 text-right">
							<label for "AR_Ville"> Ville </label>
							<input class="form-control" type="text" name="AR_Ville" id="AR_Ville"  value="<?= $current_artist['AR_Ville'];?>"/>
						</div>
						<div class="col col-md-3 text-right">
							<label for "AR_Telephone_1"> Tél. mobile </label>
							<input class="form-control" type="text" size="10" name="AR_Telephone_1" id="AR_Telephone_1" value="<?= $current_artist['AR_Telephone_1'];?>" placeholder="0601020304"/>
						</div>
						<div class="col col-md-3 text-right">
							<label for "AR_Telephone_2"> Tél. fixe </label>
							<input class="form-control" type="text" size="12" name="AR_Telephone_2" id="AR_Telephone_2"  value="<?= $current_artist['AR_Telephone_2'];?>"/>
						</div>
					</div>		
				<div class="col col-md-12"> &nbsp; </div>					
					<div class="col col-md-12"> 	
						<div class="col col-md-4 text-right">
							<label for "AR_N_De_Securite_Sociale"> Numéro de Sécurité Sociale </label>
							<input class="form-control" type="text" size= "15" name="AR_N_De_Securite_Sociale" id="AR_N_De_Securite_Sociale"  value="<?=$current_artist['AR_N_De_Securite_Sociale'];?>"/>
						</div>
						<div class="col col-md-4 text-right">			
							<label for "AR_N_Du_Guso"> Numéro du GUSO </label>
							<input class="form-control" type="text" size= "9" name="AR_N_Du_Guso" id="AR_N_Du_Guso" value="<?= $current_artist['AR_N_Du_Guso'];?>"/>
						</div>
						<div class="col col-md-4 text-right">
							<label for "AR_Numero_Conges_Spectacle"> Numéro de Congés Spectacle </label>
							<input class="form-control" type="text" size= "8" name="AR_Numero_Conges_Spectacle" id="AR_Numero_Conges_Spectacle" value="<?= $current_artist['AR_Numero_Conges_Spectacle'];?>"/>
						</div>
					</div>
			<div class="col col-md-12"> &nbsp; </div>
					<div class="col col-md-12">
						<div class="col col-md-2 text-right">
							<label for "AR_ActiveYN"><i class="fa fa-user fa" aria-hidden="true"></i> Actif=1 </label>
							<input class="form-control" type="text" size="2"name="AR_ActiveYN" value="<?= $current_artist['AR_ActiveYN'];?>" id="AR_ActiveYN"/>
						</div>

						<div class="col col-md-6 text-right">
							<label for "AR_NewsLetterYN"><i class="fa fa-hand-peace-o fa-lg" aria-hidden="true"></i> Souscrire à la newsletter ? </label>
							<input type="checkbox" name="AR_NewsLetterYN" checked="<?= $current_artist['AR_NewsLetterYN'];?>" title ="cochée = oui">
						</div>
			<div class="col col-md-12"> &nbsp; </div>						
						<div class="col col-md-12 text-right">
							<button type="submit" class="btn btn-default"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i> Envoi </button>
						</div>
					</div>
			<div class="col col-md-12"> &nbsp; </div>
					
				<!-- </div> -->  <!-- fin de md-12 -->	
				</div>
				</form>			
					<?php
						if(!empty($formErrors)){
							echo '<p style="color:red">'.implode('<br>', $formErrors);
						}        if($formValid == true){
							echo '<p style="color:white; font-weight:bold,">Mise à jour OK</p>';
						}  	
					?>
				</div>
		</div>
	</div>

</section>
<!-- <div class="main-login main-center"> -->
<!-- ** Fin du formulaire de mise à jour d' ARTISTE ' ************************ -->	

<?php $this->stop('main_content') ?>
