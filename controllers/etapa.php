<?php

    class Etapa Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            session_start();

            $etapa = $this->model->get();
            $this->view->datos = $etapa;
            $this->view->cabecera = $this->model->cabeceraTabla();
            
            $this->view->render('etapa/index');
        }
    }
?>