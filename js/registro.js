$(document).ready(function() {
    $('#registroForm').submit(function(event) {
        // Obtener los valores de los campos
        var usuario = $('#user').val();
        var contraseña = $('#password').val();
        var repContraseña = $('#repassword').val();

        // Verificar que el usuario no contenga mayúsculas
        if (usuario !== usuario.toLowerCase()) {
            $('#mensaje').text('El usuario no debe contener mayúsculas.');
            event.preventDefault(); // Evitar el envío del formulario
            return;
        }

        // Verificar que las contraseñas coincidan
        if (contraseña !== repContraseña) {
            $('#mensaje').text('Las contraseñas no coinciden.');
            event.preventDefault(); // Evitar el envío del formulario
            return;
        }

        // Si todo está bien, limpiar el mensaje
        $('#mensaje').text('');
    });
});
