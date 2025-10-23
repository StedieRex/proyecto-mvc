<?php
// Definir constante BASE_PATH
define('BASE_PATH', dirname(__DIR__));

// Cargar configuración
require_once BASE_PATH . '/app/config/config.php';

// Obtener la URL
$url = isset($_GET['url']) ? $_GET['url'] : 'book/index';
$url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));

// Determinar controlador y método
$controllerName = ucfirst($url[0]) . 'Controller';
$methodName = isset($url[1]) ? $url[1] : 'index';

// Si hay más parámetros (como ID para delete, show, etc.)
$params = array_slice($url, 2);

// Ruta del archivo del controlador
$controllerFile = BASE_PATH . '/app/controllers/' . $controllerName . '.php';

// Verificar si existe el controlador
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    
    // Verificar si existe la clase
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        
        // Verificar si existe el método
        if (method_exists($controller, $methodName)) {
            // Pasar parámetros si existen
            if (!empty($params)) {
                $controller->$methodName(...$params);
            } else {
                $controller->$methodName();
            }
        } else {
            http_response_code(404);
            echo "Error 404: Método '$methodName' no encontrado en $controllerName";
        }
    } else {
        http_response_code(404);
        echo "Error 404: Clase '$controllerName' no encontrada";
    }
} else {
    http_response_code(404);
    echo "Error 404: Controlador '$controllerName' no encontrado en: $controllerFile";
}
?>