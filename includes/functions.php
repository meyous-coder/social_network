<?php
/***************************************DEGUG************************************************/
if (!function_exists('debug')) {
    function debug($arg)
    {
        var_dump($arg);
        exit();
    }
}
/******************************************************************************************/
/*****************************************NOT_EMPTY*****************************************/
if (!function_exists('not_empty')) {
    function not_empty($fields = [])
    {
        if (count($fields) != 0) {
            foreach ($fields as $field) {
                if (empty($_POST[$field]) || trim($_POST[$field]) == "") {
                    return false;
                }
            }
            return true;
        }
    }
}
/******************************************************************************************/
/***************************************IS_ALREADY_IN_USE**********************************/
if (!function_exists('is_already_in_use')) {
    function is_already_in_use($field, $value, $table)
    {
        global $db;

        $q = $db->prepare("SELECT id FROM $table WHERE $field = ? ");
        $q->execute([$value]);

        $count = $q->rowCount();

        $q->closeCursor();

        return $count;

    }
}
/******************************************************************************************/
/***************************************SET_FLASH*******************************************/
if (!function_exists('set_flash')) {
    function set_flash($message, $type = 'info')
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}
/******************************************************************************************/
/***************************************REDIRECT*******************************************/
if (!function_exists('redirect')) {
    function redirect($page)
    {
        header("Location: " . $page);
        exit();
    }
}
/******************************************************************************************/
/***************************************REDIRECT_INTENT_OR*******************************************/

if (!function_exists('redirect_intent_or')) {
    function redirect_intent_or($default_url)
    {
        if ($_SESSION['forwarding_url']) {
            $url = $_SESSION['forwarding_url'];
        } else {
            $url = $default_url;
        }
        $_SESSION['forwarding_url'] = null;
        redirect($url);
    }
}
/******************************************************************************************/
/***************************************SAVE_INPUT_DATA************************************/
if (!function_exists('save_input_data')) {
    function save_input_data()
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'password') === false) {
                $_SESSION['input'][$key] = $value;
            }

        }
    }
}
/******************************************************************************************/
/************************************GET_INPUT_DATA****************************************/
if (!function_exists('get_input_data')) {
    function get_input_data($key)
    {
        return !empty($_SESSION['input'][$key]) ? e($_SESSION['input'][$key]) : null;
    }
}
/******************************************************************************************/
/************************************CLEAR_INPUT_DATA*************************************/
if (!function_exists('clear_input_data')) {
    function clear_input_data()
    {
        if (isset($_SESSION['input'])) {
            $_SESSION['input'] = [];
        }
    }
}
/******************************************************************************************/
/************************************E(Echapper les caractères)***************************/
if (!function_exists('e')) {
    function e($string)
    {
        if ($string) {
            return htmlspecialchars($string);
            // return htmlentities($string,ENT_QUOTES,'utf8',false);
        }
    }
}
/******************************************************************************************/
/************************************SET_ACTIVE*******************************************/
if (!function_exists('set_active')) {

    // Gère l' état actif de nos différents liens
    function set_active($file, $class = 'active')
    {
        $page = trim(strrchr($_SERVER['SCRIPT_NAME'], '/'), '/');

        if ($page === $file . '.php') {
            return $class;
        } else {
            return null;
        }
    }
}
/******************************************************************************************/
/************************************GET_SESSION*******************************************/
// Get a session value by key
if (!function_exists('get_session')) {
    function get_session($key)
    {
        if ($key) {
            return !empty ($_SESSION[$key])
                ? e($_SESSION[$key])
                : "null";
        }
    }
}
/******************************************************************************************/
/************************************FIND_USER_BY_ID***************************************/
if (!function_exists('find_user_by_id')) {

    // Find an user by id
    function find_user_by_id($id)
    {
        global $db;

        $q = $db->prepare("SELECT id, name, pseudo, email, city, country, twitter, github,available_for_hiring, sex, bio,avatar FROM users WHERE id = ?");
        $q->execute([$id]);

        $data = $q->fetch(PDO::FETCH_OBJ);
        $q->closeCursor();

        return $data;

    }
}
/******************************************************************************************/
/************************************GET_AVATAR_URL***************************************/
if (!function_exists('get_avatar_url')) {

    // Find an user by id
    function get_avatar_url($email, $size = 25)
    {
        return "http://gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?s=" . $size;
    }
}
/******************************************************************************************/
/************************************IS_LOGGED_IN***************************************/
if (!function_exists('is_logged_in')) {

    // Find an user by id
    function is_logged_in()
    {
        return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);
    }
}
/******************************************************************************************/
/************************************FIND_CODE_BY_ID***************************************/
if (!function_exists('find_code_by_id')) {

    // Find an code by id
    function find_code_by_id($id)
    {
        global $db;

        $q = $db->prepare("SELECT code FROM codes WHERE id = ?");
        $q->execute([$id]);
        $data = $q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();
        return $data;

    }
}
/******************************************************************************************/
/************************************GET_CURRENT_LOCALE************************************/
if (!function_exists('get_current_locale')) {

    // Get current locale language
    function get_current_locale()
    {
        return $_SESSION['locale'];
    }
}
/******************************************************************************************/
/************************************BCRYPT_HASH_PASSWORD************************************/
if (!function_exists('bcrypt_hash_password')) {

    // Hash password with Blowfish Algorithm
    function bcrypt_hash_password($value, $option = [])
    {
        $cost = isset($options['rounds']) ? $options['rounds'] : 10;
        $hash = password_hash($value, PASSWORD_BCRYPT, ['cost' => $cost]);
        if ($hash === false) {
            throw new Exception("Bcrypt hashing n'est pas supporté.");
        }
        return $hash;
    }
}
/******************************************************************************************/
/************************************BCRYPT_VERIFY_PASSWORD*******************************/
if (!function_exists('bcrypt_verify_password')) {

    // Hash password with Blowfish Algorithm
    function bcrypt_verify_password($value, $hashedValue)
    {
        return password_verify($value, $hashedValue);
    }
}
/******************************************************************************************/
/**************************************** CELL COUNT ************************************/
// Cell count
// Retourne le nombre d'enregistrements trouvés respectant
// une certaine condition

