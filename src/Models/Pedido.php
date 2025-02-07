<?php
namespace Models;
use Lib\BaseDatos;

class Pedido{
    private int $id;
    private int $usuario_id;
    private string $provincia;
    private string $localidad;
    private string $direccion;
    private float $coste;
    private string $estado;
    private string $fecha;
    private string $hora;
    private BaseDatos $BaseDatos;

    public function __construct(
        int $id = null,
        int $usuario_id = null,
        int $provincia = null,
        string $localidad = null,
        string $direccion = null,
        float $coste = null,
        string $estado = null,
        string $fecha = null,
        string $hora = null
    ){
        $this->id = $id;
        $this->usuario_id = $usuario_id;
        $this->provincia = $provincia;
        $this->localidad = $localidad;
        $this->direccion = $direccion;
        $this->coste = $coste;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->BaseDatos = new BaseDatos();
    }

    // Getters

    public function getId(): int{
        return $this->id;
    }

    public function getUsuarioId(): int{
        return $this->usuario_id;
    }


    public function getProvincia(): string{
        return $this->provincia;
    }


    public function getLocalidad(): string{
        return $this->localidad;
    }


    public function getDireccion(): string{
        return $this->direccion;
    }


    public function getCoste(): float{
        return $this->coste;
    }


    public function getEstado(): string{
        return $this->estado;
    }


    public function getFecha(): string{
        return $this->fecha;
    }


    public function getHora(): string{
        return $this->hora;
    }


    // Setters

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setUsuarioId(int $usuario_id): void{
        $this->usuario_id = $usuario_id;
    }

    public function setProvincia(string $provincia): void{
        $this->provincia = $provincia;
    }

    public function setLocalidad(string $localidad): void{
        $this->localidad = $localidad;
    }


    public function setDireccion(string $direccion): void{
        $this->direccion = $direccion;
    }

    public function setCoste(float $coste): void{
        $this->coste = $coste;
    }

    public function setEstado(string $estado): void{
        $this->estado = $estado;
    }

    public function setFecha(string $fecha): void{
        $this->fecha = $fecha;
    }

    public function setHora(string $hora): void{
        $this->hora = $hora;
    }
}

?>