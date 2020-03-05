<?php

    class Equipo Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            $equipo = $this->model->get();
            $this->view->datos = $equipo;
            
            $this->view->render('equipo/index');
        }

        function create() {

            if (!isset($this->view->equipo)) $this->view->equipo = null;

            $this->view->render('equipo/create/index');

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