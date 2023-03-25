<?php

namespace App {

    use Controllers\ErrorController;

    class Router
    {
        public $getRoutes = [];
        public $postRoutes = [];

        public function get($url, $function)
        {
            $this->getRoutes[$url] = $function;
        }

        public function post($url, $function)
        {
            $this->postRoutes[$url] = $function;
        }

        public function checkRoutes()
        {

            session_start();

            $auth = $_SESSION['login'] ?? NULL;

            // Arreglo de rutas protegidas
            $protected_routes = ['/admin'];

            // Si no existe la url actual se le asigne una /
            // SERVIDOR INTEGRADO DEL SERVIDOR $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
            $currentUrl = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];

            $method = $_SERVER['REQUEST_METHOD'];

            if ($method === 'GET') {
                // Almacena la url actual en el array
                $function = $this->getRoutes[$currentUrl] ?? null;
            } else {
                $function = $this->postRoutes[$currentUrl] ?? null;
            }

            if(in_array($currentUrl, $protected_routes) && !$auth){
                header('Location: /');
            }

            if ($function) {
                // La URL existe y hay una funcion asociada.
                call_user_func($function, $this);
            } else {
                // echo "La pagina no existe";
                $error = new ErrorController;
                $error->error404($this);
            }
        }

        // Muestra una vista
        public function render($view, $data = [])
        {
            foreach ($data as $key => $value) {
                // variable de variale como no sabemos los nombres de las variables mantiene el nombre y no pierde su valor
                $$key = $value;
            }

            // Alamcena los datos en memoria
            ob_start();

            include __DIR__ . "/views/$view.php";

            // Limpiamos la memoria
            $content = ob_get_clean();

            include __DIR__ . "/views/layout.php";
        }
    }
}
