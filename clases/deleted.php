<?php
    require_once (__DIR__."/autoload.php");
    $objUsuario = new usuario();

    $id = $_POST['id'];
    $users = $objUsuario->delUsuarios($id);
    $updaterol= $objUsuario->updateRol($id);




?>