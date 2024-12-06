<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Employee extends Entity
{
    // Définition des propriétés correspondant aux colonnes de la table dans la base de données
    protected $attributes = [
        'id' => null,
        'name' => null,
        'email' => null,
        'position' => null,
        'department' => null,
        'phone' => null,
        'hire_date' => null,
        'salary' => null,
        'status' => null,
    ];

    // Accesseur pour le nom complet de l'employé
    public function getFullName(): string
    {
        return ucwords(strtolower($this->attributes['name']));
    }

    // Accesseur pour l'email de l'employé
    public function getEmail(): ?string
    {
        return $this->attributes['email'];
    }

    // Accesseur pour le poste de l'employé
    public function getPosition(): ?string
    {
        return $this->attributes['position'];
    }

    // Accesseur pour le département de l'employé
    public function getDepartment(): ?string
    {
        return $this->attributes['department'];
    }

    // Accesseur pour le téléphone de l'employé
    public function getPhone(): ?string
    {
        return $this->attributes['phone'];
    }

    // Accesseur pour la date d'embauche de l'employé
    public function getHireDate(): ?string
    {
        return $this->attributes['hire_date'];
    }

    // Accesseur pour le salaire de l'employé
    public function getSalary(): string
    {
        return  number_format((float)$this->attributes['salary'], 2);
    }

    // Mutateur pour formater le salaire avant de l'enregistrer
    public function setSalary(float $value): void
    {
        $this->attributes['salary'] = number_format($value, 2, '.', '');
    }

    // Accesseur pour le statut de l'employé
    public function getStatus(): ?string
    {
        return $this->attributes['status'];
    }

    // Exemple de méthode pour vérifier si l'employé est actif
    public function isActive(): bool
    {
        return $this->attributes['status'] === 'active';
    }

    // Accesseur pour l'ID de l'employé
    public function getId(): ?int
    {
        return $this->attributes['id'];
    }

    // Accesseur pour l'ID de l'employé
    public function setId(int $value): void
    {  
        $this->attributes['id'] = $value;
    }
}