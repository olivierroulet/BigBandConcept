<?php $this->layout('solopageconnected_layout', ['title' => 'Artistes de Big Band']) ?>


<?php $this->start('main_content') ?>

<?php		if (isset($_SESSION['userrole'])) {
			  if  ($_SESSION['userrole'] == '1' || $_SESSION['userrole'] == '3') {
          // Admin ou Artiste
			  	$OK= 'KO';
			  }
			  else{
			  	$OK= 'OK';
			  }	
			}
// debug ($_SESSION);
//************************ DEBUT DE FUNCTION FORMATAGE des N° de téléphone

function format_phone($country, $phone) {
 $function = 'format_phone_' . $country ; 
  if(function_exists($function)) {
    return $function($phone);
  }
  return $phone;
}
 
function format_phone_fr($phone) {
  // note: making sure we have something
  if(!isset($phone{3})) { return ''; }
  // note: strip out everything but numbers 
  $phone = preg_replace("/[^0-9]/", "", $phone);
  $length = strlen($phone);
  switch($length) {
  case 10:
    return preg_replace("/([0-9]{2})([0-9]{2})/", "$1 $2 $3 $4", $phone);
  break;
  case 12:
   return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
  break;
  case 11:
  return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
  break;
  default:
    return $phone;
  break;
  }
}
// Appel de la fonction format_phone_fr : $phone = format_phone('fr', $phone);
//************************ FIN DE FUNCTION FORMATAGE des N° de téléphone

?>



<section id="section-artistes" class="parallax-section">
 	<div class="container-fluid">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col col-md-12">
				    <h2 class="title-one">Entrée des Artistes</h2>
				</div>
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




	<?php
// et maintenant on envoit la requête
	/*1- supposer que l' on est connecté en admin
	  2- si non, masquer les 3 boutons id=ActuINS, ActuUpd & ActuDel (ce dernier ne fait que mettre le flag )
	*/

	  if(!empty($reponses)) {    ?>

 <div class="table-responsive">
  <table id="ArtistesGrid" class="table table-hover table-responsive">
    <thead class="table-bordered">
     <tr>
      <th colspan="2">Actions</th><th>Actif?</th><th>Civilite</th><th>Prenom</th><th>Nom</th><th>Pseudo</th><th>Numéro</th><th>Voie</th><th>Bât.</th><th>Adresse Ligne 1</th><th>Adresse Ligne 2</th><th>Code Postal</th><th>Ville</th><th>Téléphone mobile</th><th>Téléphone fixe</th><th>Adresse Mail</th><th>Emploi Occupe</th><th>N° de Sécurité Sociale</th><th>N° du Guso</th><th>N° Conges Spectacle</th><th>Date Naissance</th><th>Lieu Naissance</th><th>Nationalité</th><th>NewsLetter?</th><th>ID</th><th>ID In UsersTable</th>
    </tr>
  </thead>
  <tbody>
    <!-- Fin de l' entête. On affiche les données ci-dessous -->

    <?php 
    foreach($reponses as $reponse) {
      $DateNaiss = date ('d/m/Y', strtotime($reponse['AR_Date_De_Naissance']));
      $phone1 = format_phone('fr', $reponse['AR_Telephone_1']);
      $actifYN = preg_replace("/[^0][^1]/", "Inactif","Actif", $reponse['AR_ActiveYN']);
      ?>
      <tr style="font-size: 0.8em;">  <!-- style="font-family:courier; font-size: 0.8em;" -->
       <td> 
         <a href="<?=$this->url('upd_artistes', ['AR_Idartiste' => $reponse['AR_Idartiste']]);?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
       </td>
       <td>
        <a href="<?=$this->url('deact_artistes', ['AR_Idartiste' => $reponse['AR_Idartiste']]);?>"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
      </td>

      <td><?= $reponse['AR_ActiveYN'] . ' ' . $actifYN ?></td> 
      <td><?= $reponse['AR_Civilite']?> </td> 
      <td><?= $reponse['AR_Prenom']?> </td> 
      <td><?= strtoupper($reponse['AR_Nom'])?> </td> 					
      <td><?= $reponse['AR_Pseudo']?> </td>

      <td><?= $reponse['AR_Numero']?></td>
      <td> <?= $reponse['AR_Voie']?></td>
      <td> <?=$reponse['AR_Batiment'] ?></td>
      <td> <?= $reponse['AR_Adresse_Ligne_1']?></td>
      <td><?= $reponse['AR_Adresse_Ligne_2'] ?></td>
      <td> <?= $reponse['AR_Code_Postal']?></td>
      <td> <?= $reponse['AR_Ville']?> </td>
      <td><?= $phone1 ?> </td>
      <td><?= $reponse['AR_Telephone_2']?> </td>
      <td><?= $reponse['AR_Adresse_Mail']?> </td>

      <td><?= $reponse['AR_Emploi_Occupe']?> </td>        	
      <td><?= $reponse['AR_N_De_Securite_Sociale']?> </td>
      <td><?= $reponse['AR_N_Du_Guso']?> </td>
      <td><?= $reponse['AR_Numero_Conges_Spectacle']?> </td>
      <td><?= $DateNaiss ?> </td>
      <td><?= $reponse['AR_Lieu_De_Naissance']?> </td>
      <td><?= $reponse['AR_Nationalite']?> </td>
      <td><?= $reponse['AR_NewsLetterYN']?> </td>

      <td><?= $reponse['AR_Idartiste']?></td>
      <td><?= $reponse['AR_ID_InUsersTable']?></td>        
    </tr>
  </tbody>    
  <?php
        } // end foreach
	        } // endif résultat requête not empty    
	        ?>

       </table>
  </div> 
</div>

    <div class="row" style="padding-top:100px;">
        <div class="col col-sm-12" id="go-top">
            <p align="center" style="font-size:3em;">
                <a class="smoothscroll" title="Haut de page" href="#section-artistes">
                    <span class="glyphicon glyphicon-upload" align="center" style="color:rgba(3, 3, 3, 0.5);" aria-hidden="true"></span>
                </a>
            </p>
        </div>
        <hr>

    </div>  

</section>

<?php $this->stop('main_content') ?>
