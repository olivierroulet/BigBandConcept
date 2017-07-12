<?php $this->layout('solopageconnectedmap_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-2">
                    <?php 
                    if (!isset($enr)){
                        $enr=0;
                    }
                    if ($enr<$nbDeDevis-1){
                        $suivant=$enr+1;
                    } else {
                        $suivant=$enr;
                    }
                    if ($suivant>$nbDeDevis){
                        $suivant=$nbDeDevis;
                    }
                    if ($enr>0){
                        $precedent=$enr-1;
                    } else {
                        $precedent=0;
                        $suivant=1;
                    }
                    $fiche = $enr+1;

                    ?>

                    <a href="redirect_role" class="btn btn-block btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Menu principal</a>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <a href="<?=$this->url('devisprecedent',['enr' => $precedent]);?>" class="btn btn-block btn-default">préc.</a>
                        </div>
                        <div class='col-sm-6'>
                            <a href="<?=$this->url('devissuivant',['enr' => $suivant]);?>" class="btn btn-block btn-default">suiv.</a>
                        </div>
                    </div> fiche n° <?=$fiche;?> / <?=$nbDeDevis;?>
                </div>
                <div class="col-sm-2">
                    <a href="redirect_role" class="btn btn-block btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Nouveau devis</a>
                    <a href="redirect_role" class="btn btn-block btn-default"><i class="fa fa-address-card-o" aria-hidden="true"></i> Fiche employeur</a>
                </div>
                <div class="col-sm-6">
                 <h2 class="title-one">Devis</h2>
             </div>
             <div class="col-sm-2">
                <a href="redirect_role" class="btn btn-block btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Recherche</a>
                <a href="redirect_role" class="btn btn-block btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer le devis</a>
            </div>
        </div> <!-- fin de row -->
        <div class="row text-center">

        </div>

    </div>
    <div class="row">
     <form name="calculdudevis" method="POST" action="updater_le_devis"> <!-- debut du formulaire -->
         <hr>
         <?php

         if(!empty($tousLesDevis)):?>

         <?php foreach ($tousLesDevis as $devis): 

         ?>          
         <div class='row text-left'>
            <div class='col-sm-3'>

                <div class='col-sm-9 text-center'>
                    Destinataire :<br>
                    <?= $devis['CL_Raison_Sociale']?><br>
                    <?= $devis['US_FirstName'] . ' ' . $devis['US_LastName'];?><br>
                    <?= $devis['CL_Code_Postal'] . ' ' . $devis['CL_Ville'];?><br>
                </div><!-- fin de col -->
            </div> <!-- fin de col -->
            <div class='col-sm-3'>

                <div class='col-sm-9 text-center'>
                    <label for="DE_Id_Operateur">Expéditeur</label> 
                    <div class="form-group">
                        <select class="form-control upd" name="DE_Id_Operateur"  id="DE_Id_Operateur">
                            <option disabled value=''></option>
                            <?php foreach ($tousLesOperateurs as $operateur): ?>
                                <option value='<?=$operateur['OP_Idoperateur'];?>'<?php if($devis['DE_Id_Operateur']==$operateur['OP_Idoperateur']){echo 'selected';}?>><?= $operateur['OP_Civilite'] . ' ' . $operateur['OP_Prenom'] . ' ' . $operateur['OP_Nom'];?></option>   
                            <?php endforeach ?>
                        </select>

                    </div>

                    <?= $ourShop['GI_Name'];?><br>
                    <?= $tousLesOperateurs[$devis['DE_Id_Operateur']-1]['OP_Civilite'] . ' ' . $tousLesOperateurs[$devis['DE_Id_Operateur']-1]['OP_Prenom'] . ' ' . $tousLesOperateurs[$devis['DE_Id_Operateur']-1]['OP_Nom'];?><br>
                    <?= $tousLesOperateurs[$devis['DE_Id_Operateur']-1]['OP_Adresse_Ligne_1'];?><br>
                    <?= $tousLesOperateurs[$devis['DE_Id_Operateur']-1]['OP_Adresse_Ligne_2'];?><br>
                    <?= $tousLesOperateurs[$devis['DE_Id_Operateur']-1]['OP_Code_Postal'] . ' ' . $tousLesOperateurs[$devis['DE_Id_Operateur']-1]['OP_Ville'];?><br>
                </div><!-- fin de col -->
            </div> <!-- fin de col -->
            <div class='col-sm-3 text-center'>  
                <div class=form-group>
                    <label for="DV_Datedudevis">Date du devis</label>
                    <?php // on travaille sur la date pour l'afficher au format francais
                    $datedudevis_fr = date('d/m/Y', strtotime(str_replace('/', '-', $devis['DV_Datedudevis'])));
                    ?>
                    <input type="text" class="form-control upd" name="DV_Datedudevis" id="DV_Datedudevis" value=<?=$datedudevis_fr;?> placeholder="01/01/2000">
                </div><br>
                Date de la demande : <?=date ('d/m/Y', strtotime($devis['DV_Date_De_Creation']));?>
                <br><br>
                <h4>Date de la prestation : <?=date ('d/m/Y', strtotime($devis['DV_Datedelaprestation']));?></h4>
            </div> <!-- fin de col -->
            <div class='col-sm-3 text-center'>
                <label for="DV_Iddevis">Id Devis : </label> <input name="DV_Iddevis" id="DV_Iddevis" type="text" size="3" class="form-control-2" value="<?= $devis['DV_Iddevis'];?>"><br>
                Id Employeur : <?= $devis['CL_Idclient'];?>
                <input name="DE_Iddetaildudevis" id="DE_Iddetaildudevis" type="text" hidden value="<?= $devis['DE_Iddetaildudevis'];?>">
            </div> <!-- fin de col -->
        </div>
        <hr>
        <div class='col-sm-4 text-center'>
            Donnees sur la prestation
            <div class="form-group">
                <select class="form-control upd" name="DE_Formule"  id="DE_Formule">
                    <option value=''>Indiquez le type de prestation retenue</option>
                    <option value='Musique de rue' <?php if ($devis['DE_Formule']=='Musique de rue'){echo 'selected';}?>>Musique de rue</option>  
                    <option value='Soirée privée' <?php if ($devis['DE_Formule']=='Soirée privée'){echo 'selected';}?>>Soirée privée</option> 
                    <option value='Concert' <?php if ($devis['DE_Formule']=='Concert'){echo 'selected';}?>>Concert</option>  
                </select>
            </div>
            <br>
            Coût Humain :<br><br>
            <?=str_replace ( '\n', '<br>', $devis['DE_Voicilacomposition']);?>


        </div>
        <div class='col-sm-4 text-center'>
            Donnees sur les déplacements
            <div class='row'>
                <div class='col-sm-6'>
                    <div class="form-group">
                        <label for="DV_CodePostalPrestation">Code postal</label>
                        <input class="form-control upd" size="3" type="text" name="DV_CodePostalPrestation" id="DV_CodePostalPrestation" value=<?= $devis['DV_CodePostalPrestation'];?>>
                    </div>
                </div>
                <div class='col-sm-6'>
                    <div class="form-group">
                        <label for="DV_Lieudelaprestation">Ville</label>
                        <input class="form-control upd" size="3" type="text" name="DV_Lieudelaprestation" id="DV_Lieudelaprestation" value=<?= $devis['DV_Lieudelaprestation'];?>>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class="form-group">
                    <input class="form-control-2" size="3" type="text" disabled name="kilometrageallerretour" id="kilometrageallerretour">kms

                    <br>duree d'un trajet : <input type="text" disabled class="form-control-2" name="dureetrajeth" id="dureetrajeth">

                    <br>Coûts des déplacements</label><br>
                    <input class="form-control-2" type="text" size="3" name="coutdeplacements" id="coutdeplacements">€
                    <br>
                    <input hidden class="form-control-2 upd"  type="text" name="DV_Prixtotal" id="DV_Prixtotal" value=<?= $devis['DV_Prixtotal'];?>>
                    <h4>Prix total : <?= $devis['DV_Prixtotal'];?></h4>

                </div>
                <?php 
                if ($nbDeDevis==1){
                    ?>
                    <button class="btn btn-block btn-success" type="submit">Valider</button>
                    <?php 
                } 
                else {
                    ?>
                    <a class="btn btn-block btn-warning" href="<?=$this->url('afficherundevis', ['DV_Iddevis' => $devis['DV_Iddevis']]);?>">Travailler sur ce devis</a>
                    <?php
                }

                ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div id="mapG3" class="img-responsive"></div> 
        </div>
    </div>

</div>

</form> 

<!-- fin du formulaire -->

<?php endforeach; ?>
<?php else: ?>
   <div class="alert alert-danger">
    Aucun devis !
</div>
// <?php endif; 
?>
</div>
</div>
</section>
<?php $this->stop('main_content') ?>
<?php $this->start('js') ?>

<?php
/****AFFICHAGE DE LA CARTE ****/
$address=$devis['DV_CodePostalPrestation'].",".$devis['DV_Lieudelaprestation'];
$addressdepart=$ourShop['GI_Addr_ZipCode'].",".$ourShop['GI_Addr_City'];
?>
<script type="text/javascript">
   /****AFFICHAGE DE LA CARTE ****/
   var initialadevis = '<?php echo $devis['DV_CodePostalPrestation']; ?>';
   var initialbdevis = '<?php echo $devis['DV_Lieudelaprestation']; ?>';
   var myMarker;
   var search_addr;
   var map;
   var gdir;
   var geocoder = null;
   var addressMarker;
   var addressdepart = '<?php echo $addressdepart; ?>';
   function coordonneesGPS(){      
    address = '<?php echo $address ?>';
    geocoder = new GClientGeocoder();
    z = 7;
    geocoder.getLatLng(
        address,
        function(point) {                               
            if (!point) {
                alert("- "+address+" n'existe pas");
            }
            else {                                  
                var a =  point.lat();                        
                var b =  point.lng();
                searchCoord(address,a,b,z);                             
            }});                    
}  
function searchCoord(address,a,b,z){

    map = new GMap2(document.getElementById('mapG3'));


    map.setCenter(new GLatLng(a,b), z);                             
    if(address!=''){
        var geocoder = new GClientGeocoder();
        geocoder.getLatLng(address, function(point){ map.setCenter(point,z); });
    }
                myMarker = createMarker(new GLatLng(a,b)); // Ajout du marqueur
                //map.addOverlay(myMarker);        
            }   

            function createMarker(point){
                var marker = new GMarker(point);
                GEvent.addListener(marker, "click", function(latlng) {
                    var lat = latlng.lat();
                    var lng = latlng.lng();
                    var  DegMinSec = convert_DMS(lat,lng);
                    
                });
                return marker;
            }         
            coordonneesGPS();

            /****FIN DE TRAITEMENT DE L'AFFICHAGE DE LA CARTE ****/
        </script>

        <script>
            /**** CALCUL DES DISTANCES ****/

            var map;
            var gdir;
            var geocoder = null;
            var addressMarker;

            function initialize()
            {
                if (GBrowserIsCompatible())
                {      
                    gdir = new GDirections(map, document.getElementById("directions"));
                    GEvent.addListener(gdir, "load", onGDirectionsLoad); <!-- Charge la partie pour les distances -->
                    GEvent.addListener(gdir, "error", handleErrors); <!-- Charge la partie pour les messages d erreurs -->
                }
            }

            function setVerifFormulaire(from, villemanifestation, codepostalmanifestation, locale)
            {   

                if(document.calculdudevis.coutdeplacements.value == "") 
                {

                    var cp=codepostalmanifestation;
                    destin="";
                    to=villemanifestation;
                    destin=String(to + " " +cp); 
                    setDirections(from, destin, locale);return false;}
                }
                function setDirections(fromAddress, toAddress, locale)
                {
                    gdir.load("from: " + fromAddress + " to: " + toAddress, { "locale": locale });
                }
                function handleErrors()
                {
                    if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
                        alert("Aucune location géographique correspondante n'a pu être trouvée pour l'une des adresses spécifiées.\n\nVERIFIEZ VOTRE SAISIE\nOU SAISISSEZ UNE LOCALITE PROCHE OU CHEF LIEU DE CANTON !");
                    else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
                        alert("La demande d'itinéraire n'a pu être calculée avec succès, aucune raison de l'échec n'est connu.");
                    else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
                        alert("The HTTP q parameter was either missing or had no value. For geocoder requests, this means that an empty address was specified as input. For directions requests, this means that no query was specified in the input.\n Error code: " + gdir.getStatus().code);
                    else if (gdir.getStatus().code == G_GEO_BAD_KEY)
                        alert("La clé (Key) n'est pas valide ou ne correspond pas au nom de domaine. \n Error code: " + gdir.getStatus().code);
                    else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
                        alert("La demande d'itinéraire n'a pu être correctement parsé.\n Error code: " + gdir.getStatus().code);
                    else alert("Une erreur inconnue est survenue.");
                }
                function onGDirectionsLoad()
                {
                    var reg=new RegExp("&nbsp;", "g");
                    kilometrage = gdir.getDistance().meters;
                    var dureemn = (gdir.getDuration().seconds / 60).toFixed(0);
                    var dureeh = gdir.getDuration().html;
                    var allerretour = Math.round((((kilometrage/1000)*2)*100)/100);
                    var cout = (Math.round((allerretour*0.30)*100)/100);
                    var annonce = "Kilometrage aller/retour : " + allerretour + " kms. ";
                    document.getElementById("kilometrageallerretour").value = allerretour;
                    // document.getElementById("dureetrajetmn").value = dureemn;
                    document.getElementById("dureetrajeth").value = dureeh;
                    document.getElementById("coutdeplacements").value = cout;
                    
                }
                $(document).ready(function(){
                    jQuery(window).load(function(){
                        //if ((initialadevis!-'')||(initialadevis!='')) {
                            initialize();
                            setVerifFormulaire(addressdepart,address,'fr');  
                        //}
                    });
                    

                    /******  FIN DE L'OBTENTION ET DU TRAITEMENT DES DISTANCES ******/
}); // Fin du jQuery
</script>
<?php $this->stop('js') ?>


