<?php
namespace App\Models;

use CodeIgniter\Model;

class PayrollModel extends Model {
    protected $table = 'payroll';
    protected $primaryKey = 'id';
    protected $allowedFields = ['employee_id', 'basic_salary', 'bonuses', 'deductions', 'payment_date'];
}