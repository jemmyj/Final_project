$('#admin_table').DataTable({

    //https://datatables.net/reference/option/
    aProcessing: true,//Activamos el procesamiento del datatables
    aServerSide: true,//Paginación y filtrado realizados por el servidor
    destroy: true,
    // con esto fijamos las cabeceras en la parte superior de la pantalla
    fixedHeader: false,
    responsive: true,
    stateSave: false,
    info: true,  //mostrandio xxx de xx registros
    //https://datatables.net/reference/option/pagingType
    paging: true, //quita no solo la información, sino toda la paginacion, se muestra todo de golpe
    ordering: true,   // quitar la posibilidad de ordenacion de las columnas
    searching: true, // quitar el sistema de busqueda
    // Cambiar el lenguaje - https://datatables.net/plug-ins/i18n/Spanish.html
    language: {
        url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
        //cdn.datatables.net/plug-ins/1.11.3/i18n/ --> Varios idiomas
    },
    // controla la capacidad para que el usuario cambie la longitud de las lineas que está viendo, si esto está a false, no aparecerá el lengthMenu
    lengthChange: true,
    lengthMenu: [  // para sobreescribir los datos de MOSTRAR
        [10, 20, 30, - 1], [10, 20, 30, 'Todos']   // son dos arrays, el primero son los datos y el segundo es el texto que se va a mostrar (el -1 son Todos)
    ],
    // https://datatables.net/reference/button/ -> lista de botones que podemos colocar
    dom: '<"toolbar">Bfrtip', //Definimos los elementos del control de tabla
    buttons: [

        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'A4',
            download: 'open',
            footer: true,
            title: 'Acciones',
            filename: 'Acciones',
            text: '<span class="btn btn-outline-primary custom-btn" data-toggle="tooltip" title="Imprimir PDF"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            },
            className: 'DataTable'
        },

        {
            extend: 'print',
            footer: true,
            filename: 'Export_Acciones',
            text: '<span class="btn btn-outline-primary custom-btn" data-toggle="tooltip" title="Imprimir"><i class="fas fa-print"></i></span>',
            className: 'DataTable'
        },

        {

            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Acciones',

            text: '<span  class="btn btn-outline-primary custom-btn" data-toggle="tooltip" title="Exportar EXCEL"><i class="fas fa-file-excel"></i></span>',
            className: 'DataTable'
        },
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_Acciones',
            text: '<span class="btn btn-outline-primary custom-btn" data-toggle="tooltip" title="Exportar CSV"><i class="fas fa-file-csv"></i></span>',
            className: 'DataTable'
        },
        {
            extend: 'colvis',
            text: '<span class="btn btn-outline-warning custom-btn" data-toggle="tooltip" title="Ocultar columnas"><i class="fas fa-columns"></i></span>',
            className: 'DataTable',
            postfixButtons: ['colvisRestore']
        }
    ],
    columns: [

        { name: "id" },
        { name: "image" },
        { name: "product" },
        { name: "description" },
        { name: "price" },
        { name: "code" },
        { name: "date_created" },
        { name: "accion", className: "text-center" }
    ],
    columnDefs: [

        //id
        { targets: [0], orderData: false, visible: false },
        //image
        { targets: [1], orderData: false, visible: true },
        //product
        { targets: [2], orderData: [0], visible: true },
        //description
        { targets: [3], orderData: false, visible: true },
        //price
        { targets: [4], orderData: [0], visible: true },
        //code
        { targets: [5], orderData: false, visible: true },
        //date_created
        { targets: [6], orderData: [0], visible: true },
        //accion
        { targets: [7], orderData: false, visible: true }
    ],

    "ajax": {
        // url: '../../controller/usssuario.php?op=listar',
        //  https://programacion.net/articulo/subir_una_imagen_en_un_formulario_mediante_ajax_1945

        url: "../../controller/admin.php?op=listarProductos",
        type: "get",
        dataType: "json",
        cache: false,
        serverSide: true,
        processData: true,
        beforeSend: function () {
            //    $('.submitBtn').attr("disabled","disabled");
            //    $('#usuario_data').css("opacity","");
        }, complete: function (data) {
        },
        error: function (e) {
            console.log(e.responseText);
        }
    }
});

//ANCHO del DATATABLE
$("#admin_table").addClass("width-100");


