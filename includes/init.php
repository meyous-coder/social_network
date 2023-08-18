<?php

if(!empty($_COOKIE['user_id']) && !empty($_COOKIE['pseudo'])){
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['pseudo'] = $_COOKIE['pseudo'];
    $_SESSION['avatar'] = $_COOKIE['avatar'];
}