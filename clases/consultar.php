<?php
    require_once (__DIR__."/autoload.php");
    $objUsuario = new usuario();
    
    $users = $objUsuario->getUsuarios();

    $areas = $objUsuario->getAreas();

    $roles = $objUsuario->getRoles();





?>