<?php

namespace App\Model\Entity;

class User {

    private ?int $id;
    private ?string $email;
    private ?string $pseudo;
    private ?string $password;
    private ?string $role;
    private ?\DateTime $birthday;
    private ?\DateTime $createdAt;
    private ?\DateTime $updatedAt;

    public function __construct(array $user = []) {
        if (isset($user['id'])) 
            $this->id = (int) $user['id'];
        if (isset($user['email'])) 
            $this->email = (string) $user['email'];
        if (isset($user['pseudo'])) 
            $this->pseudo = (string) $user['pseudo'];
        if (isset($user['password'])) 
            $this->password = (string) $user['password'];
        if (isset($user['role'])) 
            $this->role = (string) $user['role'];
        if (isset($user['birthday'])) 
            $this->birthday = new \DateTime($user['birthday']);    
        if (isset($user['created_at'])) 
            $this->createdAt = new \DateTime($user['created_at']);
        if (isset($user['updated_at'])) 
            $this->updatedAt = new \DateTime($user['updated_at']);
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }
    
    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(?string $email): void {
        $this->email = $email;
    }

    public function getPseudo(): ?string {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): void {
        $this->pseudo = $pseudo;
    }

    public function getPassword(): ?string {
        return $this->password;
    }

    public function setPassword(?string $password): void {
        $this->password = $password;
    }

    public function getRole(): ?bool {
        return $this->role;
    }

    public function setRole(?bool $role): void {
        $this->role = $role;
    }
    
    public function getBirthday(): ?\DateTime {
        return $this->birthday;
    }

    public function setBirthday(?\DateTime $birthday): void {
        $this->birthday = $birthday;
    }

    public function getCreatedAt(): ?\Datetime {
        return $this->createdAt;
    }

    public function setCreatedAt(?\Datetime $createdAt): void {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\Datetime {
      return $this->updatedAt;
    }

    public function setUpdatedAt(?\Datetime $updatedAt): void {
        $this->updatedAt = $updatedAt;
    }

}