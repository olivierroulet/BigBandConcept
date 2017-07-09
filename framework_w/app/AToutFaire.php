<!-- AToutFaire.php -->
<?php
/*http://localhost/bigbandconcept/framework_w/public/artistes_view
*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>Toto</title>
</head>
<body>
<!-- <form action ="artiste_liste_PDF.php" method="POST"> -->
<!-- L' HTML à imprimer en PDF est sur http://localhost/bigbandconcept/framework_w/public/artistes_view --> 
<form action ="artiste_liste_PDF.php" method="POST">
	<label for "from">
		input / source ->
	</label>>
	<input type="text" name="from" value="http://localhost/bigbandconcept/framework_w/public/artistes_view" />
	<label for "to">
		output / target ->
	</label>	<input type="text" name="to" value="toto.pdf" />
	<label> pour lancer la moulinette </label>
	<button type="submit"> Go	</button>
</form>


</body>
</html>