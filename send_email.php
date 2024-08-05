<?php
  // Configuración del correo electrónico
  $to = 'rody216@gmail.com';
  $subject = 'Mensaje desde el formulario de contacto';

  // Recopilar datos del formulario
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $subject_form = $_POST['subject'];
  $message = $_POST['message'];

  // Crear el cuerpo del correo electrónico
  $body = "Nombre: $name\n";
  $body.= "Teléfono: $phone\n";
  $body.= "Correo electrónico: $email\n";
  $body.= "Asunto: $subject_form\n";
  $body.= "Mensaje: $message";

  // Enviar el correo electrónico
  $headers = 'From: '. $email. "\r\n".
             'Reply-To: '. $email. "\r\n".
             'X-Mailer: PHP/'. phpversion();
  mail($to, $subject, $body, $headers);

  // Redirigir al inicio con un mensaje de éxito
  echo '<script>
          alert("Mensaje enviado satisfactoriamente!");
          window.location.href = "index.html#inicio";
        </script>';
?>