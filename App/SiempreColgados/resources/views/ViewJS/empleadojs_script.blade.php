<script>
    $('#empleados').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });

    function addPost() {
        $("#id_empleado").val('');
        $('#post-modal').modal('show');
    }

    function editPost(event) {
        var id = $(event).data("id");
        let _url = `/posts/${id}`;
        $('#nombreError').text('');
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
                    // $("#password").val(response.password);
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
        var id_empleado = $('#id_empleado').val();
        var name = $('#name').val();
        var dni = $('#dni').val();
        var correo = $('#correo').val();
        var telefono = $('#telefono').val();
        var direccion = $('#direccion').val();
        var fechalta = $('#fechalta').val();
        var cargo = $('#cargo').val();

        let _url = `/posts`;
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: "POST",
            data: {
                id_empleado: id_empleado,
                name: nombre,
                dni: dni,
                email: correo,
                telefono: telefono,
                direccion: direccion,
                fecha_alta: fechalta,
                tipo: cargo,
                _token: _token
            },
            success: function(response) {
                if (response.code == 200) {
                    if (id != "") {
                        $("#row_" + id_empleado + " td:nth-child(2)").html(response.data.name);
                        $("#row_" + id_empleado + " td:nth-child(3)").html(response.data.dni);
                        $("#row_" + id_empleado + " td:nth-child(4)").html(response.data.email);
                        $("#row_" + id_empleado + " td:nth-child(5)").html(response.data.telefono);
                        $("#row_" + id_empleado + " td:nth-child(6)").html(response.data.direccion);
                        $("#row_" + id_empleado + " td:nth-child(7)").html(response.data.fecha_alta);
                        $("#row_" + id_empleado + " td:nth-child(8)").html(response.data.tipo);

                    } else {
                        $('table tbody').prepend('<tr id="row_' + response.data.id_empleado + '"><td>' +
                            response.data.name + '</td><td>' + response.data.dni + '</td><td>' +
                            response.data.email + '</td><td>' +
                            response.data.telefono + '</td><td>' +
                            response.data.direccion + '</td><td>' +
                            response.data.fecha_alta + '</td><td>' +
                            response.data.tipo + '</td><td><a href="javascript:void(0)" data-id="' +
                            response.data.id_empleado +
                            '" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="' +
                            response.data.id_empleado +
                            '" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>'
                        );
                    }
                    $('#nombreError').text('');
                    $('#dniError').text('');
                    $('#correoError').text('');
                    $('#telefonoError').text('');
                    $('#direccionError').text('');
                    $('#fechaltaError').text('');

                    $('#post-modal').modal('hide');
                }
            },
            error: function(response) {
                $('#nombreError').text(response.responseJSON.errors.nombre);
                $('#dniError').text(response.responseJSON.errors.dni);
                $('#correoError').text(response.responseJSON.errors.correo);
                $('#telefonoError').text(response.responseJSON.errors.telefono);
                $('#direccionError').text(response.responseJSON.errors.direccion);
                $('#fechaltaError').text(response.responseJSON.errors.fecha_alta);
            }
        });
    }

    function deletePost(event) {
        var id = $(event).data("id");
        let _url = `/posts/${id}`;
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