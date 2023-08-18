<?php
session_start();
session_destroy();
$_SESSION = [];

setcookie('user_id','',time()-3600);
setcookie('pseudo','',time()-3600);
setcookie('avatar','',time()-3600);

header("Location: login.php");
exit();