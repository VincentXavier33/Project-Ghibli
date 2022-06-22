<?php

namespace App\Model\Entity;

class Film {

    private int $id;
    private string $name;
    private Real $real;
    private string $picture;
    private string $synopsis;
    private string $trailer;
    private string $soundtrack;
    private ?array  $comment;
    /*private ?\DateTime $createdAt;*/
    private ?\DateTime $updatedAt;
    
    

    public function __construct(array $film = []) {
        if (isset($film['id'])) 
            $this->id = $film['id'];
        if (isset($film['name'])) 
            $this->name = $film['name'];
        if (isset($film['real'])) 
            $this->real = $film['real'];
        if (isset($film['year'])) 
            $this->year = new \DateTime($film['year']);
        if (isset($film['picture'])) 
            $this->picture = $film['picture'];
        if (isset($film['synopsis'])) 
            $this->synopsis = $film['synopsis'];
        if (isset($film['trailer'])) 
            $this->trailer = $film['trailer']; 
        if (isset($film['soundtrack'])) 
            $this->soundtrack = $film['soundtrack'];   
        if (isset($film['created_at'])) 
            $this->createdAt = new \DateTime($film['created_at']);
        if (isset($film['updated_at'])) 
            $this->updatedAt = new \DateTime($film['updated_at']);
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(?string $name): void {
        $this->name = $name;
    }

    public function getReal(): Real {
        return $this->real;
    }

    public function setReal(?int $real): void {
        $this->real = $real;
    }
    
    public function getYear(): ?\Datetime {
        return $this->year;
    }

    public function setYear(?\Datetime $year): void {
        $this->year = $year;
    }

    public function getPicture(): ?string {
        return $this->picture;
    }

    public function setPicture(?string $picture): void {
        $this->picture = $picture;
    }
    
    public function getSynopsis(): ?string {
        return $this->synopsis;
    }

    public function setSynopsis(?string $synopsis): void {
        $this->synopsis = $synopsis;
    }
    
    public function getTrailer(): ?string {
        return $this->trailer;
    }

    public function setTrailer(?string $trailer): void {
        $this->trailer = $trailer;
    }
    
    public function getSoundtrack(): ?string {
        return $this->soundtrack;
    }

    public function setSoundtrack(?string $soundtrack): void {
        $this->soundtrack = $soundtrack;
    }
    public function getComments(): ?array {
        return $this->comments;
    }

    public function setComments(?int $comments): void {
        $this->Comments = $comments;
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