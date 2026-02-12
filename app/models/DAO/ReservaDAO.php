<?php
namespace app\models\DAO;

// require_once __DIR__ . "/../../core/databaseSingleton.php";
// require_once __DIR__ . "/../DTO/ReservaDTO.php";

use core\DatabaseSingleton;
use PDO;
use app\models\DTO\ReservaDTO;


class ReservaDAO {

    private $db;

    public function __construct() {
        $this->db = DatabaseSingleton::getInstance();
        
    }

    // ******************************
    // * OBTENER TODAS LAS RESERVAS *
    // ******************************
    public function obtenerReservas(){
        $conection = $this->db->getConnection();
        $query = "SELECT * FROM reservas JOIN usuarios ON reservas.id_usuario = usuarios.id_usuario";
        $statement = $conection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        // return $result;

        $reservasDTO = array();

        for ($i=0; $i<count($result); $i++) {
            $fila = $result[$i];
            $reservaDTO = new ReservaDTO(
                $fila['id_reserva'],
                $fila['nombre'],
                $fila['fecha'],
                $fila['hora']
            );
            $reservasDTO[] = $reservaDTO;
        }
        return $reservasDTO;
    }



    // ***************************
    // * OBTENER RESERVAS POR ID *
    // ***************************
    public function obtenerReservaPorID($id){
        $conection = $this->db->getConnection();
        $query = "SELECT * FROM reservas JOIN usuarios ON reservas.id_usuario = usuarios.id_usuario WHERE reservas.id_reserva = {$id}";
        $statement = $conection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        // return $result;

        $reservasDTO = array();

        for ($i=0; $i<count($result); $i++) {
            $fila = $result[$i];
            $reservaDTO = new ReservaDTO(
                $fila['id_reserva'],
                $fila['nombre'],
                $fila['fecha'],
                $fila['hora']
            );
            $reservasDTO[] = $reservaDTO;
        }
        return $reservasDTO;
    }



    // ****************************
    // * AÑADIR UNA NUEVA RESERVA *
    // ****************************
    public function crearReserva($datosReserva){
        $conection = $this->db->getConnection();
        $query = "INSERT INTO reservas (id_usuario, fecha, hora) VALUES ('$datosReserva[0]', $datosReserva[1], $datosReserva[2])";
        $statement = $conection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    // ***********************************
    // * ACTUALIZAR DATOS DE UNA RESERVA *
    // ***********************************
    public function actualizarReserva($id, $datosReserva){
        $conection = $this->db->getConnection();
        $query = "UPDATE reservas SET id_usuario = '{$datosReserva[0]}', fecha = {$datosReserva[1]}, hora = {$datosReserva[2]} WHERE reservas.id_reserva = {$id}";
        $statement = $conection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    // ************************
    // * ELIMINAR UNA RESERVA *
    // ************************
    public function eliminarReserva($id){
        $conection = $this->db->getConnection();
        $query = "DELETE FROM reservas WHERE reservas.id_reserva = {$id}";
        $statement = $conection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }





}




