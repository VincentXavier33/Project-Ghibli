<?php

//manager pour chaque table de notre base de données et par extension pour chaque entité(objet)

namespace App\Model\Manager;

use Ghibli\Manager;
use App\Model\Entity\Real;

class RealManager extends Manager {

    public function find(int $id): ?real {
         $sql = 'SELECT * FROM realisateurs WHERE realisateurs.id = :id';
         $query = $this->connection->prepare($sql);
         $query->execute([
           'id' => $id
         ]);
         $real = $query->fetch();
         if (!$real || empty($real)) {
             return null;
         }
         return new Real($real);
     }
    //LECTURE de tous (READ)
    public function findAll(): array {
        $sql = 'SELECT * FROM realisateurs';
        $query = $this->connection->query($sql);
        $reals = $query->fetchAll();
        /*if (!$reals || empty($reals)) {
            return [];
        }*/
				$realsObjects = [];
				foreach ($reals as $real) {
						array_push($realsObjects, new Real($real));
				}
        return $realsObjects;
    }
  //Ajouter
  public function add(real $real): void {
    $sql = 'INSERT INTO realisateurs (first_name, last_name, created_at) VALUES (:first_name, :last_name, :created_at)';
    $query = $this->connection->prepare($sql);
    $query->execute([
      'first_name' => $real->getFirst_name(),
      'last_name' => $real->getLast_name(),
      'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s')
    ]);
  }
  //Modifier
  public function edit(real $real, int $id): void {
    $sql = "UPDATE realisateurs SET first_name = :first_name, last_name = :last_name, updated_at = :updated_at WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'first_name' => $real->getFirst_name(),
      'last_name' => $real->getLast_name(),
      'updated_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
      'id' => $id
    ]);
  }
  //Supprimer
  public function delete(int $id): void {
    $sql = "DELETE FROM realisateurs WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id' => $id
    ]);
  }

}