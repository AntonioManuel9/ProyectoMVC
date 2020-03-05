<?php

    class Categorias Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            session_start();

            $this->view->render('categorias/index');
        }
    }

?>