<?php

// include "Model.class.php";

// function spl_autoload_register($className)
// {
//     include './'.$className.".class.php";
// }
// new Model();


// __autoload() {} 


function loader($class)
{
    $file = $class.".class.php";

    if (file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register('loader');
$model = new Model();
$model->getData();




