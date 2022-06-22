<?php

/*1. L’instanciation de la classe `Router` depuis `📄 index.php` exécute le constructeur.
2. Le constructeur charge les routesdans l’attribut $routes puis exécute la méthode `routing()`.
3. La méthode `routing()` cherche si une route matche avec le paramètre `GET` ”page” 
et si un traitement y est bien associé (namespace, classe et méthodes existants).
Si c’est le cas, il instancie le controleur associé pour ensuite appeler la dite méthode.
*/
namespace Ghibli;

class Router {
    
    private $routes;

    public function __construct() {
        $this->routes = require_once './config/routes.php';
        $this->routing();
    }

    public function routing(): void {
        $availableRouteNames = array_keys($this->routes);
        //Si l'utilisateur appelle une route existante
        if (isset($_GET['page']) && in_array($_GET['page'], $availableRouteNames, true)) {
            $route = $this->routes[$_GET['page']];
            if (
                !isset($route['controller'])
                || !isset($route['method'])
                || !class_exists($route['controller'])
                || !method_exists($route['controller'], $route['method'])
            ) {
                header("Location: index.php?page=app_home");
            }
        } else {
            header("Location: index.php?page=app_home");
        }
        
        Authenticator::startSession();

        $controller = new $route['controller'];
        $controller->{$route['method']}();
    }

    public static function redirectToRoute(string $name, array $params = []): void {
        //Contient le nom du script courant. Cela sert lorsque les pages doivent s'appeler elles-mêmes.
        //La constante __FILE__ contient le chemin complet ainsi que le nom du fichier (i.e. inclut) courant.
        $uri = $_SERVER['SCRIPT_NAME'] . "?page=" . $name;
        
        if (!empty($params)) {
            array_walk($params, function(&$val, $key) {
                $val = urlencode((string) $key) . '=' . urlencode((string) $val);
            });
            $uri .= '&' . implode('&', $params);
        }
        header("Location: " . $uri);
        die;
    }
}