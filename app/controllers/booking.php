<?php

namespace app\controllers;

use app\utils\CsvDataHandle;

class Booking {


    function __construct() {
       
    }

    function index() {
        $dataHandle = new CsvDataHandle("booking.csv");
        $listado = $dataHandle->readBooking();
        $json = json_encode($listado);
        echo $json;
    }

    public function onebooking($params) {
        $id = $params[0];
        $dataHandle = new CsvDataHandle("booking.csv");
        $reservaBuscada = "";
        $reservaEncontrada = false;
        $listado = $dataHandle->readBooking();
        foreach($listado as $reservaIndividual) {
            if ($reservaIndividual->getId() == $id) {
                $reservaBuscada = json_encode($reservaIndividual);
                echo $reservaBuscada;
                $reservaEncontrada = true;
            }
        }
        if (!$reservaEncontrada) {
            echo "La reserva con id " . $id . " no está en el sistema.";
        }
    }

    public function delete($params) {
        $id = $params[0];
        $dataHandle = new CsvDataHandle("booking.csv");
        $reservaBuscada = "";
        $reservaEncontrada = false;
        $listado = $dataHandle->readBooking();
        foreach($listado as $posicion => $laReserva) {
            if ($laReserva->getId() == $id) {
                unset($listado[$posicion]);
                $reservaEncontrada = true;
            }
        }
        if ($reservaEncontrada) {
            echo "La reserva con id " . $id . " está en el sistema. Se puede borrar.";
        } else {
            echo "La reserva con id " . $id . " no está en el sistema.";
        }
    }

    function append($params) {
        $json = $params[0];
        $data = json_decode($json, true);
        echo 'Hola desde el método append de BOOKING Controller con nombre ' . $data['nombre'] . '<br>';
    }

    function modify($params) {
        $id = $params[0];
        $json = $params[1];
        echo 'Hola desde el método modify de BOOKING Controller ID = ' . $id . ' <br>';
    }

}    








?>