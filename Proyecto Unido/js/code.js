$(document).ready(ini);

function ini(){
    
    // formulario login validación
        var form = $(".form-4");
        form.bind("submit",function(){
         
        $.ajax({
           type:  form.attr('method'),
           url:  form.attr('action'),
           data:  form.serialize(),

           beforeSend: function(){
               $("#enviar").text("enviando...");
               $('#enviar').attr("disabled", true);
           },
           complete:function(data){
                $("#enviar").text("ingresar");
               $('#enviar').attr("disabled", false);
            },
           success: function(data){

               if(data =="true"){
                   document.location.href="GestionGeneral.php";    
                }else{
                    $("#resultado").html("<div class='alert alert-danger' role='alert'><b>acceso denegado, </b>no se pudo comprobar el usuario</div>" + data);
                }

           },
           error: function(data){
               // que hacer si se cumplio la petición
           }

        });

        return false; // para que el formulario no se envié.

        });

}

