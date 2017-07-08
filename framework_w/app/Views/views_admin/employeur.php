<?php $this->layout('solopageconnectedmap_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
				<div class="col-sm-1.5 pull-left">
					<a href="redirect_role" class="btn btn-primary">Menu principal</a></div>
					<div class="col-sm-6">
					<a href="redirect_role" class="btn btn-primary">précédent</a>
				</div>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-sm-6 col-sm-offset-3">
					<h2 class="title-one">EMPLOYEUR</h2>
					
				</div>


			</div>
			<div class="row">
				<?php 
				if(!empty($tousLesDevis)):?>
				<hr>
				<?php foreach ($tousLesDevis as $devis): 

				?>

				<div class='row text-center'>
					
					<div class='col-sm-4'>
						Id : <?= $devis['DV_Iddevis'];?>
						<br> Date de la demande : <?=date ('d/m/Y', strtotime($devis['DV_Date_De_Creation']));?>
						<div id="mapG3"></div><div id="couverturecarte"></div> 
					</div>
					
				</div>
				<hr>

			<?php endforeach; ?>
		<?php else: ?>
			<div class="alert alert-danger">
				Aucun devis !
			</div>
		<?php endif; ?>
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
                           // alert("- "+address+" n'existe pas");
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


