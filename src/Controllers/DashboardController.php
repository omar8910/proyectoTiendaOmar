<?php

namespace Controllers;
use Lib\Pages;
use Controllers\ProductoController;
use Controllers\CategoriaController;

class DashboardController{
    
    private Pages $pages;
    private ProductoController $productoController;
    private CategoriaController $categoriaController;   
    
    function __construct(){

        $this->pages = new Pages();
        $this->productoController = new ProductoController();
        $this->categoriaController = new CategoriaController();
    }

    public function index(): void{
        $productos = $this->productoController->obtenerProductosAlAzar();
        $categorias = $this->categoriaController->obtenerTodasCategorias();
        
        $this->pages->render('Dashboard/index', ['productos' => $productos, 'categorias' => $categorias]);
    }
}