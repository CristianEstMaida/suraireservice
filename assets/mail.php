<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $mensaje = $_POST["message"];

    // Validación de longitud
    if (strlen($nombre) > 50 || strlen($email) > 100 || strlen($mensaje) > 500) {
        die('<p>Error: Excediste el límite de caracteres. <a href="javascript:history.back();">Volver</a></p>');
    }

    // Configuración del correo
    $remitente_usuario = "From: Suraire Service <info@suraireservice.com.ar>\r\n";
    $asunto_usuario = "Mensaje del formulario";
    $contenido_usuario = "Hola Suraire Service,\n\nEl mensaje de $nombre cuyo email es $email ha sido recibido:\n$mensaje\n";

    // Enviar el correo
    if (mail($email, $asunto_usuario, $contenido_usuario, $remitente_usuario)) {
        echo '<div class="msg">El mensaje se envió correctamente</div>';
    } else {
        echo '<p>Se ha producido un error. Inténtalo nuevamente <a href="javascript:history.back();">aquí</a></p>';
    }
}
?>