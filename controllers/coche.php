<?php

    class Coche Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            $coche = $this->model->get();
            $this->view->datos = $coche;
            $this->view->cabecera = $this->model->cabeceraTabla();
            
            $this->view->render('coche/index');
        }

        function create() {

            $this->view->equipos = $this->model->getEquipos();

            if (!isset($this->view->coche)) $this->view->coche = null;
          
            $this->view->render('coche/create/index');

        }

        function edit($param) {
            $this->view->equipos = $this->model->getEquipos();
            $this->view->id = $param[0];
            $this->view->coche = $this->model->getCoche($this->view->id);
            $this->view->coche["id"] = $param[0];
            $this->view->render('coche/edit/index');
        }

        function show($param = null) {
            $this->view->equipos = $this->model->getEquipos();
            $this->view->id = $param[0];
            $this->view->coche = $this->model->getCoche($param[0]);
            $this->view->coche["id"] = $param[0];

            if (!isset($this->view->coche)) $this->view->coche = null;
            $this->view->render('coche/show/index');
        }

        function registrar() {
            # Sanear datos $_POST del formulario

            $coche = 
            [
                'equipo_id'     => filter_var($_POST['equipo_id'], FILTER_SANITIZE_STRING),
                'marca'    => filter_var($_POST['marca'], FILTER_SANITIZE_STRING),
                'modelo'    => filter_var($_POST['modelo'], FILTER_SANITIZE_STRING),
                'cilindrada'           => filter_var($_POST['cilindrada'], FILTER_SANITIZE_STRING)
                
            ];

            # Validar datos del formulario

            $errores = array();

            # Validar marca
            if (empty($coche['marca'])) {
                $errores['marca'] = "Campo obligatorio";
            } else if (!filter_var($coche['marca'], FILTER_SANITIZE_STRING)) {
                $errores['marca'] = "Valor no permitido";

            }

            # Validar modelo
            if (empty($coche['modelo'])) {
                $errores['modelo'] = "Campo obligatorio";
            } else if (!filter_var($coche['modelo'], FILTER_SANITIZE_STRING)) {
                $errores['modelo'] = "Valor no permitido";

            }

            # Validar equipo_id con rango
            $options = array(
                'options' => array(
                    'min_range' => 1,
                    'max_range' => 10,
                )
            );
            
            if (!filter_var($coche['equipo_id'], FILTER_VALIDATE_INT, $options)) {
                $errores['equipo_id'] = "Valor fuera de rango";
            }

            # Comprobamos antes si ha ocurrido algún error en la subida de archivo

            $FileUploadErrors = array(
                0 => 'No hay error, fichero subido con éxito.',
                1 => 'El fichero subido excede la directiva upload_max_filesize de php.ini.',
                2 => 'El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.',
                3 => 'El fichero fue sólo parcialmente subido.',
                4 => 'No se subió ningún fichero.',
                6 => 'Falta la carpeta temporal.',
                7 => 'No se pudo escribir el fichero en el disco.',
                8 => 'Una extensión de PHP detuvo la subida de ficheros.',
            );

            if (!empty($errores)) {
                
                # Datos no validados
                $this->view->errores = $errores;
                $this->view->mensaje = "Errores en el formulario.";
                $this->view->coche = $coche;
                $this->create();

                
            } else {
        
                # La función insert devuelve el mensaje resultante de añadir el registro
                $mensaje=$this->model->insert($coche);
                
                $this->view->mensaje = $mensaje;
                $this->render();
                
            } 
        }

        function updateCoche() {
            # Sanear datos $_POST del formulario

            $coche = 
            [
                'id'     => $_POST['id'],
                'equipo_id'     => filter_var($_POST['equipo_id'], FILTER_SANITIZE_STRING),
                'marca'    => filter_var($_POST['marca'], FILTER_SANITIZE_STRING),
                'modelo'    => filter_var($_POST['modelo'], FILTER_SANITIZE_STRING),
                'cilindrada'           => filter_var($_POST['cilindrada'], FILTER_SANITIZE_STRING)
                
            ];


            if (empty($coche['id'])) {
                $errores['id'] = "No recoge el ID";
            }
            # Validar datos del formulario

            $errores = array();

            # Validar marca
            if (empty($coche['marca'])) {
                $errores['marca'] = "Campo obligatorio";
            } else if (!filter_var($coche['marca'], FILTER_SANITIZE_STRING)) {
                $errores['marca'] = "Valor no permitido";

            }

            # Validar modelo
            if (empty($coche['modelo'])) {
                $errores['modelo'] = "Campo obligatorio";
            } else if (!filter_var($coche['modelo'], FILTER_SANITIZE_STRING)) {
                $errores['modelo'] = "Valor no permitido";

            }

            # Validar equipo_id con rango
            $options = array(
                'options' => array(
                    'min_range' => 1,
                    'max_range' => 10,
                )
            );
            
            if (!filter_var($coche['equipo_id'], FILTER_VALIDATE_INT, $options)) {
                $errores['equipo_id'] = "Valor fuera de rango";
            }

            # Comprobamos antes si ha ocurrido algún error en la subida de archivo

            $FileUploadErrors = array(
                0 => 'No hay error, fichero subido con éxito.',
                1 => 'El fichero subido excede la directiva upload_max_filesize de php.ini.',
                2 => 'El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.',
                3 => 'El fichero fue sólo parcialmente subido.',
                4 => 'No se subió ningún fichero.',
                6 => 'Falta la carpeta temporal.',
                7 => 'No se pudo escribir el fichero en el disco.',
                8 => 'Una extensión de PHP detuvo la subida de ficheros.',
            );

            if (!empty($errores)) {
                
                # Datos no validados
                $this->view->errores = $errores;
                $this->view->mensaje = "Errores en el formulario.";
                $this->view->coche = $coche;
                $this->edit();

                
            } else {
        
                # La función insert devuelve el mensaje resultante de añadir el registro
                $mensaje=$this->model->update($coche);
                
                $this->view->mensaje = $mensaje;
                $this->render('coche/index');
                
            } 
        }

        function delete($param) {
            $this->model->delete($param[0]);
            
            $coche = $this->model->get();
            $this->view->datos = $coche;

            $this->view->cabecera = $this->model->cabeceraTabla();
            
            $this->view->render('coche/index');
        }

    }
?>