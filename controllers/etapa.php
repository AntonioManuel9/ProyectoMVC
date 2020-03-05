<?php

    class Etapa Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            session_start();

            $etapa = $this->model->get();
            $this->view->datos = $etapa;
            
            $this->view->render('etapa/index');
        }

        function create() {

            if (!isset($this->view->etapa)) $this->view->etapa = null;

            $this->view->render('etapa/create/index');

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