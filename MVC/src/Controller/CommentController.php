<?php

namespace App\Controller;

use Ghibli\Controller;
use App\Model\Entity\Comment;
use App\Model\Manager\CommentManager;

class CommentController extends Controller {

    public function list(): void {
        /*Authenticator::firewall();*/
        $commentManager = new CommentManager();
        $comments = $commentManager->findAll();
        $this->renderView('comment/_list.php', [
            'comment' => $comments
        ]);
    }

    public function show(): void {
        /*Authenticator::firewall();*/
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $commentManager = new CommentManager();
            $comment = $commentManager->find($_GET['id']);
            $this->renderView('comment/_show.php', [
                'title' => $comment->getPseudo(),
                'comment' => $comment
            ]);
        } else {
            $this->redirectToRoute('app_home');
        }
    }

    public function add(): void {
        Authenticator::firewall();
        if (isset($_POST) && !empty($_POST)) {
            $commentManager = new CommentManager();
            $commentManager->add(new Comment($_POST));
            $this->redirectToRoute('_list');
        }
        $this->renderView('comment/_add.php', [
            'title' => 'Ajouter un commentaire'
        ]);
    }

    public function edit(): void {
        Authenticator::firewall();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $commentManager = new CommentManager();
            $comment = $commentManager->find($_GET['id']);
            if (
                isset($_POST['title'], $_POST['resume'], $_POST['content'])
                && !empty($_POST['title'])
                && !empty($_POST['resume'])
                && !empty($_POST['content'])
            ) {
                $commentManager->edit(new Comment($_POST), $_GET['id']);
                $this->redirectToRoute('comment_show', ['id' => $_GET['id']]);
            }
            $this->renderView('comment/_edit.php', [
                'title' => $comment->getTitle() . ' (éditer)',
                'comment' => $comment
            ]);
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }

    public function delete(): void {
        Authenticator::firewall();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $commentManager = new CommentManager();
            $commentManager->delete($_GET['id']);
            $this->redirectToRoute('comment_list');
        } else {
            $this->redirectToRoute('_show', ['id' => $_GET['id']]);
        }
    }
    
}