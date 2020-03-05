<?php

    class Registro Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            session_start();

            $registro = $this->model->get();
            $this->view->datos = $registro;
            $this->view->cabecera = $this->model->cabeceraTabla();
            
            $this->view->render('registro/index');
        }

    }
?>