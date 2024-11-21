<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Candidature;

class CandidatureModel extends Model
{
    protected $table = 'candidatures';
    protected $primaryKey = 'id';
    protected $allowedFields = ['offre_id','nom', 'prenom', 'email', 'cv', 'lettre', 'photo'];
    protected $returnType = Candidature::class; 
    protected $useTimestamps = true; 
}
