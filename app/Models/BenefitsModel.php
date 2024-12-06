<?php
namespace App\Models;

use CodeIgniter\Model;

class BenefitsModel extends Model {
    protected $table = 'benefits';
    protected $primaryKey = 'id';
    protected $allowedFields = ['employee_id', 'benefit_type', 'details'];

}