<?php $this->layout('/solopageconnected_layout', ['title' => 'Actualités-évènements']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section" id="actuView">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Liste complète des actualités sur les 3 prochains mois</h2>
				</div>
			</div>
			<div class="row">

	<?php
// et maintenant on envoit la requête
	/*1- supposer que l' on est connecté en admin
	  2- si non, masquer les 3 boutons id=ActuINS, ActuUpd & ActuDel (ce dernier ne fait que mettre le flag )
	*/
// var_dump($_SESSION);
	if (isset($_SESSION['userrole'])) {
		  if  ($_SESSION['userrole'] == '1' || strtoupper($_SESSION['userrole']) == 'ADMIN') {
		  	$OK= 'KO';
		  }
		  else{
		  	$OK= 'OK';
		  }	
	}

	  if(!empty($reponses)) {    ?>
	  	<table id="ActuGrid" class="table table-condensed table-hover">
	  		<thead class="table-bordered headedW" style="font-family:Cuprum; font-weight:bold;">
	  		<tr><td> 
	  		<button type="submit" id="ActuINS" name="ActuINS" value="ActuINS" class="btn btn-sm btn-info" title="Ajouter un nouvel évènement"> 
				<!-- <a href="< ?=$this->url('Actu_Add', ['AC_Id' => $reponse['AC_Id']]);?>">Ajouter</a> -->
					<a href="<?=$this->url('Actu_Add');?>"><i class="fa fa-window-restore" aria-hidden="true"></i>Ajouter</a>				

		  		<!-- < ?= '<a href="' .$this->url('ActuINS', ['AC_Id' => $reponse['AC_Id']]).'">Insérer</a>'; ?> -->

		  			<i class="glyphicon glyphicon-refresh"></i>
		  		</button>
		  	</td></tr>
		  	<!-- Ligne d' entête avant l' affichage des données -->
		  	<td>Modif° Désactiv°</td>
		  	<td>ID</td>
		<!-- 	  	<td>Visibilité</td> -->                
		  	<td>Lieu</td>
		  	<td>Date de l' évènement</td>
		  	<td>Description sommaire</td>
		  	<td>Description détaillée</td>
		  	<td>Puce</td>
		  	<td>Adresse</td>
		  	<td>Code Postal</td>
		  	<td>Notes</td>
		  	<td>Pub/Restreint/Brouillon</td>

	  		</thead>
	  <tbody>
	  <!-- Fin de l' entête. On affiche les données ci-dessous -->

	  	<?php 
	  	foreach($reponses as $reponse) {
	        $Evt = date ('d/m/Y', strtotime($reponse['AC_Date'])); // formattage de la date en français
	        ?>
		        <tr class="normal">
		        	<td> 
					<a href="<?=$this->url('Actu_Update', ['AC_Id' => $reponse['AC_Id']]);?>"> <i class="fa fa-pencil-square-o" aria-hidden="true" title="modifier"></i></a>

					<a href="<?=$this->url('Actu_Update', ['AC_Id' => $reponse['AC_Id']]);?>">  <i class="fa fa-times" aria-hidden="true" title="supprimer"></i></a>
		        	</td>
		        	<td><?= $reponse['AC_Id']?></td>
<!-- 		        	<td>< ?= $reponse['AC_Visibilite']?></td> -->
		        	<td><strong><?= $reponse['AC_Lieu']?> </strong></td> 
		        	<td><?= $Evt?> </td>
		        	<td><?= $reponse['AC_Com1'] ?></td>
		        	<td><?=$reponse['AC_Com2'] ?></td>
		        	<td> <?= $reponse['AC_Puce']?></td>

		        	<td><?= $reponse['AC_Adresse']?> </td> 
		        	<td><?= $reponse['AC_Code_Postal']?> </td> 					


		        	<td><?= $reponse['AC_Notes']?> </td> 
		        	<td><?= $reponse['AC_Visibilite']?> </td>
		        </tr>
		</tbody>    
		    <?php
        } // end foreach
	        } // endif résultat requête not empty    
	        ?>

	    	</table>
		</div>
		</div>
	</div>
</section>
<?php $this->stop('main_content'); ?>
