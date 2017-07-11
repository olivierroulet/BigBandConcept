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
     <form> <!-- debut du formulaire -->
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
                <label for="DV_Datedudevis">Date du devis</label>
                <input type="text" class="form-control" name="DV_Datedudevis" id="DV_Datedudevis" placeholder="Date du devis">
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
        <div class='col-sm-3 col-sm-offset-5'>
            Donnees sur les déplacements
            <div class="form-group">
                <input class="text" name="kilometrageallerretour" id="kilometrageallerretour"></div>
                <input class="text" name="dureetrajetmn" id="dureetrajetmn"></div>
                <input class="text" name="dureetrajeth" id="dureetrajeth"></div>
                <input class="text" name="coutdeplacements" id="coutdeplacements"></div>
            </div>
        </div>

    </div>
    <!--<div id="mapG3" class="img-responsive"></div> -->
</div>
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
<?php $address=$devis['DV_CodePostalPrestation'].",".$devis['DV_Lieudelaprestation']; ?>
<script type="text/javascript">

$(document).ready(function(){ // Debut du jQuery
                            // on affiche la section du formulaire de connexion par defaut et on cache les autres sections
                            $('#DV_Datedudevis').on('change', function (e){
                                alert();



                            
                            

                            





                            var myMarker;
                            var search_addr;
                            var map;
                            var gdir;
                            var geocoder = null;
                            var addressMarker;

                            function resetonload() {
                                document.demandededevis.coutdeplacements.value="";
                            }

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
});
            }); // Fin du jQuery
        </script>
        <?php $this->stop('js') ?>


