<?php
/**
 * Contact form par mail et Carte avec marker et nouvelle charte graphique.
 */

$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
//    echo date_default_timezone_set('Europe/Paris');

    require 'PHPMailer/PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'philippe@philnowak.net';
    $mail->Password = 'xxx';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
//    $mail->isHTML(true) ;
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('philippe@philnowak.net', 'Phil 7CH');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('philippenowak@gmail.com', 'Phil from GM');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer contact form #3';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = '<p>Sorry, something went wrong. Please try again later.<pre>' . $mail->ErrorInfo . '<br></pre></p>';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Carte gMaps-DB et formulaire de prise de contact</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link href="include/CSS/bootstrap.min.css" rel="stylesheet"/> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">    
    <script src="https://use.fontawesome.com/795afa09e7.js"></script>

    <style>
      /* Always set the map height explicitly to define the size of the div element that contains the map. */
body{
	background-color: #666;
	color: white;
}
      #map, #map_canvas {
        display: inline;
        margin: auto;
        padding-bottom: 50px;
        height: 600px;
        width: 800px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body{
        height: 100%;
        margin: 0;
        padding: 6px;
        /*text-align: center;  */
      }
      textarea {
         vertical-align:top;
      }
    #floating-panel {
        align-self: center;
        display: block;
        width : 100%;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','Georgia','sans-serif';
        line-height: 30px;
      }
/*    input[type=button] {
        width: 100%;    
    }*/
    input {
        width: 50%;
    }    
    .row {
        display: inline-flex;
        align-content: flex-start;
       /* padding : 10px;
        margin : 10px, auto;*/
    }

  </style>
</head>
<!--  origine : https://developers.google.com/maps/documentation/javascript/styling?hl=fr#styling_the_default_map-->
<!--  <body onload="initGeo();"> ou bien-->
<body>
    <h2 align="center">Nous contacter...</h2>

   <div class="row col-sm-12">
    <form class="form-inline" id="contactForm">
        <div class="row col-sm-12"> 
	    <div class="row col-sm-4"></div> 
            <div class="row col-sm-4">
		<div class="form-group">
                <label for="message"><i class="fa fa-home fa-2x"></i>&nbsp;Message</label>
                <textarea form="contactForm" class="form-control" id="message" rows="8" cols="80">Bonne journée !
            </textarea>
	<div class="col-sm-12">
&nbsp;
	</div>

		</div>


  </div>

        </div>
        <div></div>
    <div class="form-group">
        <label for="subject">
            Type de sujet&nbsp;</label>
        <select id="subject" name="subject" class="form-control" required="required">
            <option value="na" selected="">Domaine:</option>
            <option value="service">Service aux Artistes</option>
            <option value="product">Service aux Employeurs</option>
            <option value="suggestions">Suggestions</option>
            <option value="product">Liste de diffusion</option>
        </select>
        &nbsp;
    </div>     
        
        <div class="form-group">
    <label for="name"><i class="fa fa-user fa-2x"></i>&nbsp;Nom</label>
    <input type="text" class="form-control" id="name" placeholder="Mon nom">
&nbsp;
        </div>
  <div class="form-group">
    <label for="email"><i class="fa fa-envelope fa-2x"></i>&nbsp;Email</label>
    <input type="email" class="form-control" id="email" placeholder="prenom.nom@exemple.com">
  &nbsp;
  </div>
  <div class="form-group">
            
      <button type="submit" class="btn btn-info" value="Envoyer"><strong>Envoyer</strong></button>
        </div>

</form>
</div>


<?php 


