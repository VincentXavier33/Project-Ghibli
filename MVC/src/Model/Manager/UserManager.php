<?php

//manager pour chaque table de notre base de données et par extension pour chaque entité(objet)

namespace App\Model\Manager;

use Ghibli\Manager;
use App\Model\Entity\User;

class UserManager extends Manager {

    public function find(int $id): ?user {
         $sql = 'SELECT * FROM users WHERE users.id = :id';
       $query = $this->connection->prepare($sql);
         $query->execute([
           'id' => $id
         ]);
         $user = $query->fetch();
         if (!$user || empty($user)) {
             return null;
         }
         return new User($user);
     }
    //LECTURE de tous (READ)
    public function findAll(): array {
        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $users = $query->fetchAll();
				$usersObjects = [];
				foreach ($users as $user) {
						array_push($usersObjects, new User($user));
				}
        return $usersObjects;
    }
  //Email
  public function findByEmail(string $email): ?user {
	      $sql = 'SELECT * FROM users WHERE users.email = :email';
	      $query = $this->connection->prepare($sql);
	      $query->execute([
						'email' => $email
				]);
	      $user = $query->fetch();
	      if (!$user || empty($user)) {
	        return null;
	      }
	      return new User($user);
    }
    
  //Ajouter
  public function add(user $user): void {
    $sql = 'INSERT INTO users (email, pseudo, password, birthday, created_at) VALUES (:email, :pseudo, :password, :birthday, :created_at)';
    $query = $this->connection->prepare($sql);
    $query->execute([
      'email' => $user->getEmail(),
      'pseudo' => $user->getPseudo(),
      'password' => $user->getPassword(),
      /*'role' => $user->getRole(),*/
      'birthday' => date_format($user->getBirthday(), 'Y-m-d'),
      'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s')
    ]);
  }
  //Modifier
  public function edit(user $user, int $id): void {
    $sql = "UPDATE users SET email = :email, pseudo = :pseudo, password = :password, role = :role, birthday = :birthday, updated_at = :updated_at WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'email' => $user->getEmail(),
      'pseudo' => $user->getPseudo(),
      'password' => $user->getPassword(),
      'role' => $user->getRole(),
      'birthday' => $user->getBirthday(),
      'updated_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
      'id' => $id
    ]);
  }
  //Supprimer
  public function delete(int $id): void {
    $sql = "DELETE FROM users WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id' => $id
    ]);
  }

}