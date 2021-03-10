
   function reload() {
    location.reload();
   }
   // notificación toast sweetalert
   
   var toastMixin = Swal.mixin({
    toast: true,
    icon: 'success',
    title: 'General Title',
    animation: false,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
   
   
  // borrar registros del sistema

    $(".dele").click(function (e) { 
        e.preventDefault();
        console.log($(this).attr('data'));
        $.ajax({
            type: "post",
            url: "./clases/deleted.php",
            data: {
                id: $(this).attr('data')
            },
            success: function (response) {
                console.log(response);
                Swal.fire({
                    template: '#my-template'
                })
                setTimeout(function(){reload()},850);
                 
            }
        });
    });

    
    
    
    

