<?php

// app/Models/LeaveRequestModel.php
namespace App\Models;

use App\Entities\LeaveRequest;
use CodeIgniter\Model;

class LeaveRequestModel extends Model
{
    protected $table = 'leave_requests';
    protected $returnType = LeaveRequest::class;
    protected $allowedFields = ['employee_name', 'start_date', 'end_date', 'reason', 'status'];
}
