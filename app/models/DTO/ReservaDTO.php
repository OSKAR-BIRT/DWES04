<?php
namespace app\models\DTO;

use JsonSerializable;

// Tiene que ser Serializable
// No nos interesa encapsular todos los dato contenidos en la base de datos
// No va a tener setters

class ReservaDTO implements JsonSerializable {
    private $id_reserva;
    private $nombre;
    private $fecha;
    private $hora;

    public function __construct($id_reserva, $nombre, $fecha, $hora) {
        $this->id_reserva = $id_reserva;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    public function jsonSerialize(): mixed  {
        return get_object_vars($this);
    }

    



    /**
     * Set the value of id_reserva
     */
    public function setIdReserva($id_reserva): self
    {
        $this->id_reserva = $id_reserva;

        return $this;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Set the value of hora
     */
    public function setHora($hora): self
    {
        $this->hora = $hora;

        return $this;
    }
}






