<?php

/*1. La fonction prend en paramètres :
`$name` *(requis)* : le nom de la route à appeler.
`$params` *(optionnel)* : un tableau associatif de paramètres `GET` supplémentaires.
2. `$_SERVER['SCRIPT_NAME']` : Contient le chemin complet ainsi que le nom du fichier courant.
3. `array_walk()` : parcourt le tableau associatif `$params` de couples clés-valeurs des paramètres `GET` pour les écrire dans un format d’URL standard.
Exemple : `index.php?page=3&id=12&order=ASC`
4. `header()` : effectue la redirection vers la bonne URL.
*/
namespace Ghibli;

use Ghibli\View;

abstract class Controller {

    protected function renderView(string $template, array $data = []): void {
        View::renderView($template, $data);
    }
    
    protected function redirectToRoute(string $name, array $params = []): void {
	      Router::redirectToRoute($name, $params);
    }

}