
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Réseau social pour développeur">
    <meta name="author" content="MEITE YOUSSOUF">

    <title>

        <?= isset($title) ? $title.' - '.WEBSITE_NAME : WEBSITE_NAME.' , Simple, Rapide et Efficace' ?>

    </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap-readable.css" rel="stylesheet">
    <!--    <link href="assets/css/bootstrap.css" rel="stylesheet">-->
    <link href="assets/css/main.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<?php include "partials/_nav.php"?>
<?php include "partials/_flash.php"?>