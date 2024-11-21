<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class LeaveRequest extends Entity
{
    // Définition des propriétés avec des attributs par défaut
    protected $attributes = [
        'id' => null,
        'employee_name' => null,
        'start_date' => null,
        'end_date' => null,
        'reason' => null,
        'status' => 'pending', // Statut par défaut
        'notification_sent' => 0, // Notification non envoyée par défaut
    ];

    // Ajout d'un mutator pour formater le statut
    public function getStatus()
    {
        return ucfirst($this->attributes['status']); // Formate le statut en première lettre majuscule
    }

    // Ajout d'un mutator pour vérifier si une notification est envoyée
    public function isNotificationSent()
    {
        return $this->attributes['notification_sent'] == 1;
    }
}
