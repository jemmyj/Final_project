function editar() {

    $("#nombre, #email, #contrasena").removeAttr('disabled');
    $("#perfil_title").text("Ya puedes editar");
    $("#Editar,#admin").addClass("d-none");
    $("#Guardar").removeClass("d-none");
    $("#cancelar").removeClass("d-none");

}

function cancelarEdit() {

    $("#nombre, #email, #contrasena").attr("disabled", true);
    $("#perfil_title").text("Pulse editar para cambiar información");
    $("#Editar,#admin").removeClass("d-none");
    $("#Guardar, #cancelar").addClass("d-none");

}

$("#perfil").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData($("#perfil")[0]);
    $.ajax({
        url: "../../controller/login.php?op=guardarEdiar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (response) {
            if (response == '') {
                swal.fire(
                    'Editado',
                    'Se ha editado tu perfil de usuario',
                    'success'
                )
                $("#nombre, #email, #contrasena").attr("disabled", true);
                $("#perfil_title").text("Pulse editar para cambiar información");
                $("#Editar,#admin").removeClass("d-none");
                $("#Guardar, #cancelar").addClass("d-none");
            } else {
                swal.fire(
                    'Error',
                    'No se pudo editar tu perfil de usuario',
                    'error'
                )
            }
        }
    }); // del success
}); // del ajax