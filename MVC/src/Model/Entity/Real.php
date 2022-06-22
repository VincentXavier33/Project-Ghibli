<?php

namespace App\Model\Entity;

class Real {

    private int $id;
    private string $first_name;
    private string $last_name;
    private ?\DateTime $createdAt;
    private ?\DateTime $updatedAt;

    public function __construct(array $real) {
        if (isset($real['id'])) 
            $this->id = $real['id'];
        if (isset($real['first_name'])) 
            $this->first_name = $real['first_name'];
        if (isset($real['last_name'])) 
            $this->last_name = $real['last_name'];
        if (isset($real['created_at'])) 
            $this->createdAt = new \DateTime($real['created_at']);
        if (isset($real['updated_at'])) 
            $this->updatedAt = new \DateTime($real['updated_at']);
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getFirst_name(): ?string {
        return $this->first_name;
    }

    public function setFirst_name(?string $first_name): void {
        $this->first_name = $first_name;
    }


    public function getLast_name(): ?string {
        return $this->last_name;
    }

    public function setLast_name(?string $last_name): void {
        $this->last_name = $last_name;
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