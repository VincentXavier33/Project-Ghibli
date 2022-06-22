<?php

namespace App\Model\Entity;

class Comment {

    private ?int $id;
    private User $user;
    private ?string $pseudo;
    private ?string $content;
    private ?\DateTime $createdAt;
    private ?\DateTime $updatedAt;

    public function __construct(array $comment) {
        if (isset($comment['id'])) 
            $this->id = $comment['id'];
        if (isset($comment['user'])) 
            $this->user = $comment['user'];    
        if (isset($comment['pseudo'])) 
            $this->pseudo = $comment['pseudo'];
        if (isset($comment['content'])) 
            $this->content = $comment['content'];
        if (isset($comment['created_at'])) 
            $this->createdAt = new \DateTime($comment['created_at']);
        if (isset($comment['updated_at'])) 
            $this->updatedAt = new \DateTime($comment['updated_at']);
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getUser(): ?User {
        return $this->user;
    }

    public function setUser(?User $user): void {
        $this->user = $user;
    }
    
    public function getTitle(): ?string {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): void {
        $this->pseudo = $pseudo;
    }


    public function getContent(): ?string {
        return $this->content;
    }

    public function setContent(?string $content): void {
        $this->content = $content;
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