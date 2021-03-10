<?php
 require_once (__DIR__."/clases/consultar.php");
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
    <title>Lista de empleados</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-12">
        <span class="h3 d-block mt-4 mb-4">Lista de empleados</span>
        <div class="col-12 shadow bg-white py-3">
        <button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#crear">
        <i class="fas fa-user-plus"></i> Crear
        </button>
        <table class="table table-striped ">
            <thead>
            <tr>
                <th><i class="fas fa-user"></i> Nombre</th>
                <th><i class="fas fa-at"></i> Email</th>
                <th><i class="fas fa-venus-mars"></i> Sexo</th>
                <th><i class="fas fa-briefcase"></i> Área</th>
                <th><i class="fas fa-envelope"></i> Boletín</th>
                <th>Modificar</th>
                <th>Eliminar</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $info) : ?>
                <tr>
                <td><?= $info['nombre']?></td>
                <td><?= $info['email']?></td>
                <td><?php if($info['sexo'] == 'M'){
                    echo "Masculino";
                }else{
                    echo "Femenino";
                }?>
                </td>
                <td><?= $info['area']?></td>
                <td>
                <?php if($info['boletin'] == 1){
                    echo "Si";
                }else{
                    echo "No";
                }?></td>
                <td>
                <a class="btn btn-primary" data="<?= $info['id']?>"
                href="editarusuario.php?id=<?= $info['id']?>"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                <a class="btn btn-danger dele"
                href="" data="<?= $info['id']?>">
                <i class="fas fa-trash-alt"></i>
                </a>
                </td>

            </tr> 
            <?php endforeach; ?>
           
            </tbody>
        </table>
        </div>
        



        <div class="modal" id="crear">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header px-2 py-2">
                    <h5>Crear usuario</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="alert alert-info">
                    Los campos con asteriscos <strong>(*)</strong> son Obligatorios.
                    </div>
                    <form id="formsub" method="post">
                        <div class="form-group">
                            <label for="name">Nombre Completo *</label>
                            <input type="text" class="form-control" name="name" placeholder="Nombre completo del empleado" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico *</label>
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" id="email">
                        </div>
                        <div class="form-group genero">
                            <label class="d-block mt-2" for="">Sexo *</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio" name="genero" value="M">
                                <label class="custom-control-label" for="customRadio">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio2" name="genero" value="F">
                                <label class="custom-control-label" for="customRadio2">Femenino</label>
                            </div>
                        </div>
                        
                        <div class="form-group area">
                            <label class="d-block mt-2" for="area">Area *</label>
                            <select name="area" id="area" class="custom-select">
                                <option selected="" disabled="">Seleccionar Area</option>
                                <?php foreach ($areas as $area) : ?>
                                    <option value="<?= $area['id']?>"><?= $area['nombre']?></option>

                                <?php endforeach; ?>
                            
                            </select>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="d-block mt-2" for="">Descripción *</label>
                            <textarea class="form-control" placeholder="Descripción de la experiencia del empleado" name="desc" rows="3" id="comment"></textarea>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" value="1" name="boletin" type="checkbox"> Deseo recibir boletín informativo
                            </label>
                        </div>
                        <div class="form-group rol">
                            <label class="d-block mt-2" for="">Roles *</label>
                            <?php foreach ($roles as $rol) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox"  class="form-check-input roles" name="check_lista[]" value="<?= $rol['id']?>"><?= $rol['nombre']?>
                                    </label>
                                </div>
                                

                            <?php endforeach; ?>
                        </div>
                        
                        
                        <button id="guardar" type="submit" class="btn btn-primary mt-3">Guardar</button>
                    </form>
                </div>

                
                

                </div>
            </div>
        </div>
        </div>
        
        <template id="my-template">
        <swal-title>
            Registro eliminado correctamente
        </swal-title>
        <swal-icon type="success" color="green"></swal-icon>
        <swal-param name="allowEscapeKey" value="false" />
        <swal-param
            name="customClass"
            value='{ "popup": "my-popup" }' />
        </template>
    </div>





<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/js/jquery-3.6.0.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/js/popper.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/js/bootstrap.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/js/jquery.validate.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/package/dist/sweetalert2.all.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/jqvalidation/dist/jquery.validate.min.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/app.js"></script>
<script src="<?= $_SERVER["HTTP_HOST"] ?>/../assets/formjs/saveform.js"></script>






</body>

</html>