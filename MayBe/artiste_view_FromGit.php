<?php $this->layout('solopageconnected_layout', ['title' => 'Artistes de Big Band']) ?>

<?php $this->start('main_content') ?>

<?php		if (isset($_SESSION['userrole'])) {
 if  ($_SESSION['userrole'] == '1' || strtoupper($_SESSION['userrole']) == 'ADMIN') {
  $OK= 'KO';
}
else{
  $OK= 'OK';
}	
}

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
    return preg_replace("/([0-9]{2})([0-9]{2})/", "$1-$2 $3 $4", $phone);
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

<article id="artistes">
  <section id="section-artistes" class="parallax-section">
   <div class="container">
    <div class="clients-wrapper">
     <div class="row text-center">
      <div class="col-sm-10 col-sm-offset-2">
       <h2 class="title-one">Entrée des Artistes</h2>
     </div>
     <div class="col-sm-1.5 pull-left">
      <a href="redirect_role" class="btn btn-primary">Menu principal</a>
    </div>
  </div>
</div>
</div>
<div class="row text-center">
  <div class="col-sm-12">
    <?php
// et maintenant on envoit la requête
	/*1- supposer que l' on est connecté en admin
	  2- si non, masquer les 3 boutons id=ActuINS, ActuUpd & ActuDel (ce dernier ne fait que mettre le flag )
	*/
