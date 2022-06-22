<?php

//manager pour chaque table de notre base de données et par extension pour chaque entité(objet)

namespace App\Model\Manager;

use Ghibli\Manager;
use App\Model\Entity\Comment;

class CommentManager extends Manager {

    public function find(int $id): ?Article {
        $sql = 'SELECT * FROM commentaires WHERE commentaires.id = :id';
        $query = $this->connection->prepare($sql);
        $query->execute([
          'id' => $id
        ]);
        $article = $query->fetch();
        if (!$article || empty($article)) {
            return null;
        }
        return new Comment($comment);
    }

    public function findAll(): ?array {
        $sql = 'SELECT * FROM commentaires';
        $query = $this->connection->query($sql);
        $comments = $query->fetchAll();
        if (!$comments || empty($comments)) {
            return null;
        }
				$commentsObjects = [];
				foreach ($comments as $comment) {
						array_push($commentsObjects, new Comment($comment));
				}
        return $commentsObjects;
    }

  public function add(Comment $comment): void {
    $sql = 'INSERT INTO commentaires (id_User, pseudo, content, created_at) VALUES (:id_User, :pseudo, :content, :created_at)';
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id_User' => $comment->getId_User(),
      'pseudo' => $comment->getPseudo(),
      'content' => $comment->getContent(),
      'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s')
    ]);
  }

  public function edit(Comment $comment, int $id): void {
    $sql = "UPDATE commentaires SET id_User = :id_User, pseudo = :pseudo, content = :content, updated_at = :updated_at WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id_User' => $comment->getId_User(),
      'pseudo' => $comment->getPseudo(),
      'content' => $comment->getContent(),
      'updated_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
      'id' => $id
    ]);
  }

  public function delete(int $id): void {
    $sql = "DELETE FROM commentaires WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id' => $id
    ]);
  }

}