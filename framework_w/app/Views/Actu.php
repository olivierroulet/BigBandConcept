<?php $this->layout('layout', ['title' => 'Actu évènements']) ?>

<?php $this->start('main_content') ?>


<article>
	<h1 align="center">Liste complète des actualités sur les 3 prochains mois</h1>
	<?php
// et maintenant on envoit la requête

	if(!empty($reponses)) {    ?>
	<table id="SelectActu" class="table table-condensed table-hover">
		<thead class="table-bordered headedW" style="font-family:Cuprum;">
			<tr><td> <button type="submit" name="insert" value="insert" class="btn btn-sm btn-default" title="Ajouter une nouvelle actualité">Insérer <i class="glyphicon glyphicon-refresh"></i>
			</button>
		</td></tr>
		<!-- Ligne d' entête avant l' affichage des données -->
		<td>Action</td>
		<td>ID</td>
		<td>Visibilité</td>                
		<td>Lieu</td>
		<td>CodeVisi</td>
		<td>Date de l' évènement</td>
		<td>Commentaires (1&and;2)</td>
		<td>Puce</td>
		<td>Adresse</td>
		<td>Code Postal</td>

		<td>Notes</td>

	</thead>
	<tbody>
		<?php 

		foreach($reponses as $reponse) {

		        $Evt = date ('d/m/Y', strtotime($reponse['AC_Date'])); // formattage de la date en français
		        ?>
		        <tr class="normal">
		        	<td align="center"> 
		        		<button type="submit" class="rond" title="Modifier l'évènement"><a href="MajAgenda.php">M</a></button>
		        		<button type="submit" class="rond2" title="Marquer l'évènement comme inactif"><a href="MajAgenda.php">S</a></button>
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
		        </tr>
		    </tbody>    
		    <?php
	                } // end foreach
	            } // endif résultat requête not empty    
	            ?>

	        </table>
	    </article>

<?php $this->stop('main_content') ?>
