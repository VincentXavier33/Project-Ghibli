<?php

namespace Ghibli;

use App\Model\Manager\UserManager;
use App\Model\Entity\User;

class Authenticator {

    static public function startSession(): void {
        session_start();
    }

    static public function login(int $id): void {
        $_SESSION['user_id'] = $id;
    }

    public function isAuthenticated(): bool {
        return isset($_SESSION['user_id']) ? true : false;
    }
    
    static public function firewall(): void {
    if (!isset($_SESSION['user_id'])) {
      Router::redirectToRoute('app_user_connexion');
    }
  }

    public function getUser(): User {
        $userManager = new UserManager();
        return $userManager->find($_SESSION['user_id']);
    }
    
    static public function logout(): void {
        $_SESSION['user_id'] = null;
        session_destroy();
    }    

}