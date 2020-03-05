<?php

    class Pilotos Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            $pilotos = $this->model->get();
            $this->view->datos = $pilotos;
            

            $this->view->render('pilotos/index');
        }

        function create() {

            $this->view->pilotos =  $this->model->getEquipos();

            if (!isset($this->view->pilotos)) $this->view->pilotos = null;

            $this->view->render('pilotos/create/index');

        }

        function edit() {
            echo "Controlador asociado al método Edit";
            exit(0);
        }

        function delete() {
            echo "Controlador asociado al método Delete";
            exit(0);
        }

        function registrar() {
            # Sanear datos $_POST del formulario

            $articulo = 
            [
                'descripcion'     => filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING),
                'precio_costo'    => filter_var($_POST['precio_costo'], FILTER_SANITIZE_NUMBER_FLOAT),
                'precio_venta'    => filter_var($_POST['precio_venta'], FILTER_SANITIZE_NUMBER_FLOAT),
                'stock'           => filter_var($_POST['stock'], FILTER_SANITIZE_NUMBER_INT),
                'categoria_id'    => filter_var($_POST['categoria_id'], FILTER_SANITIZE_NUMBER_INT),
                'imagen'          => $_FILES['imagen']
                
            ];


            # Validar datos del formulario

            $errores = array();

            # Valiar descripción
            if (empty($articulo['descripcion'])) {
                $errores['descripcion'] = "Campo obligatorio";
            }

            # Validar precio_costo
            if (empty($articulo['precio_costo'])) {
                $errores['precio_costo'] = "Campo obligatorio";
            } else if (!filter_var($articulo['precio_costo'], FILTER_VALIDATE_FLOAT)) {
                $errores['precio_costo'] = "Valor no permitido";

            }

            # Validar precio_venta
            if (empty($articulo['precio_venta'])) {
                $errores['precio_venta'] = "Campo obligatorio";
            } else if (!filter_var($articulo['precio_venta'], FILTER_VALIDATE_FLOAT)) {
                $errores['precio_venta'] = "Valor no permitido";

            }

            # Validar stock con rango
            $options = array(
                'options' => array(
                    'min_range' => 0,
                    'max_range' => 1000,
                )
            );
            
            if (!filter_var($articulo['stock'], FILTER_VALIDATE_INT, $options)) {
                $errores['stock'] = "Valor fuera de rango";

            }

            # Validar categoria_id con rango
            $options = array(
                'options' => array(
                    'min_range' => 1,
                    'max_range' => 10,
                )
            );
            
            if (!filter_var($articulo['categoria_id'], FILTER_VALIDATE_INT, $options)) {
                $errores['categoria_id'] = "Valor fuera de rango";
            }

            # Validar imagen jpg, gif, png


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
                $this->view->articulo = $articulo;
                $this->create();

                
            } else {
        
                # La función insert devuelve el mensaje resultante de añadir el registro
                $mensaje=$this->model->insert($articulo);
                
                $this->view->mensaje = $mensaje;
                $this->render();
                
            } 
        }
    }

?>