$(document).ready(function () {
    // Cuando se hace clic en el botón "Add Product"
    $(".btn-outline-primary").click(function () {
        // Mostrar el formulario modal
        $("#myModal").show();
    });

    // Cuando se hace clic en el botón de cancelar
    $("#cancel-btn").click(function () {
        // Ocultar el formulario modal
        $("#myModal").hide();
        $("#edit_modal").hide();
    });

    $("#cancel-btn-editar").click(function () {
        // Ocultar el formulario modal
        $("#edit_modal").hide();
    });
    // Cuando se hace clic en el botón "X" para cerrar el modal
    $(".close").click(function () {
        // Ocultar el formulario modal
        $("#myModal").hide();
        $("#edit_modal").hide();
    });


});



/**********************************************************************/
/****************INSERTAR PRODUCT************************************/
/********************************************************************/
$("#insertar-product-form").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData($("#insertar-product-form")[0]);
    // Obtener el objeto File de la imagen seleccionada
    var imageFile = formData.get('file');

    // Obtener el nombre del archivo
    var fileName = imageFile.name;

    // Agregar la ruta al objeto FormData
    formData.append('imagePath', fileName);

    $.ajax({
        url: "../../controller/admin.php?op=insertarProduct",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function () {

            $('#admin_table').DataTable().ajax.reload();

            // Vaciar los datos del FormData
            $("#insertar-product-form")[0].reset();
            $('#description').summernote('reset');

            swal.fire(
                'Added',
                'The product is added',
                'success'
            )
            $('#myModal').hide();
        }
    }); // del success
}); // del ajax


//ELIMINAR UN PRODUCTO

function delete_product(id) {

    swal.fire({
        title: 'Delete',
        text: "¿You wish to delete the product?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            $.post("../../controller/admin.php?op=delete_product", { id: id }, function (data) {
            });

            $('#admin_table').DataTable().ajax.reload();

            swal.fire(
                'Deleted',
                'The product was deleted',
                'success'
            )
        }
    })
}


function editarProduct(id) {
    // Mostrar el formulario modal
    $("#edit_modal").show();
    $('#id_product').val(id);
    idProduct = $('#id_product').val();
    $.post("../../controller/admin.php?op=obtenerProduct", { id: id }, function (data) {
        var data = JSON.parse(data);
        console.log(data)
        //Cargar datos
        $('#product-nameE').val(data[0].nombre);
        $('#product-priceE').val(data[0].precio);
        $('#categoriaE').val(data[0].categoria);
        $('#codigoE').val(data[0].codigo);
        $('#descriptionE').summernote('code', data[0].descripcion);
        // Mostrar imagen actual
        var imagen = data[0].imagen;
        var imagenElement = $('#imagenE');
        if (imagen) {
            imagenElement.attr('src', '../../public/img/' + imagen);
            imagenElement.show();
        } else {
            imagenElement.hide();
        }

        // Establecer evento para seleccionar archivo
        $('#fileE').on('change', function () {
            var archivo = $(this).get(0).files[0];
            var lector = new FileReader();
            lector.onload = function () {
                imagenElement.attr('src', lector.result);
                imagenElement.show();
            };
            lector.readAsDataURL(archivo);
        });


    }) // Recuperar datos del producto
}

// GUARDAR EDITAR
$("#editar-product-form").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData($("#editar-product-form")[0]);
    // Obtener el objeto File de la imagen seleccionada
    var imageFile = formData.get('fileE');

    // Obtener el nombre del archivo
    var fileName = imageFile.name;

    // Agregar la ruta al objeto FormData
    formData.append('imagePath', fileName);


    $.ajax({
        url: "../../controller/admin.php?op=editarProduct",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function () {
            swal.fire(
                'Edit',
                'The product was edited!',
                'success'
            ).then(() => {
                $('#edit_modal').modal('hide');
                location.reload();
            })
        } // del success
    }); // del ajax


});

$('#descriptionE').summernote({
    placeholder: 'Description',
    tooltip: false,
    tabsize: 2,
    height: 150,
    lang: 'es-ES', // default: 'en-US'
    toolbar: [

        ['font', ['bold', 'italic', 'underline']],
        ['color', ['color']],
        ['para', ['ul', 'ol']],
        ['insert', ['hr']],
    ]
});

$('#description').summernote({
    placeholder: 'Description',
    tooltip: false,
    tabsize: 2,
    height: 150,
    lang: 'es-ES', // default: 'en-US'
    toolbar: [

        ['font', ['bold', 'italic', 'underline']],
        ['color', ['color']],
        ['para', ['ul', 'ol']],
        ['insert', ['hr']]
    ]
});