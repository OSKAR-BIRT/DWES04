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
        $reservaDAO = new ReservaDAO();
        $reservas = $reservaDAO->eliminarReserva($params[0]);
        // echo json_encode($reservas);
    }

    function append($params) {
        $json = $params[0];
        $data = json_decode($json, true);
        $reservaDAO = new ReservaDAO();
        $reservas = $reservaDAO->crearReserva($data);
    }

    function modify($params) {
        $reservaDAO = new ReservaDAO();
        $reservas = $reservaDAO->actualizarReserva($params[0], $params[1]);
    }

}    








?>