/*	if (isset($_SESSION['userrole'])) {
		  if  ($_SESSION['userrole'] == '1' || strtoupper($_SESSION['userrole']) == 'ADMIN') {
		  	$OK= 'KO';
		  }
		  else{
		  	$OK= 'OK';
		  }	
   }*/


   if(!empty($reponses)) {    ?>
   <!-- SELECT `AR_Idartiste`, `AR_ID_InUsersTable`, `AR_Etiquette_Artiste`, `AR_Etiquette_Artiste_Inversee`, `AR_Emploi_Occupe`, `AR_Civilite`, `AR_Nom`, `AR_Prenom`, `AR_Pseudo`, `AR_Password`, `AR_Numero`, `AR_Batiment`, `AR_Voie`, `AR_Adresse_Ligne_1`, `AR_Adresse_Ligne_2`, `AR_Code_Postal`, `AR_Ville`, `AR_Telephone_1`, `AR_Telephone_2`, `AR_Adresse_Mail`, `AR_N_De_Securite_Sociale`, `AR_N_Du_Guso`, `AR_Numero_Conges_Spectacle`, `AR_Date_De_Naissance`, `AR_Anniversaire`, `AR_Lieu_De_Naissance`, `AR_Nationalite`, `AR_Etiquette_Dpae`, `AR_NewsLetterYN`, `AR_Etiquette_Feuille_De_Mandat`, `AR_Etiquette_Feuille_De_Presence`, `AR_Createur`, `AR_Date_De_Creation`, `AR_Modificateur`, `AR_Date_De_Modification` FROM `artistes`  -->

   <table id="ArtistesGrid" class="table table-condensed table-hover ">
    <thead class="table-bordered table-condensed" style="font-family:Cuprum; font-weight:bold;">
     <tr>
      <td>Action</td>
      <td>ID</td>
      <td>ID In UsersTable</td>
      <td>Civilite</td>
      <td>Prenom</td>
      <td>Nom</td>
      <td>Pseudo</td>
      <td class="row-address">Adresse Ligne 1</td>
      <td>Adresse Ligne 2</td>
      <td>Téléphone mobile</td>
      <td>Téléphone fixe</td>
      <td>Adresse Mail</td>
      <td>Etiquette Artiste</td>
      <td>Etiquette Artiste Inversee</td>
      <td>Emploi Occupe</td>
      <td>N° De Securite Sociale</td>
      <td>N° du Guso</td>
      <td>N° Conges Spectacle</td>
      <td>Date Naissance</td>
      <td>Anniversaire</td>
      <td>Lieu Naissance</td>
      <td>Nationalité</td>
      <td>Etiquette DPAE</td>
      <td>NewsLetter?</td>
      <td>Feuille De Mandat</td>
      <td>Feuille De Presence</td>
      <td>Créé par</td>
      <td>Date de Création</td>
      <td>Modifié par</td>
      <td>Date de Modif°</td>
    </tr>
  </thead>
  <tbody>
    <!-- Fin de l' entête. On affiche les données ci-dessous -->

    <?php 
    foreach($reponses as $reponse) {
      if (is_null($reponse)) {
       $reponse = "-";
     }
        $DateCre = date ('d/m/Y', strtotime($reponse['AR_Date_De_Creation'])); // formattage de la date en français
        $DateMaj = date ('d/m/Y', strtotime($reponse['AR_Date_De_Modification']));
        $DateNaiss = date ('d/m/Y', strtotime($reponse['AR_Date_De_Naissance']));
        $phone1 = format_phone('fr', $reponse['AR_Telephone_1']);
        // if (is_null($reponse['AR_Batiment'])) {
        // 	$batiment ='';
        // } 
        // else {
        // 	$batiment = $reponse['AR_Batiment'];
        // }	

        //}
        ?>
        <tr style="font-family:courier; font-size: 0.8em;">
        	<td> 
           <a href="<?=$this->url('upd_artistes', ['AR_Idartiste' => $reponse['AR_Idartiste']]);?>">  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
         </td>
         <td><?= $reponse['AR_Idartiste']?></td>
         <td><?= $reponse['AR_ID_InUsersTable']?></td>		        	

         <td><?= $reponse['AR_Civilite']?> </td> 
         <td><?= $reponse['AR_Prenom']?> </td> 
         <td><?= strtoupper($reponse['AR_Nom'])?> </td> 					
         <td><?= $reponse['AR_Pseudo']?> </td>
         <!-- 	</tr><tr> -->

         <td><?= $reponse['AR_Numero'] . ', ' . $reponse['AR_Batiment'] .' ' . $reponse['AR_Voie']. ' ' . $reponse['AR_Adresse_Ligne_1']?> </td>
         <td><?= ' '. $reponse['AR_Adresse_Ligne_2'] .' [' . $reponse['AR_Code_Postal']. '] ' . $reponse['AR_Ville']?> </td>
         <td><?= $phone1 ?> </td>
         <td><?= $reponse['AR_Telephone_2']?> </td>
         <td><?= $reponse['AR_Adresse_Mail']?> </td>
         <td><?= $reponse['AR_Etiquette_Artiste']?></td> 
         <td><?= $reponse['AR_Etiquette_Artiste'] . ' - ' .$reponse['AR_Etiquette_Artiste_Inversee'] ?> </td>
         <td><?= $reponse['AR_Emploi_Occupe']?> </td>        	
         <td><?= $reponse['AR_N_De_Securite_Sociale']?> </td>
         <td><?= $reponse['AR_N_Du_Guso']?> </td>
         <td><?= $reponse['AR_Numero_Conges_Spectacle']?> </td>
         <td><?= $DateNaiss ?> </td>
         <td><?= $reponse['AR_Anniversaire']?> </td>
         <td><?= $reponse['AR_Lieu_De_Naissance']?> </td>
         <td><?= $reponse['AR_Nationalite']?> </td>
         <td><?= $reponse['AR_Etiquette_Dpae']?> </td>
         <td><?= $reponse['AR_NewsLetterYN']?> </td>
         <td><?= $reponse['AR_Etiquette_Feuille_De_Mandat']?> </td>
         <td><?= $reponse['AR_Etiquette_Feuille_De_Presence']?> </td>
         <td><?= $reponse['AR_Createur']?> </td>
         <td> <?= $DateCre?> </td>
         <td><?= $reponse['AR_Modificateur']?> </td>
         <td><?= $DateMaj?> </td>
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
<!-- 		</div>
</div> -->

</section>
</article>
<?php $this->stop('main_content') ?>
