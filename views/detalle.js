
function insertarToCart(id) {
    idUsu = $("#usuId").val();
    talla = $('#size-select').val();
    $.ajax({
        url: "../controller/detalle.php?op=insertarToCart",
        type: "POST",
        data: { 'id': id, 'idUsu': idUsu, 'talla': talla },
        dataType: "html",
        success: function (text) {
            // Si la respuesta es exitosa, mostramos el mensaje de éxito al usuario
            Swal.fire('Añadido al carrito!', '', 'success').then((result) => {
                $('#size-select').val(0);
                if (result.isConfirmed) {
                    location.reload();
                }
            });

        }// del success 

    }); // del ajax
}


function decrementValue() {
    var select = $('#size-select');
    var value = select.val();
    var options = select.find('option');
    var index = options.index(options.filter(':selected'));

    if (index > 0) {
        value = options.eq(index - 1).val();
        select.val(value).trigger('change');
    }
}

function incrementValue() {
    var select = $('#size-select');
    var value = select.val();
    var options = select.find('option');
    var index = options.index(options.filter(':selected'));

    if (index < options.length - 1) {
        value = options.eq(index + 1).val();
        select.val(value).trigger('change');
    }
}

function noUser() {
    Swal.fire({
        title: "Register",
        text: "You don't have account. Do you want to register?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Accept",
        cancelButtonText: "Cancel"
    }).then(function (result) {
        if (result.value) {
            // Redirect to registar.php if Accept is clicked
            window.location.href = "./Registrar";
        }
    });
}

function verifyUser($product_id) {
    $('#usuId').val();
    if ($('#usuId').val() == '') {
        noUser();
    } else {
        insertarToCart($product_id);
    }
}
