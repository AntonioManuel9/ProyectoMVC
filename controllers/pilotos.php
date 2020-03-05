<?php

    class Pilotos Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            session_start();

            $pilotos = $this->model->get();
            $this->view->datos = $pilotos;
            $this->view->cabecera = $this->model->cabeceraTabla();

            $this->view->render('pilotos/index');
        }

    }

?>