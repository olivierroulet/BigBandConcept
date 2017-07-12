<?php $this->layout('/solopageconnected_layout', ['title' => 'Actualités-évènements']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section" id="actuView">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Actualités sur les 3 prochains mois</h2>
				</div>
			</div>


			<div class="clients-wrapper">
				<div class="row text-center">
					<div class="col-md-12">
					<div class="col-md-8">&nbsp;</div>
						<div class="col-md-2">
							<a href="redirect_role" class="btn btn-block btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Menu principal</a>
						</div>
						<div class="col-sm-2">
							<a href="<?=$this->url('Actu_Add');?>" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-refresh"></i><i class="fa fa-window-restore" aria-hidden="true"></i> Ajouter un évènement</a>
							
							<!-- < ?= '<a href="' .$this->url('ActuINS', ['AC_Id' => $reponse['AC_Id']]).'">Insérer</a>'; ?> -->
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

	  		<thead class="table-bordered" style="font-family:Cuprum; font-weight:bold;">
			  	<!-- Ligne d' entête avant l' affichage des données -->
		  	<th>Modif° Désactiv°</th>
		  	<th>ID</th>
		  	<th>Lieu</th>
		  	<th>Date de l' évènement</th>
		  	<th>Description sommaire</th>
		  	<th>Description détaillée</th>
		  	<th>Puce</th>
		  	<th>Adresse</th>
		  	<th>Code Postal</th>
		  	<th>Notes</th>
		  	<th>Pub/Restreint/Brouillon</th>

	  		</thead>
	  <tbody>

	  <!-- Fin de l' entête. On affiche les données ci-dessous -->

	  	<?php 
	  	foreach($reponses as $reponse) {
	        $Evt = date ('d/m/Y', strtotime($reponse['AC_Date'])); // formattage de la date en français
	        $EvtFin = date ('d/m/Y', strtotime($reponse['AC_DateFin'])); // formattage de la date en français
	        ?>
		        <tr class="normal">
		        	<td> 
					<a href="<?=$this->url('Actu_Update', ['AC_Id' => $reponse['AC_Id']]);?>"> <i style="color:black;" class="fa fa-pencil-square-o fa-2x" aria-hidden="true" title="modifier"></i></a>

					<a href="<?=$this->url('Actu_Display', ['AC_Id' => $reponse['AC_Id']]);?>">  <i style="color:cherryred;" class="fa fa-times fa-2x" aria-hidden="true" title="désactiver cet évènement. Pas de suppression physique"></i></a>
		        	</td>
		        	<td><?= $reponse['AC_Id']?></td>
		        	<td><strong><?= $reponse['AC_Lieu']?> </strong></td> 
		        	<td><?= $Evt?> </td>
		        	<td><?= $EvtFin?> </td>
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

    <div class="row" style="padding-top:100px;">
        <div class="col col-sm-12" id="go-top">
            <p align="center" style="font-size:3em;">
                <a class="smoothscroll" title="Haut de page" href="#actuView">
                    <span class="glyphicon glyphicon-upload" align="center" style="color:rgba(3, 3, 3, 0.5);" aria-hidden="true"></span>
                </a>
            </p>
        </div>
        <hr>

    </div>	
</section>
<?php $this->stop('main_content'); ?>
