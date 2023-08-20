<?php
session_start();


require('config/database.php');


//Supprimer l'entrée en bdd au niveau de auth_tokens
$q = $db->prepare("DELETE FROM auth_tokens WHERE user_id = ? ");
$q->execute([$_SESSION['user_id']]);

// Réiniatialisation de la session
$session_keys_white_list = ['locale'];
$new_session = array_intersect_key($_SESSION, array_flip($session_keys_white_list));
$_SESSION = $new_session;

// Supprimer les cookies et détruire la session
setcookie( 'auth','',time() - 3600 );

// Redirection
header('Location: login.php');
exit();

// Suavegarde de la langue courante
// $current_locale = $_SESSION['locale'];
//
// setcookie( 'pseudo','',time() - 3600 );
// setcookie( 'user_id','',time() - 3600 );
//setcookie( 'avatar','',time() - 3600 );
//
// session_destroy();
// $_SESSION = [];
//
// Restauration de la langue courante
// session_start();
// $_SESSION['locale'] = $current_locale;


