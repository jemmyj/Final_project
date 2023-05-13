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
        { name: "creat_time" },
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
        //creat_time
        { targets: [5], orderData: [0], visible: true },
        //accion
        { targets: [6], orderData: false, visible: true }
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
    });

    // Cuando se hace clic en el botón "X" para cerrar el modal
    $(".close").click(function () {
        // Ocultar el formulario modal
        $("#myModal").hide();
    });
});

tinymce.init({
    selector: '#description',
    selector: 'textarea',
    branding: false, // Oculta el texto amarillo
    plugins: '...',
    toolbar: '...',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    apiKey: 'zu02gvsz5jbr3wl83c20x6mxnw8h97w8xky98t9uax1py8xw',
    content_css: [
        '//www.tiny.cloud/css/codepen.min.css'
    ],
    // URL de la política de privacidad de TinyMCE
    content_security_policy: "default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.tiny.cloud https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://cdn.tiny.cloud https://cdnjs.cloudflare.com;",
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
    // Contenido del textArea
    var content = tinyMCE.get('description').getContent();
    // Enviarlo al formDataformData.append('description', content);
    formData.append('description', content);

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
            tinymce.activeEditor.setContent('');

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