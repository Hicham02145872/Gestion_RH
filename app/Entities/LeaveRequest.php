<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class LeaveRequest extends Entity
{
    // Define properties for 'titre', 'description', 'type', and 'salaire'
    protected $attributes = [
        'id' => null,
        'employee_name' => null,
        'start_date' => null,
        'type' => null,
        'end_date' => null,
        'reason' => null,
        'status' => null,
    ];

    // Optional: Define any mutators or custom methods here if needed
}
