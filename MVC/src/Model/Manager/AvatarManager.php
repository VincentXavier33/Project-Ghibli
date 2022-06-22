<?php

//manager pour chaque table de notre base de données et par extension pour chaque entité(objet)t
namespace App\Model\Manager;

use Ghibli\Manager;
use App\Model\Entity\Avatar;

class AvatarManager extends Manager {

    public function find(int $id): ?avatar {
         $sql = 'SELECT * FROM avatars WHERE avatars.id = :id';
       $query = $this->connection->prepare($sql);
         $query->execute([
           'id' => $id
         ]);
         $avatar = $query->fetch();
         if (!$avatar || empty($avatar)) {
             return null;
         }
         return new Avatar($avatar);
     }
    //LECTURE de tous (READ)
    public function findAll(): array {
        $sql = 'SELECT * FROM avatars';
        $query = $this->connection->query($sql);
        $avatars = $query->fetchAll();
				$avatarsObjects = [];
				foreach ($avatars as $avatar) {
						array_push($avatarsObjects, new Avatar($avatar));
				}
        return $avatarsObjects;
    }

  //Ajouter
  public function add(avatar $avatar): void {
    $sql = 'INSERT INTO avatars (id_User, images,  created_at) VALUES (:id_User, :images, :created_at)';
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id_User' => $avatar->getId_User(),
      'images' => $avatar->getImages(),
      'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s')
    ]);
  }
  //Modifier
  public function edit(avatar $avatar, int $id): void {
    $sql = "UPDATE avatars SET id_User = :id_User, images = :images, updated_at = :updated_at WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id_User' => $avatar->getId_User(),
      'images' => $avatar->getImages(),
      'updated_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
      'id' => $id
    ]);
  }
  //Supprimer
  public function delete(int $id): void {
    $sql = "DELETE FROM avatars WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id' => $id
    ]);
  }

}