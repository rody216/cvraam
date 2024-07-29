<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validar los datos (opcional)
    if (empty($name) || empty($phone) || empty($email) || empty($subject) || empty($message)) {
        die("Todos los campos son requeridos.");
    }

    // Crear el cuerpo del correo
    $to = "rody216@gmail.com";
    $subject = "Nuevo mensaje de contacto: " . $subject;
    $body = "Nombre: $name\n";
    $body .= "Número telefónico: $phone\n";
    $body .= "Dirección de correo: $email\n";
    $body .= "Mensaje:\n$message\n";
    
    // Enviar el correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
}
?>
