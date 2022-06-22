<?php

namespace App\Model\Entity;

class Avatar {

    private int $id;
    private user $user;
    private ?string $images;
    
    
    

    public function __construct(array $avatar = []) {
        if (isset($avatar['id'])) 
            $this->id =  $avatar['id'];
            
        if (isset($avatar['user'])) 
            $this->user =  $avatar['user'];    
            
        if (isset($avatar['images'])) 
            $this->images = $avatar['images'];
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }
    
    public function getUser(): ?int {
        return $this->user;
    }

    public function setUser(?int $user): void {
        $this->user = $user;
    }

    public function getImages(): ?string {
        return $this->images;
    }

    public function setImages(?string $images): void {
        $this->images = $images;
    }
}