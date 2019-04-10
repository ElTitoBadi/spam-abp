$(document).ready(function () {
    $('#table').DataTable({
        responsive: true,
        dom: 'Blprtip',
        select: true,
        buttons: [
            {
                title: 'Subtipus',
                extend: 'copy',
                text: "",
            },
            {
                title: 'Subtipus',
                extend: 'excel',
                text: "",
            },
            {
                title: 'Subtipus',
                extend: 'pdf',
                text: "",
            },
            {
                title: 'Subtipus',
                extend: 'print',
                text: "",
            },
        ],
        language: {
            sProcessing: "Processant...",
            sLengthMenu: "Mostra _MENU_ registres",
            sZeroRecords: "No s'han trobat registres.",
            sInfo: "Mostrant de _START_ a _END_ de _TOTAL_ registres",
            sInfoEmpty: "Mostrant de 0 a 0 de 0 registres",
            sInfoFiltered: "(filtrat de _MAX_ total registres)",
            sInfoPostFix: "",
            sSearch: "Filtrar:",
            sUrl: "",
            oPaginate: {
                sFirst: "Primer",
                sPrevious: "Anterior",
                sNext: "Següent",
                sLast: "Últim"
            },
            buttons: {
                copyTitle: 'Copiat al portapapers',
                copySuccess: {
                    _: '%d subtipus copiats',
                    1: '1 subtipus copiat'
                }
            }
        },
    });

    $(".toolbar .btn").prependTo(".dt-buttons");


    indexSubtipus();
    console.log(window.location.pathname);
});

function indexSubtipus() {
    $.ajax({
        url: "api/subtipos",
        type: "GET",
        dataType: 'json',
        async: true,
        data: {
        },
        beforeSend: function () { },
        success: function (resp) {

            console.log(resp);
            x = resp;

            $("#table").DataTable().clear().draw();

            resp['data'].forEach(function (data) {
                $("#table").DataTable().row.add([
                    data['id'],
                    data['nombre'],
                    data['tipo']['nombre'],
                    data['gama_alta'],
                    data['gama_media'],
                    data['gama_baja'],
                    data['tipo_unidad'],
                ]).draw();
            });
        }
    });
}

function editSubtipus() {

    var rows = $("#table").DataTable().rows('.selected').data();

    if (rows.length != 1) {
        toast('Per editar has de seleccionar UN registre', 2000);
    } else {
        var id = rows[0][0];

        $('#form_edit').attr('action', document.URL + '/' + id + '/edit');
        $('#form_edit').submit();
    }
}

function deleteSubtipus() {

    var rows = $("#table").DataTable().rows('.selected').data();

    if (rows.length == 0) {
        toast('Per eliminar has de seleccionar UN registre', 2000);
    }
    else {
        for (var i = 0; i < rows.length; i++) {

            $.ajax({
                url: "api/subtipos/" + rows[i][0],
                type: "DELETE",
                dataType: 'json',
                async: true,
                data: {
                },
                error: function (resp) {
                    toast(resp.responseJSON.error, 5000);
                },
                beforeSend: function () { },
                success: function (resp) {
                    indexSubtipus();
                }
            });
        }
    }
}


