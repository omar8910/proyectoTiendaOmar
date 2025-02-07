<?php

namespace Lib;

class Pages
{
    /*
     * Este metodo te crea tantas variables como le pases en un array y te carga las vistas de header y footer,
     * y entre ellas la vista que le indicaste.
     */
    public function render(string $pageName, array $params = null): void
    {
        if ($params != null) {
            foreach ($params as $name => $value) {
                $$name = $value;
            }
        }
        //dirname(__DIR__,1) es para subir un nivel en la jerarquía de directorios y añadimos /Views/ para que busque las vistas en la carpeta views
        $rutasVistas = dirname(__DIR__, 1) . "/Views/";


        require_once $rutasVistas . "Layout/header.php";
        require_once $rutasVistas . "$pageName.php";
        require_once $rutasVistas . "Layout/footer.php";
    }
}
