<?php
namespace Models;
use Lib\BaseDatos;


class Producto{

    // Atributos
    private int $id;
    private int $id_categoria;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private int $stock;
    private string $imagen;
    private string $oferta;
    private string $fecha; // La fecha tiene el formato "Y-m-d" en PHPMyAdmin
    private BaseDatos $BaseDatos;

    // Constructor
    public function __construct(
        // Los valores por defecto son null para que no haya problemas al crear un objeto sin parámetros
        int $id = null,
        int $id_categoria = null,
        string $nombre  = null,
        string $descripcion = null,
        float $precio = null,
        int $stock = null,
        string $imagen = null,
        string $oferta = null,
        string $fecha = null
    ){
        $this->id = $id;
        $this->id_categoria = $id_categoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->imagen = $imagen;
        $this->oferta = $oferta;
        $this->fecha = $fecha;
        $this->BaseDatos = new BaseDatos();
    }

    // Getters
    public function getId(): int{
        return $this->id;
    }

    public function getIdCategoria(): int{
        return $this->id_categoria;
    }

    public function getNombre(): string{
        return $this->nombre;
    }

    public function getDescripcion(): string{
        return $this->descripcion;
    }

    public function getPrecio(): float{
        return $this->precio;
    }

    public function getStock(): int{
        return $this->stock;
    }

    public function getImagen(): string{
        return $this->imagen;
    }

    public function getOferta(): string{
        return $this->oferta;
    }

    public function getFecha(): string{
        return $this->fecha;
    }

    // Setters

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setIdCategoria(int $id_categoria): void{
        $this->id_categoria = $id_categoria;
    }

    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }

    public function setDescripcion(string $descripcion): void{
        $this->descripcion = $descripcion;
    }

    public function setPrecio(float $precio): void{
        $this->precio = $precio;
    }

    public function setStock(int $stock): void{
        $this->stock = $stock;
    }

    public function setImagen(string $imagen): void{
        $this->imagen = $imagen;
    }

    public function setOferta(string $oferta): void{
        $this->oferta = $oferta;
    }

    public function setFecha(string $fecha): void{
        $this->fecha = $fecha;
    }
}



?>