<?php 
// artiste_liste_PDF.php
/*Cf : https://richthegeek.wordpress.com/2011/09/24/converting-html-to-a-pdf-using-wkhtmltopdf-and-magic/*/
// NB: après l' installation par défaut, ne pas oubloier de mettre wkhtmltopdf dans le %PATH% !!!

/*En étant dans "D:\WebForce3\BigBandConcept\framework_w\public"
ouvrir une fenêtre console de commandes (Shift+Clic droit, puis "Ouvrir une fenêtre de commandes ici")
y poser le html à imprimer en PDF 
et enfin taper:
depuis D:\WebForce3\BigBandConcept\framework_w\public> : 
	wkhtmltopdf --disable-javascript -O Landscape -g  --load-error-handling ignore Artistes.html 123.pdf
si on le veut en grayscale, sinon :
	D:\WebForce3\BigBandConcept\framework_w\public>
	wkhtmltopdf --disable-javascript --default-header --disable-internal-links -O Landscape --load-error-handling ignore Artistes.html 123-couleurs.pdf
où wkhtmltopdf est dans c:\programmes\wkhtmltopdf\bin, avec un path dessus.
autres options (page level): 
--default-header
--disable-internal-links
Ca marche si et seulement si TOUTES les CSS sont présentes dans le chemin donné par les balises 
	<link rel="stylesheet" href="/bigbandconcept/framework_w/public/assets/publique/css/bootstrap.min.css">
par exemple.
*/
/*Documentation avec exemples sur :
http://madalgo.au.dk/~jakobt/wkhtmltoxdoc/wkhtmltopdf_0.10.0_rc2-doc.html#Page%20Options
*/

$pages = 'pages.html';
$header = false;
$footer = false ; // 'footer.html';
$output = 'out.pdf';

$command = array();
// -disable-javascript ???
$command[] ='wkhtmltopdf -n -O Landscape ';
//$command[] = escapeshellarg($pages);


if($header) {
	$command[] = '--header-html ' . escapeshellarg($header);
}
if($footer) {
	$command[] = '--footer-html ' . escapeshellarg($footer);
}

$command[] = escapeshellarg($pages);
$command[] = '>';
$command[] = escapeshallarg($output);


ob_start();
passthru(implode(' ', $command));
$content = ob_get_contents();
ob_end_clean();

?>