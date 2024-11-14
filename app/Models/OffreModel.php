<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Offre;
use CodeIgniter\Model\SoftDeletes;


class OffreModel extends Model
{
    protected $table      = 'offres';
    protected $primaryKey = 'id';
    protected $returnType = Offre::class; // Specify that the model should return an Offre entity
    protected $useSoftDeletes = true;
    protected $allowedFields = ['titre', 'description', 'type', 'salaire'];
    protected $useTimestamps = true;

    // In your OffreModel:
public function getOffreById($id)
{
    return $this->find($id); // This will return the entity object populated with data
}

}

