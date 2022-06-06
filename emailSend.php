<?php

include './admin/config/dbconfig.php';

$db = conectarDB();
 //SENTENCIA SQL CONSULTA A PROMOSIONES


use PHPmailer\PHPmailer\PHPMailer;
use PHPmailer\PHPmailer\Exception;


require 'PHPmailer/Exception.php';
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {


    $SQLDatos = "SELECT *from datos where 1";
    $QeuryDatos = mysqli_query($db, $SQLDatos);
     $DatosEmp = mysqli_fetch_assoc($QeuryDatos);


    $datos = $_POST;
    $correoEmp = $DatosEmp['email_data'];


    //Server settings
    $mail->SMTPDebug = 0;                               //Enable verbose debug output
    $mail->isSMTP();                                    //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';               //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                           //Enable SMTP authentication
    $mail->Username   = ($correoEmp);                   //SMTP username
    $mail->Password   = 'tiger2022**';                  //SMTP password
    $mail->SMTPSecure = 'tls';                          //Enable implicit TLS encryption
    $mail->Port       = 587;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Correos Remitente / Destinatario
    $mail->setFrom($correoEmp, 'Contacto Sitio Web TigerFood');
    $mail->addAddress($datos["email"]);
    $mail->addCC('staroffic@gmail.com', 'Correo Por Contacto de sitio Web');
 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = ($datos["asunto"]);
    $mail->CharSet = "UTF-8";
   
    $mail->Body    = ('<img  src="https://i.imgur.com/iHTU7Cg.png">'.'<br>'.
                        '<h3 style="color: #801C16">'.'Nuevo Contacto desde el sitio Web'.'</h3>'.'<br>'.
                        '<b>'.'<h4>'.'Nombre del Cliente : '.'</b>'.$datos["nombre"].'</h4>'.'<br>'.
                        '<b>' .'<h4>'.'Telefono: '.'</b>'. $datos["telefono"].'</h4>'.'<br>' . 
                        '<b>'.'<h4>'. 'Correo Electronico :  '.'</b>'. $datos["email"].'</h4>'.'<br>'.
                        '<b>'.'<h5>'. 'Mensaje : '. '</b>' . $datos["mensaje"] ).'</h5>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('location:index.php');
}     catch (Exception $e) {
       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



