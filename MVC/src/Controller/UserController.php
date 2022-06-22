<?php

namespace App\Controller;

use Ghibli\Controller;
use Ghibli\Authenticator;
use App\Model\Entity\User;
use App\Model\Manager\UserManager;


class UserController extends Controller {


    public function register(): void {
        $errors = [];
        if (!empty($_POST)) {
            if (empty($_POST['pseudo']) || empty($_POST['birthday']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
                $errors[] = "Tous les champs doivent être saisis.";
            } else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Format de l'adresse email non valide.";
                }
                $emailLength = strlen($_POST['email']);
                if ($emailLength < 5 || $emailLength > 100) {
                    $errors[] = "L'adresse email doit comporter entre 5 et 100 caractères.";
                }
                if (strlen($_POST['password']) < 8) {
                    $errors[] = "Le mot de passe doit comporter au moins 8 caractères."; 
                }
                if ($_POST['password'] !== $_POST['confirm_password']) {
                    $errors[] = "Les mots de passe saisis ne correspondent pas."; 
                }
            }
            if (empty($errors)) {
                $manager = new UserManager();
                $alreadyExists = $manager->findByEmail($_POST['email']);
                if ($alreadyExists) {
                    $errors[] = "Cette adresse email existe déjà.";
                } else {
                    $user = new User();
                    $user->setPseudo($_POST['pseudo']);
                    $date = new \DateTime($_POST['birthday']);
                    $user->setBirthday($date);
                    $user->setRole(0);
                    $user->setEmail($_POST['email']);
                    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $user->setPassword($passwordHash);
                    $manager->add($user);
                    $this->redirectToRoute('user_connexion');
                }
            }
        }
        $this->renderView('user/inscription.php', [
            'title' => 'Inscription',
            'errors' => $errors
        ]);
    }

    public function login(): void {
        $errors = [];
        if (!empty($_POST)) {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $errors[] = "Tous les champs doivent être saisis.";
            } else {
                $manager = new UserManager();
                $user = $manager->findByEmail($_POST['email']);
                if (!$user) {
                    $errors[] = "Aucun compte n'est associé à cette adresse email.";
                } elseif (!password_verify($_POST['password'], $user->getPassword())) {
                    $errors[] = "Mauvais mot de passe.";
                }
            }
            if (empty($errors)) {
                Authenticator::login($user->getId());
                $this->redirectToRoute('user_home');
            }
        }
        $this->renderView('user/connexion.php', [
            'title' => 'Connexion',
            'errors' => $errors
        ]);
    }
    
    public function logout(): void {
        Authenticator::logout();
        $this->redirectToRoute('user_connexion');
    }
    
    public function profil(): void {
        $this->renderView('user/profil.php');
    }
    
    public function list(): void {
        $userManager = new UserManager();
        $users = $userManager->findAll();
        $this->renderView('user/_list.php', [
            'title' => 'user',
            'user' => $users
        ]);
    }

    public function show(): void {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $userManager = new UserManager();
            $user = $userManager->find($_GET['id']);
            $this->renderView('user/_show.php', [
                'title' => $user->getPseudo(), getEmail(), getPseudo(), getPassword(), getBirthday(), getRole(), getCreatedAt(), getUpdatedAt(),
                'user' => $user
            ]);
        } else {
            $this->redirectToRoute('app_home');
        }
    }

    public function add(): void {
        if (isset($_POST) && !empty($_POST)) {
            $userManager = new UserManager();
            $userManager->add(new User($_POST));
            $this->redirectToRoute('user_list');
        }
        $this->renderView('user/_add.php', [
            'title' => 'Ajouter un user'
        ]);
    }

    public function edit(): void {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $userManager = new UserManager();
            $user = $userManager->find($_GET['id']);
            if (
                isset($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['birthday'], $_POST['role'])
                && !empty($_POST['pseudo'])
                && !empty($_POST['email'])
                && !empty($_POST['password'])
                && !empty($_POST['birthday'])
                && !empty($_POST['role'])
                
            ) {
                $userManager->edit(new User($_POST), $_GET['id']);
                $this->redirectToRoute('_show', ['id' => $_GET['id']]);
            }
            $this->renderView('user/_edit.php', [
                'title' => $user->getPseudo, getEmail, getPseudo, getPassword, getBirthday, getRole . ' (éditer)',
                'user' => $user
            ]);
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }

    public function delete(): void {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $userManager = new UserManager();
            $userManager->delete($_GET['id']);
            $this->redirectToRoute('_list');
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }
    
}