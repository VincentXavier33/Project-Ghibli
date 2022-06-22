<?php

namespace App\Controller;

use Ghibli\Authenticator;
use Ghibli\Controller;
use App\Model\Entity\Real;
use App\Model\Manager\RealManager;

class realController extends Controller {

    public function list(): void {
        /*Authenticator::firewall();*/
        $realManager = new RealManager();
        $reals = $realManager->findAll();
        $this->renderView('real/_list.php', [
            'first_name' => 'prenom',
            'last_name' => 'nom',
            'reals' => $reals
        ]);
    }

    public function show(): void {
        /*Authenticator::firewall();*/
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $realManager = new RealManager();
            $real = $realManager->find($_GET['id']);
            $this->renderView('real/_show.php', [
                'first_name' => $real->getFirst_name(),
                'last_name' => $real->getLast_name(),
                'real' => $real
            ]);
        } else {
            $this->redirectToRoute('app_home');
        }
    }

    public function add(): void {
        Authenticator::firewall();
        if (isset($_POST) && !empty($_POST)) {
            $realManager = new RealManager();
            $realManager->add(new Real($_POST));
            $this->redirectToRoute('_list');
        }
        $this->renderView('real/_add.php', [
            'title' => 'Ajouter un realisateur'
        ]);
    }

    public function edit(): void {
        Authenticator::firewall();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $realManager = new RealManager();
            $real = $realManager->find($_GET['id']);
            if (
                isset($_POST['title'], $_POST['resume'], $_POST['content'])
                && !empty($_POST['title'])
                && !empty($_POST['resume'])
                && !empty($_POST['content'])
            ) {
                $realManager->edit(new Real($_POST), $_GET['id']);
                $this->redirectToRoute('_show', ['id' => $_GET['id']]);
            }
            $this->renderView('real/_edit.php', [
                'first_name' => $real->getFirst_name() . ' (éditer)',
                'last_name' => $real->getLast_name() . ' (éditer)',
                'real' => $real
            ]);
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }

    public function delete(): void {
        Authenticator::firewall();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $realManager = new RealManager();
            $realManager->delete($_GET['id']);
            $this->redirectToRoute('_list');
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }
    
}