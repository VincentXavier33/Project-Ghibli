<?php

namespace App\Controller;

use Ghibli\Controller;
use App\Model\Entity\Avatar;
use App\Model\Manager\AvatarManager;

class avatarController extends Controller {

    public function list(): void {
        Authenticator::firewall();
        $avatarManager = new AvatarManager();
        $avatars = $avatarManager->findAll();
        $this->renderView('avatar/_list.php', [
            'title' => 'avatar',
            'avatar' => $avatars
        ]);
    }

    public function show(): void {
        Authenticator::firewall();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $avatarManager = new AvatarManager();
            $avatar = $avatarManager->find($_GET['id']);
            $this->renderView('avatar/_show.php', [
                'title' => $avatar->getTitle(),
                'avatar' => $avatar
            ]);
        } else {
            $this->redirectToRoute('app_home');
        }
    }

    public function add(): void {
        Authenticator::firewall();
        if (isset($_POST) && !empty($_POST)) {
            $avatarManager = new avatarManager();
            $avatarManager->add(new avatar($_POST));
            $this->redirectToRoute('avatar_list');
        }
        $this->renderView('avatar/_add.php', [
            'title' => 'Ajouter un avatar'
        ]);
    }

    public function edit(): void {
        Authenticator::firewall();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $avatarManager = new AvatarManager();
            $avatar = $avatarManager->find($_GET['id']);
            if (
                isset($_POST['title'], $_POST['resume'], $_POST['content'])
                && !empty($_POST['title'])
                && !empty($_POST['resume'])
                && !empty($_POST['content'])
            ) {
                $avatarManager->edit(new Avatar($_POST), $_GET['id']);
                $this->redirectToRoute('_show', ['id' => $_GET['id']]);
            }
            $this->renderView('avatar/_edit.php', [
                'title' => $avatar->getTitle() . ' (éditer)',
                'avatar' => $avatar
            ]);
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }

    public function delete(): void {
        Authenticator::firewall();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $avatarManager = new AvatarManager();
            $avatarManager->delete($_GET['id']);
            $this->redirectToRoute('_list');
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }
    
}