<?php

//manager(manipuler) pour chaque table de notre base de données et par extension pour chaque entité(objet)

namespace App\Model\Manager;

use Ghibli\Manager;
use App\Model\Entity\Film;

class FilmManager extends Manager {
    //LECTURE d'un seul (READ)
    public function find(int $id): ?film {
      // : est un marqueur comme .$id mais c'est save
         $sql = 'SELECT * FROM films WHERE films.id = :id';
       $query = $this->connection->prepare($sql);
         $query->execute([
           'id' => $id
         ]);
         $film = $query->fetch();
         //Si film est faux ou si il contiens rien
         if (!$film || empty($film)) {
             return null;
         }
         $realManager = new RealManager();
         $film['real'] = $realManager->find($film['id_real']);
            
         return new Film($film);
     }
    //LECTURE de tous (READ)
    public function findAll(): array {
        $sql = 'SELECT * FROM films';
        $query = $this->connection->query($sql);
        $films = $query->fetchAll();
				$filmsObjects = [];
				foreach ($films as $film) {
						array_push($filmsObjects, new Film($film));
				}
				 $filmObjects = [];
         $realManager = new RealManager();
         foreach($films as $film) {
         $film['real'] = $realManager->find($film['id_real']);
         array_push($filmsObjects, new Film($film));
        }
        return $filmsObjects;
    }

  //Ajouter
  public function add(film $film): void {
    $sql = 'INSERT INTO films (name, id_director, year, picture, synopsis, trailer, soundtrack, created_at) VALUES (:name, :id_director, :year, :picture, :synopsis, :trailer, :soundtrack :created_at)';
    $query = $this->connection->prepare($sql);
    $query->execute([
                'name' => $film->getName(),
                'id_director' => $film->getId_Director(),
                'year' => $film->getYear(),
                'picture' => $film->getPicture(),
                'synopsis' => $film->getSynopsis(),
                'trailer' => $film->getTrailer(),
                'soundtrack' => $film->getSoundtrack(),
                'id_commentaire' => $film->getComment(),
                'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s')
    ]);
  }
  //Modifier
  public function edit(film $film, int $id): void {
    $sql = "UPDATE films SET name = :namer,  id_director= :id_director, year = :year, picture = :picture, synopsis = :synopsis, trailer = :trailer, soundtrack = :soundtrack, updated_at = :updated_at WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
                'name' => $film->getName(),
                'id_director' => $film->getId_Director(),
                'year' => $film->getYear(),
                'picture' => $film->getPicture(),
                'synopsis' => $film->getSynopsis(),
                'trailer' => $film->getTrailer(),
                'soundtrack' => $film->getSoundtrack(),
                'id_commentaire' => $film->getComment(),
                'updated_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
                'id' => $id
    ]);
  }
  //Supprimer
  public function delete(int $id): void {
    $sql = "DELETE FROM films WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id' => $id
    ]);
  }

}