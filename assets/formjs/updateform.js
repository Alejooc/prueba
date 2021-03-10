$(function () {
    var $formsave = $("#formsub");
    
    if ($formsave.length) {

        
        $.validator.addMethod("pattern",function(value,element){
            return this.optional(element) || /^[a-zA-Z-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s'.\\s]{1,50}$/i.test(value);
        },"no valid");

        $formsave.validate({
            
            rules: {
                name : {
                  required: true,
                  minlength: 3,
                    pattern:true
                
                  
                },
                email: {
                  required: true,
                  email: true
                },
                genero: {
                    required: true
                },
                area: {
                    required: true
                },
                desc: {
                    required: true
                },
                boletin: {
                    required: false
                },
                
                
            },
            messages: {
                name: {
                    name:"Ingrese Su nombre",
                    required:"Este campo es obligatorio.",
                    minlength:"El nombre debe tener mas de 3 caracteres.",
                    pattern:"El nombre no puede contener números o caracteres especiales."
                },
                email: {
                  required: "Este campo es obligatorio",
                  email: "Su dirección de correo electrónico debe tener el formato: name@domain.com"
                },
                genero:{
                    genero:"Seleccione su sexo",
                    required: "Este campo es obligatorio"
                },
                area:{
                    area:"Seleccione un area",
                    required: "Este campo es obligatorio"
                },
                desc:{
                    desc:"Ingrese una descripción",
                    required: "Este campo es obligatorio"
                },
            },
            errorPlacement:function(error,element){
                if (element.is(":radio")) {
                    error.appendTo(element.parents(".genero"));
                }else if(element.is(":checkbox")){
                    error.appendTo(element.parents(".rol"));
                }
                else{
                    error.insertAfter(element);
                }
            }
            });
    }
    
});
$("#formsub").submit(function (e) { 
    e.preventDefault();
    let id =$(this).attr('data');
    var roles = $(".roles");
    console.log(roles.is(":checked"));

    if ($("#formsub").valid()) {
        if (roles.is(":checked")) {
            $.ajax({
                type: "post",
                url: "./clases/consultupdate.php?id="+id+"&type=1",
                data: $("#formsub").serializeArray(),
                success: function (response) {
                   
                    console.log(response);
                    Swal.fire({
                        title: 'Registro actualizado correctamente',
                        icon: 'success',
                        showConfirmButton: false
                    })
                    setTimeout(function(){ $(location).attr('href','./')},950);
                    
    
                }
            });  
        }else{
            toastMixin.fire({
                icon: 'error',
                title: 'Error.',
                text:'Debes seleccionar un rol.'
            });
        }
         
    }else{
        toastMixin.fire({
            icon: 'error',
            title: 'Error:',
            text:'Completar los campos requeridos.'
        });
    }
        
    });