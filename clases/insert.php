<?php
    require_once (__DIR__."/autoload.php");
    $objUsuario = new usuario();
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $area = $_POST['area'];
    
    if (isset($_POST['boletin'])) {
        $boletin = $_POST['boletin'];
    }else{
        $boletin = 0;
    }
    $rol = $_POST['check_lista'];
    $descipcion = $_POST['desc'];

    // validar el formulario

    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
    if (!empty($_POST)) {
       if (preg_match($patron_texto, $nombre)) {
        $insert = $objUsuario->insertarUsuario($nombre,$email,$genero,$area,$boletin,$descipcion);
        $insertrol = $objUsuario->insertarRolUsuario($insert,$rol);
       }else{
        $error[]="El nombre sólo puede contener letras y espacios";
       }
    }

    



?>