if (!function_exists('cell_count')) {
    function cell_count($table, $field_name, $field_value)
    {
        global $db;

        $q = $db->prepare("SELECT * FROM $table WHERE $field_name = ? ");
        $q->execute([$field_value]);
        return $q->rowcount();
    }
}
/******************************************************************************************/
/******************************************REMEMBER ME************************************/
// Remember me

if (!function_exists('remember_me')) {
    function remember_me($user_id)
    {
        // Générer le token de manière aléatoire
        // Générer le sélecteur de manière aléatoire et s' assurer que ce dernier est unique
        // Sauver ces infos(user_id,selector,expires(14 jours),token(hashed)) en base de données
        // Créer un cookie auth (14 jours expires) httpOnly => true
        // Contenu : base64_encode(selector).':'.base64_encode(token)


        global $db;

        // Générer le token de manière aléatoire
        $token = openssl_random_pseudo_bytes(24);
        // // Générer le token de manière aléatoire

        do {
            $selector = openssl_random_pseudo_bytes(9);
        } while (cell_count('auth_tokens', 'selector', $selector) > 0);
        // Sauver ces infos (user_id, selector, expires(14 jours), token (hashed)) en bd
        $q = $db->prepare("INSERT INTO auth_tokens( expires, selector, user_id, token ) VALUES (DATE_ADD(NOW(),INTERVAL 14 DAY),:selector, :user_id, :token )");
        $q->execute([
            'selector' => $selector,
            'user_id' => $user_id,
            'token' => hash('sha256', $token)
        ]);
        // Créer un cookie 'auth' (14 jours expires) httpOnly =>true
        // Contenu : base64_encode(selector).' : '.base64_encode(token)
        setcookie(
            'auth',
            base64_encode($selector) . ':' . base64_encode($token),
            time() + 60 * 60 * 24 * 14,
            "",
            "",
            false,
            true
        );
    }
}
/***********************************************************************************/
/************************************AUTO LOGIN************************************/

// Auto login

