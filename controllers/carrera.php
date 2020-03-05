<?php

    class Carrera Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            session_start();

            $carrera = $this->model->get();
            $this->view->datos = $carrera;
            $this->view->cabecera = $this->model->cabeceraTabla();
            
            $this->view->render('carrera/index');
        }
    }
?>