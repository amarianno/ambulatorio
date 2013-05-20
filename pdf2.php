<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    error_reporting(E_ALL);
   /* $html = '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="include/js/highslide/highslide.css"/>
        <link rel="stylesheet" href="include/css/template.css" type="text/css" media="screen"/>
        <link rel="stylesheet" media="screen" href="include/js/superfish/css/superfish.css"/>
        <link rel="stylesheet" href="include/js/poshytip/tip-darkgray/tip-darkgray.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="include/js/poshytip/tip-twitter/tip-twitter.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="include/css/custom-theme/jquery-ui-1.10.2.custom.min.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="include/css/mana.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="include/css/buttons.css" type="text/css" media="screen"/>
	</head>

	<body>';*/
    $html = $_SESSION['relatorio_dia_atestados'];
    /*$html .= '
    </body>
    </html>';*/

	?>
	<?php
        require_once('MPDF56/mpdf.php');

        $mpdf = new mPDF();
        $stylesheet = file_get_contents('../include/css/template.css');
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output();
        exit;


	?>