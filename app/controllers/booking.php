<?php

namespace app\controllers;
// require_once __DIR__ . '/../models/DAO/ReservaDAO.php';

use app\utils\CsvDataHandle;
use app\models\DAO\ReservaDAO;

class Booking {


    function __construct() {
       
    }

    function index() {
        $reservaDAO = new ReservaDAO();
        $reservas = $reservaDAO->obtenerReservas();
        echo json_encode($reservas);
    }

    public function onebooking($params) {
        $reservaDAO = new ReservaDAO();
        $reservas = $reservaDAO->obtenerReservaPorID($params[0]);
        echo json_encode($reservas);
    }

    public function delete($params) {
        // $id = $params[0];
        // $dataHandle = new CsvDataHandle("booking.csv");
        // $reservaBuscada = "";
        // $reservaEncontrada = false;
        // $listado = $dataHandle->readBooking();
        // foreach($listado as $posicion => $laReserva) {
        //     if ($laReserva->getId() == $id) {
        //         unset($listado[$posicion]);
        //         $reservaEncontrada = true;
        //     }
        // }
        // if ($reservaEncontrada) {
        //     echo "La reserva con id " . $id . " está en el sistema. Se puede borrar.";
        // } else {
        //     echo "La reserva con id " . $id . " no está en el sistema.";
        // }
        $reservaDAO = new ReservaDAO();
        $reservas = $reservaDAO->eliminarReserva($params[0]);
        echo json_encode($reservas);
    }

    function append($params) {
        $json = $params[0];
        $data = json_decode($json, true);
        echo 'Hola desde el método append de BOOKING Controller' . '<br>';
    }

    function modify($params) {
        $id = $params[0];
        $json = $params[1];
        echo 'Hola desde el método modify de BOOKING Controller ID = ' . $id . ' <br>';
    }

}    








?>