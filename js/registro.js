$(document).ready(function() {
    $('#registroForm').submit(function(event) {
        event.preventDefault(); // Evitar el envío automático del formulario

        // Obtener los valores del formulario
        var nombreCompleto = $('#nombrecompleto').val().trim();
        var apellido = $('#apellido').val().trim();
        var usuario = $('#usuario').val().trim();
        var contraseña = $('#contraseña').val();
        var confirmarContraseña = $('#confirmar_contraseña').val();

        // Validar que las contraseñas coincidan
        if (contraseña !== confirmarContraseña) {
            alert('Las contraseñas no coinciden.');
            return;
        }

        // Validar que el usuario no contenga mayúsculas
        if (usuario !== usuario.toLowerCase()) {
            alert('El usuario no debe contener letras mayúsculas.');
            return;
        }

        // Realizar la verificación de usuario único a través de Ajax
        $.ajax({
            type: 'POST',
            url: 'verificar_usuario.php',
            data: { usuario: usuario },
            success: function(response) {
                if (response === 'existe') {
                    alert('El usuario ya está registrado. Por favor, elige otro usuario.');
                } else {
                    // Si el usuario no está duplicado, enviar el formulario
                    $('#registroForm').unbind('submit').submit(); // Permitir el envío del formulario
                }
            },
            error: function() {
                alert('Error al verificar el usuario.');
            }
        });
    });
});
