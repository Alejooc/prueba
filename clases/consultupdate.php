<?php
    require_once (__DIR__."/autoload.php");
    $objUsuario = new usuario();

    $id = $_GET['id'];
    if (isset($_GET['type'])) {
      $type = $_GET['type'];
    }
   
    if (isset($type)) {
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
    }
   
    
    $areas = $objUsuario->getAreas();

    $roles = $objUsuario->getRoles();
    $rolesUser = $objUsuario->getRolesU($id);
    $update = $objUsuario->getUsuario($id);
    $rolesUserCant = count($rolesUser);
    

    

     if (isset($type)== 1) {
        $updateuser = $objUsuario->updateUsuario($nombre,$email,$genero,$area,$descipcion,$boletin,$id);
        $updaterol= $objUsuario->updateRol($id);
        $insertrol = $objUsuario->insertarRolUsuario($id,$rol);


     }
     





?>