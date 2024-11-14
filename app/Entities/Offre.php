<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Offre extends Entity
{
    // Define properties for 'titre', 'description', 'type', and 'salaire'
    protected $attributes = [
        'id' => null,
        'titre' => null,
        'description' => null,
        'type' => null,
        'salaire' => null,
    ];

    // Optional: Define any mutators or custom methods here if needed
}
