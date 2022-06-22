<?php
//On vérifie si tous les namespaces commencent bien  par “Ghibli” ou “App”
const ALIASES = [
    'Ghibli' => 'lib',
    'App' => 'src'
];
//Fonction anonyme
spl_autoload_register(function (string $class): void {
//Scinde une chaîne de caractères en segments par 'avec l'échap(\)\'
    $namespaceParts = explode('\\', $class);//["Ghibli", "App"]
    //Si le namespace de la classe qu'on charge commence par "Ghibli" ou "App", on le renomme respectivement par son alias
    if (in_array($namespaceParts[0], array_keys(ALIASES))) {
        $namespaceParts[0] = ALIASES[$namespaceParts[0]];
    //Message d'erreur quand c'est pas les bons namespace    
    } else {
        throw new Exception('Invalid namespace "' . $namespaceParts[0] . '". Expecting "Ghibli" or "App"');
    }
    //On reforme notre tableau sur le caractère "\" suivi de .php
    $filepath = implode(DIRECTORY_SEPARATOR, $namespaceParts) . '.php';
    //Si mon fichier n'existe pas, je retourne une erreur
    if (!file_exists($filepath)) {
        throw new Exception("Could not find file " . $filepath . " for class " . $class . ". Check your file's path, class name or namespace.");
    }

    require $filepath;
});