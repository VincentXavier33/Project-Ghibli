<?php

/*1. Cette classe contient 2 constantes qui permettent de stocker simplement le chemin vers le dossier `📁 pages`, ainsi que vers le `📄 layout.php` de notre site web.
2. La méthode `renderView()` prend en paramètres :
`$template` *(requis)* : le nom de la page HTML à retourner.
`$data` *(optionnel)* : un tableau de données dynamique pour le template en question.
Elle se contente de charger respectivement dans les variables `$templatePath` et `$data` le chemin vers la page HTML à retourner et des données dynamiques utilisées par cette page.
3. Enfin, le `📄 layout.php` est classiquement importé.
*/

namespace Ghibli;

abstract class View {

    private const PAGES_PATH = "./views/pages/";
    private const LAYOUT_PATH = "./views/layout.php";

    public static function renderView(string $template, array $data = []) {
      $templatePath =  self::PAGES_PATH . $template;
      $data = $data;
      $auth = new Authenticator();
      require self::LAYOUT_PATH;
    }
    

}