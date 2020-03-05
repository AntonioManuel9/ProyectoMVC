<?php

    class Carrera Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            $carrera = $this->model->get();
            $this->view->datos = $carrera;
            
            $this->view->render('carrera/index');
        }

        function create() {

            if (!isset($this->view->carrera)) $this->view->carrera = null;

            $this->view->render('carrera/create/index');

        }

        function edit() {
            echo "Controlador asociado al método Edit Equipo";
            exit(0);
        }

        function delete() {
            echo "Controlador asociado al método Delete";
            exit(0);
        }
    }
?>