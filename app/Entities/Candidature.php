<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Candidature extends Entity
{
    protected $attributes = [
        'nom' => null,
        'prenom' => null,
        'email' => null,
        'cv' => null,
        'lettre' => null,
        'photo' => null,
    ];

    protected $casts = [
        'nom' => 'string',
        'prenom' => 'string',
        'email' => 'string',
        'cv' => 'string',
        'lettre' => 'string',
        'photo' => 'string',
    ];
}