if (!function_exists('auto_login')) {
    function auto_login()
    {

        global $db;

        // Vérifier que notre cookie 'auth' existe
        if (!empty($_COOKIE['auth'])) {
            $split = explode(':', $_COOKIE['auth']);

            if (count($split) !== 2) {
                return false;
            }

            // $selector = $split[0];
            // $token = $split[1];

            list($selector, $token) = $split;

            $q = $db->prepare("SELECT auth_tokens.token, auth_tokens.user_id,
                                users.id id_utilisateur, users.pseudo, users.email  
                                FROM auth_tokens
                                LEFT JOIN users
                                ON users.id = auth_tokens.user_id
                                WHERE selector = ? 
                               AND expires >= CURDATE() ");

            $q->execute([base64_decode($selector)]);

            $data = $q->fetch(PDO::FETCH_OBJ);

            if ($data) {
                if (hash_equals($data->token, hash('sha256', base64_decode($token)))) {
                    session_regenerate_id(true);
                    $_SESSION['user_id'] = $data->id_utilisateur;
                    $_SESSION['pseudo'] = $data->pseudo;
                    $_SESSION['email'] = $data->email;
                }
            }
        }
        return false;
        // Récupérer via ce token le $selector et le $token

        // Décoder notre $selector

        // Vérifier au niveau de auth_tokens qu'il y a un enregistrement qui a comme $selector

        // Si on trouve un enregistrement
        // comparer les deux tokens


        // Si tout est bon
        // Enregistrer toutes les informations en session
        //

        //
        // Return true
        //
        // Dans le cas contraire return false
    }

}
/******************************************************************************************/
/************************************ REPLACE LINKS **************************************/
// Permet de rendre tous les liens d'une chaînes de caractèresggv
if (!function_exists('replace_links')) {
    function replace_links($texte)
    {
        // return str_replace( ["http://twitter.com/estmo","http://google.fr"], ["<a href=\"\">http://twitter.com/estmo</a>","<a href=\"\">http://www.google.fr</a>"], $texte );
        $regex_url = " /(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";
        return preg_replace($regex_url, " <a href=\"$0\" target=\"blank\"> $0 </a>", $texte);
    }
}
/******************************************************************************************/
/************************ CHECK IF A FRIEND REQUEST HAS ALREADY BEEN SENT ***********************/
// Check if a friend request has already been sent
if (!function_exists('if_a_friend_request_has_already_been_sent')) {
    function if_a_friend_request_has_already_been_sent($id1, $id2)
    {
        global $db;

        $q = $db->prepare("SELECT status FROM friends_relationships WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2) OR ( user_id2 = :user_id1 AND user_id1 = :user_id2)");
        $q->execute([
            'user_id1' => $id1,
            'user_id2' => $id2
        ]);
        $count = $q->rowcount();
        $q->closeCursor();
        return (bool)$count;

//        cas 2
//        $data = $q->fetch();
//        if($data){
//            return true;
//        }else{
//            return false;
//        }
    }
}
/*****************************************************************************************/
/************************************ RELATION LINK TO DISPLAY ***************************/
// Checks if a friend request has already been sent
if (!function_exists('relation_link_to_display')) {
    function relation_link_to_display($id)
    {
        global $db;
        $q = $db->prepare("SELECT user_id1, user_id2, status FROM friends_relationships WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2) OR ( user_id2 = :user_id1 AND user_id1 = :user_id2 )");
        $q->execute([
            'user_id1' => get_session('user_id'),
            'user_id2' => $id
        ]);
        $data = $q->fetch();
        $q->closeCursor();

        if ($data) {
            if ($data['user_id1'] == $id && $data['status'] == '0') {
                // Lien pour accepter ou refuser la demande d' amitié
                return "accept_reject_relation_link";
            } elseif ($data['user_id1'] == get_session('user_id') && $data['status'] == '0') {
                // Lien pour annuler la demande
                // Message pour dire que la demande a été envoyée
                return "cancel_relation_link";
            } elseif ($data['status'] == '1') {
                // Lien pour supprimer la relation d' amitié
                return "delete_relation_link";
            }
        } else {
            // Lien pour ajouter la personne comme ami(e)
            return "add_relation_link";
        }
    }
}
/******************************************************************************************/