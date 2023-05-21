<?php
/***************************************DEGUG************************************************/
if(!function_exists('debug'))
{
    function debug($arg)
    {
        var_dump($arg);
        exit();
    }
}
/******************************************************************************************/
/*****************************************NOT_EMPTY*****************************************/
if(!function_exists('not_empty'))
{
    function not_empty($fields = [])
    {
        if(count($fields) !=0)
        {
            foreach ($fields as $field)
            {
                if(empty($_POST[$field]) || trim($_POST[$field]) == "")
                {
                    return false;
                }
            }
            return true;
        }
    }
}
/******************************************************************************************/
/***************************************IS_ALREADY_IN_USE**********************************/
if(!function_exists('is_already_in_use'))
{
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
if(!function_exists('set_flash'))
{
    function set_flash($message,$type='info')
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}
/******************************************************************************************/
/***************************************REDIRECT*******************************************/
if(!function_exists('redirect'))
{
    function redirect($page)
    {
        header("Location: " . $page);
        exit();
    }
}
/******************************************************************************************/
/***************************************SAVE_INPUT_DATA************************************/
if(!function_exists('save_input_data'))
{
    function save_input_data()
    {
        foreach ($_POST as $key => $value)
        {
            if(strpos($key,'password') === false)
            {
                $_SESSION['input'][$key] = $value;
            }

        }
    }
}
/******************************************************************************************/
/************************************GET_INPUT_DATA****************************************/
if(!function_exists('get_input_data'))
{
    function get_input_data($key)
    {
       return !empty($_SESSION['input'][$key]) ? e($_SESSION['input'][$key]): null;
    }
}
/******************************************************************************************/
/************************************CLEAR_INPUT_DATA*************************************/
if(!function_exists('clear_input_data'))
{
    function clear_input_data()
    {
        if(isset($_SESSION['input']))
        {
            $_SESSION['input'] = [];
        }
    }
}
/******************************************************************************************/
/************************************E(Echapper les caractères)***************************/
if(!function_exists('e'))
{
    function e($string)
    {
        if($string)
        {
            return htmlspecialchars($string);
            // return htmlentities($string,ENT_QUOTES,'utf8',false);
        }
    }
}
/******************************************************************************************/
/************************************SET_ACTIVE*******************************************/
if(!function_exists('set_active'))
{

    // Gère l' état actif de nos différents liens
    function set_active($file,$class = 'active')
    {
        $page = trim(strrchr($_SERVER['SCRIPT_NAME'],'/'),'/');

        if($page === $file.'.php')
        {
            return $class;
        }else
        {
            return null;
        }
    }
}
/******************************************************************************************/