<?php $this->layout('/solopageconnected_layout', ['title' => 'Actualités-évènements']) ?>

<?php $this->start('main_content') ?>


<article id="actuView">
	<h1 align="center">Liste complète des actualités sur les 3 prochains mois</h1>
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
	  		<button type="submit" id="ActuINS" name="ActuINS" value="ActuINS" class="btn btn-sm btn-info" title="Ajouter une nouvelle actualité"  style="width:100px;"> 

				<!-- <a href="< ?=$this->url('Actu_Add', ['AC_Id' => $reponse['AC_Id']]);?>">Ajouter</a> -->
				<a href="<?=$this->url('Actu_Add');?>">Ajouter</a>				

	  		<!-- < ?= '<a href="' .$this->url('ActuINS', ['AC_Id' => $reponse['AC_Id']]).'">Insérer</a>'; ?> -->

	  			<i class="glyphicon glyphicon-refresh"></i>
	  		</button>
	  	</td></tr>
	  	<!-- Ligne d' entête avant l' affichage des données -->
	  	<td>Action</td>
	  	<td>ID</td>
	  	<td>Visibilité</td>                
	  	<td>Lieu</td>
	  	<td>Date de l' évènement</td>
	  	<td>Commentaires (1 amp; 2)</td>
	  	<td>Puce</td>
	  	<td>Adresse</td>
	  	<td>Code Postal</td>

	  	<td>Notes</td>
	  	<td>Alive/Dead</td>

	  </thead>
	  <tbody>
	  <!-- Fin de l' entête. On affiche les données ci-dessous -->

	  	<?php 
	  	foreach($reponses as $reponse) {
	        $Evt = date ('d/m/Y', strtotime($reponse['AC_Date'])); // formattage de la date en français
	        ?>
		        <tr class="normal">
		        	<td align="center"> 
						<a href="<?=$this->url('Actu_Update', ['AC_Id' => $reponse['AC_Id']]);?>">Modifier</a>
						<a href="<?=$this->url('Actu_Update', ['AC_Id' => $reponse['AC_Id']]);?>">Supprimer</a>
	
	        		
		        	</td>
		        	<td><?= $reponse['AC_Id']?></td>
		        	<td><?= $reponse['AC_Visibilite']?></td>
		        	<td><strong><?= $reponse['AC_Lieu']?> </strong></td> 
		        	<td> <?= $Evt?> </td>
		        	<td><?= $reponse['AC_Com1'] . ' - ' .$reponse['AC_Com2'] ?> </td>
		        	<td> <?= $reponse['AC_Puce']?> </td>

		        	<td><?= $reponse['AC_Adresse']?> </td> 
		        	<td><?= $reponse['AC_Code_Postal']?> </td> 					


		        	<td><?= $reponse['AC_Notes']?> </td> 
		        	<td><?= $reponse['AC_ActiveYN']?> </td>
		        </tr>
		</tbody>    
		    <?php
        } // end foreach
	        } // endif résultat requête not empty    
	        ?>

	    </table>
	    </article>

<?php $this->stop('main_content') ?>
