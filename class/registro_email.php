<?php

   # PHP Mailer
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/SMTP.php';
   
    Class registro_email extends PHPMailer {

        function __construct($name, $email, $pass) {

            parent::__construct();

            # Propiedades de mi clase email
            $this->destinatario = $email;
            $this->asunto ="Registro en la web Gestión Rally";
            
            # Cuerpo del mensaje
            $this->mensaje = "
            <p>Hola $name:</p>
            <p>Le comunicamos que su registro en nuestra aplicación ha sido exitoso. A continuación le mostramos sus datos: </p>
            <ul>
                <li>Nombre de usuario: $name </li>
                <li>Correo Electrónico:  $email </li>
                <li>Password: $pass</li>
            </ul>
            <p>Departamento de administración.</b></p>
            ";


            # configuración resto de parámetros
            $this->CharSet = "UTF-8";
            $this->Encoding = "quoted-printable";

            $this->SMTPDebug = false;
            $this->do_debug = 0;
            $this->isSMTP(); 

            //Server settings smtp gthis
            //Nos vamos a el perfil de la cuenta de gthis
            //Activamos la opción de seguridad autentificación a 2 pasos
            //Generamos una contraseña Temporal
            //Dicha contraseña la pegamos en la propiedad Password
            
            $this->Username = 'alum.antonio.ramirez.delarosa@ieslosremedios.org';                
            $this->Password = 'njgqnrhjajjhlagv'; 

            $this->SMTPDebug = 0; 
            $this->SMTPSecure = 'tls'; 
            $this->Host = 'smtp.gmail.com'; 
            $this->Port = 587;                               
                                                
            $this->SMTPAuth = true;   

        }

        function enviar_email() {

            $this->setFrom ($this->destinatario); 
            $this->addAddress ($this->destinatario); 
            $this->Subject = $this->asunto;
            $this->isHTML(true);

            $this->Body = $this->mensaje;

            $mensaje = null;
            try {
                $this->send(); 

            } 	catch (Exception $e) {

                $mensaje='Message could not be sent. thiser Error: '. $this->ErrorInfo;

            }

            return $mensaje;


        }
    }
?>