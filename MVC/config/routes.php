<?php

/*Ce fichier retourne un tableau associatif dans lequel chaque clé correspond au **nom d’une route**.

1. Le **namespace** de la classe à instancier
2. Le **nom** de classe à instancier
3. La **méthode** à appeler de l’objet ainsi créé
*/
return [
    'app_home' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'home'
    ],
    'app_musee' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'musee'
    ],
    'musee_y_aller' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'y_aller'
    ],
    'musee_visite' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'visite'
    ],
    'musee_expo_ephemere' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'expo_ephemere'
    ],
    'app_studio' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'studio'
    ],
    'studio_historique' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'historique'
    ],
    'studio_visite_parc' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'visite_parc'
    ],
    'studio_park' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'park'
    ],
    'app_contact' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'contact'
    ],
    'film_list' => [
      'controller' => App\Controller\FilmController::class,
      'method' => 'list'
    ],
    'film_show' => [
      'controller' => App\Controller\FilmController::class,
      'method' => 'show'
    ],
    'film_add' => [
      'controller' => App\Controller\FilmController::class,
      'method' => 'add'
    ],
    'film_edit' => [
      'controller' => App\Controller\FilmController::class,
      'method' => 'edit'
    ],
    'film_delete' => [
      'controller' => App\Controller\FilmController::class,
      'method' => 'delete'
    ],
    'comment_list' => [
      'controller' => App\Controller\CommentController::class,
      'method' => 'list'
    ],
    'comment_show' => [
      'controller' => App\Controller\CommentController::class,
      'method' => 'show'
    ],
    'comment_add' => [
      'controller' => App\Controller\CommentController::class,
      'method' => 'add'
    ],
    'comment_edit' => [
      'controller' => App\Controller\CommentController::class,
      'method' => 'edit'
    ],
    ' comment_delete' => [
      'controller' => App\Controller\CommentController::class,
      'method' => 'delete'
    ],
    'avatar_list' => [
      'controller' => App\Controller\AvatarController::class,
      'method' => 'list'
    ],
    'avatar_show' => [
      'controller' => App\Controller\AvatarController::class,
      'method' => 'show'
    ],
    'avatar_add' => [
      'controller' => App\Controller\AvatarController::class,
      'method' => 'add'
    ],
    'avatar_edit' => [
      'controller' => App\Controller\AvatarController::class,
      'method' => 'edit'
    ],
    ' avatar_delete' => [
      'controller' => App\Controller\AvatarController::class,
      'method' => 'delete'
    ],
    'real_list' => [
      'controller' => App\Controller\RealController::class,
      'method' => 'list'
    ],
    'real_show' => [
      'controller' => App\Controller\RealController::class,
      'method' => 'show'
    ],
    'real_add' => [
      'controller' => App\Controller\RealController::class,
      'method' => 'add'
    ],
    'real_edit' => [
      'controller' => App\Controller\RealController::class,
      'method' => 'edit'
    ],
    'real_delete' => [
      'controller' => App\Controller\RealController::class,
      'method' => 'delete'
    ],
    'user_inscription' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'register'
    ],
    'user_connexion' => [
    'controller' => App\Controller\UserController::class,
    'method' => 'login'
    ],
    'user_logout' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'logout'
    ],
    'user_profil' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'profil'
    ],
    'user_list' => [
      'controller' => App\Controller\Userontroller::class,
      'method' => 'list'
    ],
    'user_show' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'show'
    ],
    'user_add' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'add'
    ],
    'user_edit' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'edit'
    ],
    ' user_delete' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'delete'
    ],
];