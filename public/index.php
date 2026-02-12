<?php

declare(strict_types=1);

// require_once __DIR__ . '/../vendor/autoload.php';
// require_once __DIR__ . '/../config/config.php';

// require_once __DIR__ . '/../core/router.php';
// require_once __DIR__ . '/../app/controllers/booking.php';
// require_once __DIR__ . '/../app/controllers/home.php';
// require_once __DIR__ . '/../app/utils/csvDataHandle.php';
// require_once __DIR__ . '/../app/models/reserva.php';

spl_autoload_register(function ($clase) {
    // 1. Definimos la carpeta raíz de tu proyecto (un nivel arriba de /public)
    $base_dir = dirname(__DIR__) . '/';

    // 2. Convertimos los namespaces (App\core\Database) en rutas (App/core/Database.php)
    // Cambiamos las barras invertidas \ por barras normales /
    $archivo = $base_dir . str_replace('\\', '/', $clase) . '.php';

    // 3. Si el archivo existe, lo cargamos
    if (file_exists($archivo)) {
        require_once $archivo;
    }
});

use app\controllers\Booking;
use app\controllers\Home;
use core\Router;
use app\utils\csvDataHandle;


$router = new Router();

$router->add('', array(
        'controller' => 'Home',
        'action' => 'index'
    )
);

$router->add('booking', array(
        'controller' => 'Booking',
        'action' => 'index'
    )
);

$router->add('booking/onebooking/{id}', array(
        'controller' => 'Booking',
        'action' => 'onebooking'
    )
);

$router->add('booking/append', array(
        'controller' => 'Booking',
        'action' => 'append'
    )
);

$router->add('booking/modify/{id}', array(
        'controller' => 'Booking',
        'action' => 'modify'
    )
);

$router->add('booking/delete/{id}', array(
        'controller' => 'Booking',
        'action' => 'delete'
    )
);


// Leemos la URI, y a partir de ese resultado nos cojemos
// la ruta relativa usando la funcion rutaRelativa()
$url = rutaRelativa($_SERVER['REQUEST_URI']);
$urlParams = explode('/', $url);

// Generamos el urlArray con datos sin rellenar
$urlArray = array(
    'HTTP' => $_SERVER['REQUEST_METHOD'],
    'path' => $url,
    'controller' => '',
    'action' => '',
    'params' => ''
);

// Rellenamos los valores de controller, action y params
// de $urlArray dependiendo del contenido de $urlParams,
// que depende de la ruta relativa introducida
if (!empty($urlParams[0])) {
    $urlArray['controller'] = ucwords($urlParams[0]);
    if (!empty($urlParams[1])) {
        $urlArray['action'] = $urlParams[1];
        if (!empty($urlParams[2])) {
            $urlArray['params'] = $urlParams[2];
        }
    } else {
        $urlArray['action'] = 'index';
    }
} else {
    $urlArray['controller'] = 'Home';
    $urlArray['action'] = 'index';
}

$router->matchRoutes($urlArray);

$method = $_SERVER['REQUEST_METHOD'];

$params = [];

if ($method === 'GET')  {
    $params[] = $urlArray['params'];
} elseif ($method === 'POST') {
    $json = file_get_contents('php://input');
    $params[] = $json;
} elseif ($method === 'PUT') {
    $id = $urlArray['params'];
    $json = file_get_contents('php://input');
    $params[] = $id;
    $params[] = json_decode($json, true);
} elseif ($method === 'DELETE') {
    $params[] = $urlArray['params'];
}



$controller = $router->getParams()['controller'];
$action = $router->getParams()['action'];


if ($controller == "Home") {
    $controller = new Home();
    if ($action == "index") {
        $controller->index();
    } else {
        $controller->error404();
    }
} elseif ($controller == "Booking") {
    $controller = new Booking();
    if ($action == "onebooking") {
        $controller->onebooking($params);
    } elseif ($action == "index") {
        $controller->index();
    } elseif ($action == "delete") {
        $controller->delete($params);
    } elseif ($action == "append") {
        $controller->append($params);
    } elseif ($action == "modify") {
        $controller->modify($params);
    }
}


// Función a la que le pasamos la uri de la llamada y nos devuelve lo que hay
// después de public/
function rutaRelativa ($uri) {
    $ruta ="";
    $ancla = 'public/';
    $posicionAncla = strpos($uri, $ancla);
    if ($posicionAncla !== false) {
        $ruta = substr($uri, $posicionAncla + strlen($ancla));
    }
    return $ruta;
}
