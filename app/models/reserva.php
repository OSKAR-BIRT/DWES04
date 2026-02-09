<?php
namespace app\models;

use JsonSerializable;

class Reserva implements JsonSerializable {
    protected $id;
    protected $usuario;
    protected $fecha;
    protected $hora;
    protected $intervalo;
    protected $periodo;
    protected $precio;
    protected $pagado;

    function __construct($id, $usuario, $fecha, $hora, $intervalo, $periodo, $precio, $pagado) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->intervalo = $intervalo;
        $this->periodo = $periodo;
        $this->precio = $precio;
        $this->pagado = $pagado;
    }

    public function jsonSerialize(): mixed
    {
        return [
        "id" => $this->id,
        "usuario" => $this->usuario,
        "fecha" => $this->fecha,
        "hora" => $this->hora,
        "intervalo" => $this->intervalo,
        "periodo" => $this->periodo,
        "precio" => $this->precio,
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
     * Get the value of periodo
     */ 
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set the value of periodo
     *
     * @return  self
     */ 
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get the value of intervalo
     */ 
    public function getIntervalo()
    {
        return $this->intervalo;
    }

    /**
     * Set the value of intervalo
     *
     * @return  self
     */ 
    public function setIntervalo($intervalo)
    {
        $this->intervalo = $intervalo;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

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