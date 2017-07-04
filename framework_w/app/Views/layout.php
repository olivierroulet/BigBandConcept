<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="projet de fin de stage WF3 - 4ème session Web-Integration 2017">
    <meta name="author" content="comme home-page">

	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap-theme.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/half-slider.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/BigBand.css') ?>">

	<?= $this->section('css'); ?>

</head>
<body id="artisteAdd">

		<header>
			     <h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<section>
			     <?= $this->section('main_content') ?>
		</section>

        <section>
            <?= $this->section('Form') ?>
        </section>





<!-- ******************************  FOOTER début  ******************************* -->

<footer>
    <div class="squared">
        <hr>
        <div class="container-fluid">    
            <div class="col col-sm-12" id="go-top">
                <p align="center">
                <a class="smoothscroll" title="Haut de page" href="#home">
                    <span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
                </a>
                </p>
            </div>

        </div>
    </div>
    <!-- /.row -->
    <div class="container-fluid">
        <div class="row">   
            <div class="col col-lg-12">
                <p>
                    <?php
                    if (empty($_SESSION['count'])) {
                        $visits = 1;
                    } 
                    else {
                        $visits = $_SESSION['count']++;
                        $time1 = $_SESSION['timestamp2'];
                        $time2 = date('Y-m-d h:i:s', $_SESSION['timestamp2']);
                        $sysdate = new DateTime();
                        $sysdate2 = date('Y-m-d h:i:s', time());

                        echo 'Heure système : '. $sysdate2 .'.<br>';
                        echo 'Dernière connexion le : '.$time2 ; // so far so good! . ', soit depuis '.date_diff($time2, $sysdate, $differenceFormat = '%i §s');
                        $datetime1 = date_create($time2);
                        $datetime2 = date_create($sysdate2);
                        $interval = date_diff($datetime1, $datetime2);
                        echo ' depuis '. $interval->format('%d jours %h heures %i minutes et %s secondes');
                    }
                        echo  'Page vue '. $visits . ' fois dans votre session';
                    ?>
                </p>
            </div>
                <div id="copy-right">
                    <p align="center">Copyright &copy; Bidon&amp;Co 2017</p>
                </div>
        </div>
    </div>

    <script type="text/javascript">
        function retrieve_cookie(name) {
            var cookie_value = "",
            current_cookie = "",
            name_expr = name + "=",
            all_cookies = document.cookie.split(';'),
            n = all_cookies.length;

            for(var i = 0; i < n; i++) {
                current_cookie = all_cookies[i].trim();
                if(current_cookie.indexOf(name_expr) == 0) {
                cookie_value = current_cookie.substring(name_expr.length, current_cookie.length);
                break;
                }
            }
            console.log (current_cookie);
        return cookie_value;
        }
        /*    window.alert('Cookie '+ retrieve_cookie('BigBand_userRole'));*/
    </script>


</footer>

</body>
</html>