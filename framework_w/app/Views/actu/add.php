<?php $this->layout('public_layout', ['title' => 'Actualités-évènements']) ?>

<?php $this->start('main_content') ?>


<article id="actuAdd">
<!-- 	<h1  class="text-center">Ajout d' un évènement</h1> -->
<!-- formulaire single-entry -->
<!-- 
                	// 'AC_Id' => $reponse['AC_Id'],
                 //    'AC_Date' => $reponse['AC_Date'],
                 //    'AC_Com1' => $reponse['AC_Com1'],
                 //    'AC_Com2' => $reponse['AC_Com2'],
                 //    'AC_Num' => $reponse['AC_Num'],
                 //    'AC_Puce' => $reponse['AC_Puce'],
                 //    'AC_Notes' => $reponse['AC_Notes'],
                 //    'AC_Adresse' => $reponse['AC_Adresse'],
                 //    'AC_Code_Postal' => $reponse['AC_Code_Postal'],
                 //    'AC_Lieu' => $reponse['AC_Lieu'],
                 //    'AC_Visibilite' => $reponse['AC_Visibilite'],        -->

<div class="container-fluid">
	<div class="row main text-center">
		<div class="main-login">

		<h2 class="text-center"><i class="fa fa-file-o fa-md" aria-hidden="true"></i> Ajout d'un évènement</h2>
		<hr>

			<div class="col col-md-12 mobiform">						
					<!-- 					<div class="padd20"><br><i class="glyphicon glyphicon-triangle-left"></i></div> -->
				<form class="form form-horizontal" method="post">
					<div class="col col-md-12">
						<label for "AC_Date"><i class="fa fa-user fa" aria-hidden="true"></i>Date de l' évènement</label>
						<input type="text" name="AC_Date" id="AC_Date"/>
						<label for "AC_Com1"><i class="fa fa-user fa" aria-hidden="true"></i>Commentaire sommaire (50 caractères max)</label>
						<input type="text" name="AC_Com1" id="AC_Com1"/>
					</div>
					<div class="col col-md-12">	
						<label for "AC_Com2"><i class="fa fa-envelope-o fa" aria-hidden="true"></i>Commentaire détaillé (500 caractères max)</label>
						<input type="text" name="AC_Com2" id="AC_Com2"/>
					</div>
						<div class="col col-md-12">
							<label for "AC_Num"><i class="fa fa-lock fa-lg" aria-hidden="true"></i>Référence unique de l' évènement</label>
							<input type="text" name="AC_Num" id="AC_Num"/>
							<label for "AC_Puce"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i> Confirmer le mot de passe</label>
							<input type="text" name="AC_Puce" id="AC_Puce"/>

						<div class="col col-md-12">	
							<label for "AC_Notes"><i class="fa fa-envelope-o fa" aria-hidden="true"></i>Note (non publiée, même si public)</label>
							<input type="text" name="AC_Notes" id="AC_Notes"/>
						</div>
						<div class="col col-md-12">	
							<label for "AC_Adresse"><i class="fa fa-envelope-o fa" aria-hidden="true"></i>Adresse détaillée du lieu de l' évènement</label>
							<input type="text" name="AC_Adresse" id="AC_Adresse"/>
						</div>
						<div class="col col-md-12">	
							<label for "AC_Code_Postal"><i class="fa fa-envelope-o fa" aria-hidden="true"></i>Code postal</label>
							<input type="text" name="AC_Code_Postal" id="AC_Code_Postal"/>
						</div>
						<div class="col col-md-12">	
							<label for "AC_Lieu"><i class="fa fa-envelope-o fa" aria-hidden="true"></i>Lieu générique (ex Stade de France ;-)</label>
							<input type="text" name="AC_Lieu" id="AC_Lieu"/>
						</div>																					

						<label for "AC_Visibilite"><i class="fa fa-users fa-lg" aria-hidden="true"></i>Visibilité</label>
						<select name="AC_Visibilite">
							<option value="Public">Public</option>
							<option value="Privé">Privé</option>
							<option value="Brouillon">Brouillon</option>
						</select>    
						</div>                    
					</div>

					<div class="padd20"></div>

					<div class="col col-md-12" align="right">
						<button type="submit" class="btn btn-default"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i> Envoi</button>
					</div>

				</div>

			</form>				
		</div>
	</div>
</div>
</div>		<!-- <div class="main-login main-center"> -->

</article>

<?php $this->stop('main_content') ?>
