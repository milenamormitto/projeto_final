<?php
$base_url = "dbcatalogo3e2guilherme.42web.io/index.php";
    $controlador_padrao = 'Home';
    $controller = ucfirst($_GET['c'] ?? $controlador_padrao);
    $path_controller = "controller/$controller.php";

    
    if (file_exists($path_controller)) {
        require $path_controller;

        $metodo = $_GET['m'] ?? "index";

        $obj = new $controller();

        $id = $_GET['id'] ?? null;

        if (is_callable(array($obj, $metodo))) {
            // echo "Existe a função <br>";
            call_user_func_array(array($obj, $metodo), array($id));
        }
    }

function base_url()
{
    global $base_url;
    return $base_url;
}