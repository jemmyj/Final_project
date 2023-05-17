function editar() {

    $("#nombre, #email, #contrasena").removeAttr('disabled');
    $("#perfil_title").text("You can edit now");
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
                    'Edited',
                    'Your user profile has been edited',
                    'success'
                )
                $("#nombre, #email, #contrasena").attr("disabled", true);
                $("#perfil_title").text("Click edit to change information");
                $("#Editar,#admin").removeClass("d-none");
                $("#Guardar, #cancelar").addClass("d-none");
            } else {
                swal.fire(
                    'Error',
                    'Failed to edit your user profile',
                    'error'
                )
            }
        }
    }); // del success
}); // del ajax