<?php
namespace app\models;

use JsonSerializable;

class Reserva implements JsonSerializable {
    protected $id;
    protected $usuario;
    protected $fecha;
    protected $hora;
    protected $pagado;

    function __construct($id, $usuario, $fecha, $hora, $pagado) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->pagado = $pagado;
    }

    public function jsonSerialize(): mixed
    {
        return [
        "id" => $this->id,
        "usuario" => $this->usuario,
        "fecha" => $this->fecha,
        "hora" => $this->hora,
        "pagado" => $this->pagado
        ];
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of pagado
     */ 
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * Set the value of pagado
     *
     * @return  self
     */ 
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;

        return $this;
    }
}

?>