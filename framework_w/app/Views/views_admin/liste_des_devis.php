<?php $this->layout('solopageconnectedmap_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-2">
					<a href="redirect_role" class="btn btn-block btn-primary"><i class="fa fa-home" aria-hidden="true"></i> Menu principal</a>
                    <a href="redirect_role" class="btn btn-block btn-default">préc.</a>
                    <a href="redirect_role" class="btn btn-block btn-default">suiv.</a>
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
     <form name="calculdudevis"> <!-- debut du formulaire -->
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
                <div class='col-sm-3'>
                    Exp : 
                </div><!-- fin de col -->
                <div class='col-sm-9'>
                    <div class="form-group">
                        <select class="form-control" name="operateurselect"  id="operateurselect">
                            <option disabled value=''></option>
                            <?php foreach ($tousLesOperateurs as $operateur): ?>
                                <option value='<?=$operateur['OP_Idoperateur'];?>'><?= $operateur['OP_Civilite'] . ' ' . $operateur['OP_Prenom'] . ' ' . $operateur['OP_Nom'];?></option>   
                            <?php endforeach ?>
                        </select>
                    </div>
                    <?= $ourShop['GI_Name'];?><br>
                    <?= $operateur['OP_Civilite'] . ' ' . $operateur['OP_Prenom'] . ' ' . $operateur['OP_Nom'];?><br>
                    <?= $operateur['OP_Adresse_Ligne_1'];?><br>
                    <?= $operateur['OP_Adresse_Ligne_2'];?><br>
                    <?= $operateur['OP_Code_Postal'] . ' ' . $operateur['OP_Ville'];?><br>
                </div><!-- fin de col -->
            </div> <!-- fin de col -->
            <div class='col-sm-3 text-center'>  
                Date de la demande : <?=date ('d/m/Y', strtotime($devis['DV_Date_De_Creation']));?>
                <br><br>
                <div class=form-group>
                    <label for="DV_Datedudevis">Date du devis</label>
                    <input type="text" class="form-control" name="DV_Datedudevis" id="DV_Datedudevis" placeholder="Date du devis">
                </div>
            </div> <!-- fin de col -->
            <div class='col-sm-3 text-center'>
                Id Devis : <?= $devis['DV_Iddevis'];?><br>
                ID Employeur : <?= $devis['CL_Idclient'];?>
            </div> <!-- fin de col -->
        </div>
        <hr>
        <div class='col-sm-5'>
            Donnees sur la prestation
        </div>
        <div class='col-sm-3'>
            Donnees sur les déplacements
            <div class="form-group">
                <label for="kilometrageallerretour">Kilometres (A/R)</label><br>
                <input class="text" name="kilometrageallerretour" id="kilometrageallerretour">
            </div>
            <div class="form-group">
                <label for="kilometrageallerretour">duree trajet mn</label><br>
                <input class="text" name="dureetrajetmn" id="dureetrajetmn">
            </div>
            <div class="form-group">
                <label for="kilometrageallerretour">duree trajet h</label><br>
                <input class="text" name="dureetrajeth" id="dureetrajeth">
            </div>
            <div class="form-group">
                <label for="kilometrageallerretour">cout des deplacements</label><br>
                <input disabled class="text" name="coutdeplacements" id="coutdeplacements">
            </div>
        </div>
        <div class="col-sm-4">
            <div id="mapG3" class="img-responsive"></div> 
        </div>
    </div>

</div>
</form> <!-- fin du formulaire -->

<?php endforeach; ?>
<?php else: ?>
   <div class="alert alert-danger">
    Aucun devis !
</div>
<?php endif; 
debug($tousLesDevis);
debug($ourShop);
debug($tousLesOperateurs);

?>
</div>
</div>
</section>
<?php $this->stop('main_content') ?>
<?php $this->start('js') ?>

<?php
/****AFFICHAGE DE LA CARTE ****/
$address=$devis['DV_CodePostalPrestation'].",".$devis['DV_Lieudelaprestation']; 
?>
<script type="text/javascript">
   /****AFFICHAGE DE LA CARTE ****/
   var myMarker;
   var search_addr;
   var map;
   var gdir;
   var geocoder = null;
   var addressMarker;
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
                map.addOverlay(myMarker);        
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
                    var allerretour = (Math.round(((kilometrage/1000)*2)*100)/100);
                    var cout = (Math.round((allerretour*0.30)*100)/100);
                    var annonce = "Kilometrage aller/retour : " + allerretour + " kms. ";
                    document.getElementById("kilometrageallerretour").value = allerretour;
                    document.getElementById("dureetrajetmn").value = dureemn;
                    document.getElementById("dureetrajeth").value = dureeh;
                    document.getElementById("coutdeplacements").value = cout;
                    
                }
                $(document).ready(function(){
                    jQuery(window).load(function(){
                        
            initialize();       
            setVerifFormulaire('royan',address,'fr');  
                    });
                    

                    /******  FIN DE L'OBTENTION ET DU TRAITEMENT DES DISTANCES ******/
}); // Fin du jQuery
</script>
<?php $this->stop('js') ?>


