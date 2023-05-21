<?php
/*****************************************************************/
session_start();
/*****************************************************************/
$title = "Page de profil";

include "filters/auth_filter.php";
include "includes/constants.php";
include "config/database.php";
include "includes/functions.php";
/*****************************************************************/



/*****************************************************************/
require "views/profile.view.php";
/*****************************************************************/