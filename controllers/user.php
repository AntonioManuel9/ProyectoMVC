<?php

    require_once("class/registro_email.php");

    class User Extends Controller {

        function __construct() {

            parent ::__construct();

        }

        function render() {
            $this->view->render('user/login/index');
        }


        function register() {
            $this->view->render('user/register/index');
        }

        function validar_acceso() {

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $errores = [];
            $user = $this->model->getUsuarioEmail($email);

        
            // var_dump($usuario);
            if (!empty($user)){
                $coincide = password_verify($pass, $user['password']);
                if(!$coincide){
                    $errores['password'] = "La contraseña está incorrecta.";
                }
                

            } else{
                $errores['email'] =  "El email no está registrado.";
            }


            if (!empty($errores)) {
                # Datos no validados
                $this->view->errores = $errores;
                $this->view->mensaje = "Errores en el formulario.";
                $this->view->user = $user;

                $this->render();
            } else {
                session_start();

                $_SESSION["id"] = $user['id'];
                $rol = $this->model->getRol($user['id']);

                $_SESSION['rol_id'] = $rol['role_id'];

                $_SESSION['rol_name'] = $rol['name'];
                $_SESSION['email'] = $email;
                $_SESSION["name"] = $user['name'];

                header('Location: ../coche');
            }


        }

        function editPassword($param = null){
            session_start();
            if (isset($_SESSION['id'])){
                $this->view->render('user/editPassword/index');
            } else {
                
            }
        }

        function validar_editPassword($param = null){
            session_start();
            if (isset($_SESSION['id'])){
                $pass_antigua = filter_var($_POST['password_antigua'], FILTER_SANITIZE_STRING);
                $pass1 = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                $pass2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
                


                $user = $this->model->getUsuario($_SESSION['id']);

                if (empty($pass_antigua)) {
                    $errores['password_antigua'] = "Campo obligatorio";
                }
                if (empty($pass1)) {
                    $errores['password'] = "Campo obligatorio";
                }
                if (empty($pass2)) {
                    $errores['password2'] = "Campo obligatorio";
                }
                if ($pass1 != $pass2){
                    $errores['password'] = "Las contraseñas no son iguales.";
                }
    

                $coincide = password_verify($pass_antigua, $user['password']);
                if(!$coincide){
                    $errores['password_antigua'] = "La contraseña está incorrecta.";
                }

                if (!empty($errores)) {
                
                    # Datos no validados
                    $this->view->errores = $errores;
                    $this->view->mensaje = ["Errores en el formulario.", 'danger'];
                    $this->view->render('user/editPassword/index');
    
                    
                } else {
    
                    $mensaje = $this->model->updateEditPassword($_SESSION['id'], $pass1);
                    $this->view->mensaje = $mensaje;
    
                    $this->view->render('user/editPassword/index');
                    
                } 

            }
            
        }

        function editPerfil($param=null) {
            session_start();
            if(isset($_SESSION['id'])){
                $this->view->name = $_SESSION['name'];
                $this->view->email = $_SESSION['email'];

                $this->view->render('user/editPerfil/index');

            }
        }

        function validar_editPerfil(){
            session_start();
            if (isset($_SESSION['id'])){
                $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);

                if (empty($name)) {
                    $errores['nombre'] = "Campo obligatorio";
                }
                if (empty($email)) {
                    $errores['email'] = "Campo obligatorio";
                }
                $usuario = $this->model->getUsuarioEmail($email);
                if ($usuario != false && $usuario['id'] != $_SESSION['id']){
                    $errores['email'] = "Este Email ya está registrado.";
                }
                if (!empty($errores)) {
                
                    # Datos no validados
                    $this->view->errores = $errores;
                    $this->view->mensaje = ["Errores en el formulario.", 'danger'];
                    $this->view->name = $name;
                    $this->view->email = $email;
                    // var_dump($errores);
                    // exit(0);
                    $this->view->render('user/editPerfil/index');
    
                    
                } else {
                    $mensaje = $this->model->updateEditUser($_SESSION['id'], $name, $email);
                    $this->view->mensaje = $mensaje;
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $this->view->name = $name;
                    $this->view->email = $email;
                    $this->view->render('user/editPerfil/index');

                }
            }
        }

        function validar_registro(){
            
            $name = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $pass1 = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $pass2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            
            $user = [
                'nombre' => $name,
                'email' => $email,
                'password' => $pass1
            ];

            $errores = array();

            if (empty($user['nombre'])) {
                $errores['nombre'] = "Campo obligatorio";
            }

            if (empty($user['email'])) {
                $errores['email'] = "Campo obligatorio";
            } elseif ($this->model->getUsuarioEmail($email) != false){
                $errores['email'] = "Este Email ya está registrado.";
            }

            if (empty($user['password'])) {
                $errores['password'] = "Campo obligatorio";
            }
            if ($pass1 != $pass2){
                $errores['password'] = "Las contraseñas no son iguales.";
            }

            if (!empty($errores)) {
                
                # Datos no validados
                $this->view->errores = $errores;
                $this->view->mensaje = "Errores en el formulario.";
                $this->view->user = $user;

                $this->register();

                
            } else {

                # La función insert devuelve el mensaje resultante de añadir el registro
                $mensaje=$this->model->insert($user);
                $user = $this->model->getUsuarioEmail($email);
                $this->model->insertRol($user['id'], 1);
                
                $email = new registro_email($_POST['nombre'], $_POST['email'], $_POST['password']);
                $email->enviar_email();
                
                $this->view->mensaje = $mensaje;

                $this->render();
                
            } 


        }

        function logout(){
            if (!isset($_SESSION)){
                session_start();
            }
            setcookie("PHPSESSID", "", time() - 3600, "/");
            unset($_SESSION);
            session_unset();
            session_destroy();
            $this->view->render('user/login/index');

        }

        function eliminarPerfil() {
            session_start();
            $this->model->eliminarPerfil($_SESSION['id']);
            $this->view->mensaje = "Perfil eliminado correctamente";
            $this->logout();
        }


    }