// INSERTION DES REQUETES POUR ALLER CHERCHER LA BONNE ADRESSE MAIL EN BASE !!!
      try
      { $baz = new PDO('mysql:host=localhost;dbname=ourshop;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); }
      catch (Exception $e)    {   die('Erreur : ' . $e->getMessage());    }
          $affiche = $baz->prepare('SELECT SI_ID, SI_Name, SI_PhotoMainPagePath, SI_Logo, SI_Address, SI_Addr_ZipCode, SI_Addr_City, SI_AddrPhone, SI_AddrMail, SI_Addr_Country, SI_OpeningHours, SI_Comments, SI_News, SI_RoleID FROM shopinfo WHERE SI_ID = 1' );
          $affiche->execute();
          while($donnees = $affiche->fetch()){
              $adresse =  $donnees['SI_Address'] .' '. $donnees['SI_Addr_ZipCode'].' '. $donnees['SI_Addr_City'] ;
?>

<div class="container" align="center">
     <?= 'Adresse postale: <strong>'. $adresse .'</strong>'. '<p id="townName" align="center"></p>'; ?> 
</div>

<div>
  <hr>
</div>
<?php
} // fin de la boucle while 
// Fin de l' INSERTION DES REQUETES POUR ALLER CHERCHER LA BONNE ADRESSE MAIL EN BASE !!!

 ?>

                
    <h2 align="center">Nous localiser...</h2>
    <p align="center"> <i class="fa fa-info-circle" aria-hidden="true"> Cliquer sur le logo Google <i class="fa fa-google" aria-hidden="true"></i> en bas à gauche de la carte pour l' ouvrir dans une nouvelle fenêtre Google Maps</i></p>
    <?php
        // $adresse="19 Avenue Jean Jaurès 33130 Bègles, France";  
    ?>  

  <!-- <h3>Google Maps par lien DB ourshop</h3> -->
      <div class="row col-sm-12">
        <div id="map_canvas"></div>
    </div>

<!-- fin du formulaire début de la carte liée à l' adresse en BdD -->


  <?php
// INSERTION DES REQUETES POUR ALLER CHERCHER LA BONNE ADRESSE MAIL EN BASE !!!
      try
      { $baz = new PDO('mysql:host=localhost;dbname=ourshop;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); }
      catch (Exception $e)    {   die('Erreur : ' . $e->getMessage());    }
          $affiche = $baz->prepare('SELECT SI_ID, SI_Name, SI_PhotoMainPagePath, SI_Logo, SI_Address, SI_Addr_ZipCode, SI_Addr_City, SI_AddrPhone, SI_AddrMail, SI_Addr_Country, SI_OpeningHours, SI_Comments, SI_News, SI_RoleID FROM shopinfo WHERE SI_ID = 1' );
          $affiche->execute();
          while($donnees = $affiche->fetch()){
            $map_address =  $donnees['SI_Address'] .' '. $donnees['SI_Addr_ZipCode'].' '. $donnees['SI_Addr_City'] ;
        }  

        if (!$donnees) {
          $map_address =  '19 rue Sénac de Meilhan, 13001, Marseille';
        }
// Fin de l' INSERTION DES REQUETES POUR ALLER CHERCHER LA BONNE ADRESSE MAIL EN BASE !!!

// address to map
  // echo urlencode($map_address);
  $opts = array(
    'http' => array(
      'method' => "GET" /*GET obligatoire pour Google*/
      )
    );
  $context = stream_context_create($opts);
    //context est une variable de type ressource que l'on va envoyer en paramètre à file_get_contents() pour lui spécifier si on travaille en get, post...

  $url = "http://maps.googleapis.com/maps/api/geocode/json??key=AIzaSyB0xJoi5c9MwYIYQlwIEfLqLh95hLtcaYA&address=".urlencode($map_address);
  $lat_long = get_object_vars(json_decode(file_get_contents($url, false, $context)));
    // pick out what we need (lat,lng)
  $coord = 'Lat: '.number_format($lat_long['results'][0]->geometry->location->lat,2) . "° N . Long: " . number_format($lat_long['results'][0]->geometry->location->lng, 2) .'° W';
  $lat_long = $lat_long['results'][0]->geometry->location->lat .','. $lat_long['results'][0]->geometry->location->lng;
 

   ?>     


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0xJoi5c9MwYIYQlwIEfLqLh95hLtcaYA"></script>

  <div id="map_canvas"></div>
<!--  <pre>

      echo file_get_contents($url);
      print_r(json_decode(file_get_contents($url)));
      print_r(get_object_vars(json_decode(file_get_contents($url)))); 
      voir si utile de garder ce snippet jSon
     -->
<!--  </pre> --> 
  <script>
    (function() { 
      function initialize() {
        var styledMapType = new google.maps.StyledMapType(

[
{featureType:'all',elementType:'labels.text.fill',stylers:[{color:'#ffffff'}]},
{featureType:'all',elementType:'labels.text.stroke',stylers:[{color:'#000000'}]},
{featureType:'landscape',elementType:'all',stylers:[{color:'#08304b'}]},
{featureType:'poi',elementType:'geometry',stylers:[{color:'#105B72'}]},
{featureType:'road.highway',elementType:'geometry.fill',stylers:[{color:'#000000'}]},
{featureType:'road.highway',elementType:'geometry.stroke',stylers:[{color:'#0b434f'}]},
{featureType:'road.arterial',elementType:'geometry.fill',stylers:[{color:'#000000'}]},
{featureType:'road.arterial',elementType:'geometry.stroke',stylers:[{color:'#0b3d51'}]},
{featureType:'road.local',elementType:'geometry',stylers:[{color:'#000000'}]},
{featureType:'transit', elementType: 'geometry',stylers: [{color: '#146474'}]},
{featureType:'transit.station',elementType: 'labels.text.fill',stylers: [{color: '#6A5ACD'}]},
{featureType:'water',elementType:'all',stylers:[{color:'#021019'}]}], 
{name: 'Personnalisée'});

        var myLatlng = new google.maps.LatLng(<?php echo $lat_long; ?>),
        mapOptions = {
          zoom: 8,
          center: myLatlng
        }

var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

var marker = new google.maps.Marker({
    position: myLatlng,
    title: '<?php echo $map_address; ?>',
    mapTypeControlOptions: {
      mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
    }
}); // fin du marker

// To add the marker to the map, call setMap();
marker.setMap(map);

//new ci-dessous 2017-06-28

        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
//new ci-dessus 2017-06-27


        icity = document.getElementById("townName");
        icity.innerHTML = '<?php echo $coord; ?>'




      } // fin de initialize


      google.maps.event.addDomListener(window, 'load', initialize);
    })();


  </script>
      
      <script>
        icity = document.getElementById("townName");
        icity.innerHTML = myLatlng;
        /* & 'L-l' & $lat_long;*/

      </script>

  <?php
  //Exemple  avec une requête PUT
  // Données à mettre à jour
  $data = http_build_query(
    array(
      'name' => 'Sosh'
      )
    );
  //name=Sosh

  // Création d'un flux
  $opts = array(
    'http' => array(
      'method' => "PUT",
      'header'  => 'Content-type: application/x-www-form-urlencoded',
      'content' => $data
      )
    );

  $context = stream_context_create($opts);

  // Exécution de la requête de mise à jour et récupération de la réponse
  //$facturesAPI = file_get_contents('http://api.mesfactures.fr/v1/factures/6021', false, $context);

  // Si la méthode renvoie un code HTTP 200 OK et une réponse ne signalant pas d'erreur, le contenu s'est bien mis à jour.
  
  echo '<div class="row">
              <p></p>
          </div>';
  include('include/footer.php');

  ?>


<!--       <footer>
          <div class="row">
              <p></p>
          </div>
      </footer>     -->
  </body>
</html>