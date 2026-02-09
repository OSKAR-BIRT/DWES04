<?php

namespace app\controllers;

class Home {


    function __construct() {
      
    }

    function index() {
        echo "<h1>SISTEMA DE RESERVAS DEL TXOKO</H1>";
        echo "<p> Esta página no devuelve ningun resultado";
    }

    function error404() {
        echo "<h1>SISTEMA DE RESERVAS DEL TXOKO</H1>";
        echo "<p> Código 404 - Pagina inesistente. Pruebe con otra URL";
    }
}    








?>