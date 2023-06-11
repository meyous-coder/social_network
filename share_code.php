<?php
/*****************************************************************/
session_start();
/*****************************************************************/
$title = "Connexion";
include "filters/auth_filter.php";
include "includes/constants.php";
include "config/database.php";
include "includes/functions.php";
/*****************************************************************/


/*****************************************************************/
require "views/share_code.view.php";
/*****************************************************************/