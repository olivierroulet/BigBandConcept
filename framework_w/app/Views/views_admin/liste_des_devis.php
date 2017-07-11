<?php $this->layout('solopageconnectedmap_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-2 pull-left">
					<a href="redirect_role" class="btn btn-block btn-primary">Menu principal</a>
                    <a href="redirect_role" class="btn btn-block btn-default">préc.</a>
                    <a href="redirect_role" class="btn btn-block btn-default">suiv.</a>
                </div>
           
       </div>
       <div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
           <h2 class="title-one">Devis</h2>
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
                <div class='col-sm-3'>
                    Dest : 
                </div><!-- fin de col sm-3>-->
                <div class='col-sm-9'>
                    <?= $devis['CL_Raison_Sociale']?><br>
                    <?= $devis['US_FirstName'] . ' ' . $devis['US_LastName'];?><br>
                    <?= $devis['CL_Code_Postal'] . ' ' . $devis['CL_Ville'];?><br>
                </div><!-- fin de col sm-9>-->
            </div> <!-- fin de col sm-3 >-->
            <div class='col-sm-3'>
                <div class='col-sm-3'>
                    Exp : 
                </div><!-- fin de col sm-3>-->
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
                </div><!-- fin de col sm-9>-->
            </div> <!-- fin de col sm-3 >-->
            <div class='col-sm-4'>
              Id : <?= $devis['DV_Iddevis'];?>
              <br> Date de la demande : <?=date ('d/m/Y', strtotime($devis['DV_Date_De_Creation']));?>
              <div id="mapG3"></div><div id="couverturecarte"></div> 
          </div>

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

    var infobulle;
    var myMarker;
    var search_addr;
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
        </script>
        <?php $this->stop('js') ?>


