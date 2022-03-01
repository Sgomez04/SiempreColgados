<script>
    $('#empleados').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });

    function addPost() {
        $("#id_empleado").val('');
        $("#nombre").val('');
        $('#password').val('');
        $("#dni").val('');
        $("#correo").val('');
        $("#telefono").val('');
        $("#direccion").val('')
        $("#fechalta").val('');
        $("#cargo").val('');
        $('#post-modal').modal('show');
    }

    function editPost(event) {
        var id = $(event).data("id");
        let _url = `/empleadosjs/${id}`;
        $('#nombreError').text('');
        $('#passwordError').text('');
        $('#dniError').text('');
        $('#correoError').text('');
        $('#telefonoError').text('');
        $('#direccionError').text('');
        $('#fechaltaError').text('');

        $.ajax({
            url: _url,
            type: "GET",
            success: function(response) {
                if (response) {
                    $("#id_empleado").val(response.id_empleado);
                    $("#nombre").val(response.name);
                    $("#dni").val(response.dni);
                    $("#correo").val(response.email);
                    $("#telefono").val(response.telefono);
                    $("#direccion").val(response.direccion);
                    $("#fechalta").val(response.fecha_alta);
                    $("#cargo").val(response.tipo);

                    $('#post-modal').modal('show');
                }
            }
        });
    }

    function createPost() {
        $('#nombreError').text('');
        $('#passwordError').text('');
        $('#dniError').text('');
        $('#correoError').text('');
        $('#telefonoError').text('');
        $('#direccionError').text('');
        $('#fechaltaError').text('');

        let empleado = $('#id_empleado').val();
        let nombre = $('#nombre').val();
        let password = $('#password').val();
        let dni_empleado = $('#dni').val();
        let correo = $('#correo').val();
        let telefono_empleado = $('#telefono').val();
        let direccion_empleado = $('#direccion').val();
        let fechalta = $('#fechalta').val();
        let cargo = $('#cargo').val();

        let _url = `/empleadosjs`;
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: "POST",
            data: {
                id_empleado: empleado,
                name: nombre,
                password: password,
                dni: dni_empleado,
                email: correo,
                telefono: telefono_empleado,
                direccion: direccion_empleado,
                fecha_alta: fechalta,
                tipo: cargo,
                _token: _token
            },
            success: function(response) {
                if (response.code == 200) {
                    if (empleado != "") {
                        $("#row_" + empleado + " td:nth-child(2)").html(response.data.nombre);
                        $("#row_" + empleado + " td:nth-child(3)").html(response.data.dni_empleado);
                        $("#row_" + empleado + " td:nth-child(4)").html(response.data.correo);
                        $("#row_" + empleado + " td:nth-child(5)").html(response.data.telefono_empleado);
                        $("#row_" + empleado + " td:nth-child(6)").html(response.data.direccion_empleado);
                        $("#row_" + empleado + " td:nth-child(7)").html(response.data.fechalta);
                        $("#row_" + empleado + " td:nth-child(8)").html(response.data.cargo);

                    } else {
                        $('table tbody').prepend('<tr id="row_' + response.data.empleado + '"><td>' +
                            response.data.nombre + '</td><td>' + response.data.dni_empleado +
                            '</td><td>' +
                            response.data.correo + '</td><td>' +
                            response.data.telefono_empleado + '</td><td>' +
                            response.data.direccion_empleado + '</td><td>' +
                            response.data.fechalta + '</td><td>' +
                            response.data.cargo + '</td><td><a href="javascript:void(0)" data-id="' +
                            response.data.empleado +
                            '" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="' +
                            response.data.empleado +
                            '" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>'
                        );
                    }
                    $('#post-modal').modal('hide');
                    location.reload();
                }
            },
            error: function(response) {
                $('#nombreError').text(response.responseJSON.errors.name);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#dniError').text(response.responseJSON.errors.dni);
                $('#correoError').text(response.responseJSON.errors.email);
                $('#telefonoError').text(response.responseJSON.errors.telefono);
                $('#direccionError').text(response.responseJSON.errors.direccion);
                $('#fechaltaError').text(response.responseJSON.errors.fecha_alta);
            }
        });
    }

    function deletePost(event) {
        var id = $(event).data("id");
        let _url = `/empleadosjs/${id}`;
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: 'DELETE',
            data: {
                _token: _token
            },
            success: function(response) {
                $("#row_" + id).remove();
            }
        });
    }
</script>
