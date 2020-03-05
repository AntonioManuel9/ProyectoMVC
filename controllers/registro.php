<?php

    class Registro Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            session_start();

            $registro = $this->model->get();
            $this->view->datos = $registro;
            
            $this->view->render('registro/index');
        }

        function create() {

            if (!isset($this->view->registro)) $this->view->registro = null;

            $this->view->render('registro/create/index');

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