<?php

/** auto load classes
 *
 * @param $class_name
 */
function abv_autoloader($class_name){
    $str = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.mb_strtolower($class_name).DIRECTORY_SEPARATOR.
        'class.'.mb_strtolower($class_name).'.php';
    require ($str);
}

// register auto loader
spl_autoload_register('abv_autoloader');

//required block
require ('language.php');
require ('config.php');
require ('sendmail.php');
require ('db.php');
require ('files.php');