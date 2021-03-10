<?php
 require_once (__DIR__.'/clases/consultupdate.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?= $_SERVER["HTTP_HOST"] ?>/../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $_SERVER["HTTP_HOST"] ?>/../assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= $_SERVER["HTTP_HOST"] ?>/../assets/package/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= $_SERVER["HTTP_HOST"] ?>/../assets/css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-12">
            <div class="col-lg-5 mx-auto bg-white mt-3 mb-3 py-3 px-4 shadow">
               <span class="icon">
                <a href="./"><i class="fas fa-arrow-circle-left icon"></i></a>
               </span> 

               <span class="h4 mb-5 ml-3">
                Editar usuario
               </span>
               <hr>
            <div class="alert alert-info">
                Los campos con asteriscos <strong>(*)</strong> son obligatorios.
            </div>
                    <form id="formsub" data="<?= $update[0]['id']
                            ?>" method="post">
                        <div class="form-group">
                            <label for="name">Nombre Completo *</label>
                            <input type="text" class="form-control"  name="name" value="<?= $update[0]['nombre']
                            ?>" placeholder="nombre completo del empleado" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico *</label>
                            <input type="email" name="email" value="<?= $update[0]['email']?>"
                             class="form-control" placeholder="Correo electrónico " id="email">
                        </div>
                        <label class="d-block mt-2" for="">Sexo *</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input"
                             <?php if($update[0]['sexo'] && $update[0]['sexo'] == 'M'){
                                echo "checked"; 
                            } ?> id="customRadio" name="genero" value="M">
                            <label class="custom-control-label"  for="customRadio">Masculino</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input"
                            <?php if($update[0]['sexo']== 'F'){
                                echo "checked"; 
                            } ?> id="customRadio2" name="genero" value="F">
                            <label class="custom-control-label" for="customRadio2">Femenino</label>
                        </div>
                        <label class="d-block mt-2" for="">Área *</label>
                        <select name="area" class="custom-select">
                            <?php foreach ($areas as $area) : ?>
                                <option value="<?= $area['id']?>"
                                 <?php if($update[0]['area_id']== $area['id']){
                                echo "checked"; 
                            } ?>>
                            <?= $area['nombre']?></option>proyecto 

                            <?php endforeach; ?>
                          
                        </select>
                        
                        <div class="form-group">
                            <label class="d-block mt-2" for="">Descripción *</label>
                            <textarea class="form-control" name="desc" rows="3" id="comment"><?= $update[0]['descripcion']
                            ?></textarea>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" value="1"
                            <?php if(isset($update[0]['boletin'])&& $update[0]['boletin']== '1'){
                                        echo "checked"; 
                                        
                                    } ?>
                             name="boletin" type="checkbox"> Deseo recibir boletín informativo 
                            </label>
                        </div>
                        <div class="form-group rol">
                            <label class="d-block mt-2" for="">Roles *</label>
                            <?php $i=0; foreach ($roles as $rol=>$key) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox"
                                        <?php $i=0; foreach ($rolesUser as $rolu=>$keyu) : ?>
                                            <?php if($keyu['rol_id'] == $key['id']){
                                                echo "checked"; 
                                                
                                            } ?>
                                    <?php  $i++; endforeach; ?>
                                        class="form-check-input roles"  name="check_lista[]" value="<?= $key['id']?>"><?= $key['nombre']?>
                                    </label>
                                </div>

                            <?php  $i++; endforeach; ?>
                        </div>
                        
                        
                        <button id="saveupdate" data="<?= $update[0]['id']
                            ?>" type="submit" class="btn btn-primary mt-3 ">Guardar</button>
                    </form>
            </div>
        
        </div>
                    
               

    
    </div>





<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/js/jquery-3.6.0.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/js/popper.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/js/bootstrap.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/js/jquery.validate.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/package/dist/sweetalert2.all.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/formjs/updateform.js"></script>

<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/app.js"></script>



</body>

</html>