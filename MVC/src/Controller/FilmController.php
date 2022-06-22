<?php

namespace App\Controller;

use Ghibli\Controller;
use App\Model\Entity\Film;
use App\Model\Manager\FilmManager;

class FilmController extends Controller {

    public function list(): void {
        /*Authenticator::firewall();*/
        $filmManager = new FilmManager();
        $films = $filmManager->findAll();
        $this->renderView('film/_list.php', [
            'films' => $films
        ]);
    }

    public function show(): void {
        /*Authenticator::firewall();*/
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $filmManager = new FilmManager();
            $film = $filmManager->find($_GET['id']);
            $this->renderView('film/_show.php', [
                'film' => $film
            ]);
        } else {
            $this->redirectToRoute('app_home');
        }
    }

    public function add(): void {
        Authenticator::firewall();
        if (isset($_POST) && !empty($_POST)) {
            $filmManager = new FilmManager();
            $filmManager->add(new film($_POST));
            $this->redirectToRoute('film_list');
        }
        $this->renderView('film/_add.php', [
            'name' => 'Ajouter un Nom',
            'id_director' => 'Ajouter un Realisateur',
            'year' => 'Ajouter une Annee',
            'picture' => 'Ajouter une Image',
            'synopsis' => 'Ajouter un Resumer',
            'trailer' => 'Ajouter une Bande Annonce',
            'soundtrack' => 'Ajouter unBande son',
            
        ]);
    }

    public function edit(): void {
        Authenticator::firewall();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $filmManager = new FilmManager();
            $film = $filmManager->find($_GET['id']);
            if (
                isset($_POST['name'], $_POST['id_director'], $_POST['year'], $_POST['picture'], $_POST['synopsis'], $_POST['trailer'], $_POST['soundtrack'])
                && !empty($_POST['name'])
                && !empty($_POST['id_director'])
                && !empty($_POST['year'])
                && !empty($_POST['picture'])
                && !empty($_POST['synopsis'])
                && !empty($_POST['trailer'])
                && !empty($_POST['soundtrack'])
            ) {
                $filmManager->edit(new Film($_POST), $_GET['id']);
                $this->redirectToRoute('_show', ['id' => $_GET['id']]);
            }
            $this->renderView('film/_edit.php', [
                'name' => $film->getName() . ' (éditer)',
                'id_director' => $film->getId_director() . ' (éditer)',
                'year' => $film->getYear() . ' (éditer)',
                'picture' => $film->getPicture() . ' (éditer)',
                'synopsis' => $film->getSynopsis() . ' (éditer)',
                'trailer' => $film->getTrailer() . ' (éditer)',
                'soundtrack' => $film->getSoundtrack() . ' (éditer)',
                'id_commentaire' => $film->getId_comment() . ' (éditer)',
                'created_at' => $film->getCreatedAt() . ' (éditer)',
                'updated_at' => $film->getUpdatedAt() . ' (éditer)',
                'film' => $film
            ]);
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }

    public function delete(): void {
        Authenticator::firewall();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $filmManager = new FilmManager();
            $filmManager->delete($_GET['id']);
            $this->redirectToRoute('_list');
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }
    
}