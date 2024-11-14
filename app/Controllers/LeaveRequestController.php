<?php

namespace App\Controllers;

use App\Entities\LeaveRequest;
use App\Models\LeaveRequestModel;
use CodeIgniter\Controller;

class LeaveRequestController extends Controller
{
    public function index()
    {
        return view('leave_request');
    }

    public function submit()
    {
        $model = new LeaveRequestModel();

        
        if ($this->validate([
            'employee_name' => 'required-min_length[3]-max_length[255]',
            'start_date' => 'required|valid_date',
            'end_date' => 'required|valid_date',
            'reason' => 'required|min_length[10]-max_length[255]',
        ])) {
        
            $leaveRequest = new LeaveRequest();
            $leaveRequest->employee_name = $this->request->getPost('employee_name');
            $leaveRequest->start_date = $this->request->getPost('start_date');
            $leaveRequest->end_date = $this->request->getPost('end_date');
            $leaveRequest->reason = $this->request->getPost('reason');
           
            $model->insert($leaveRequest);

            return redirect()->to('/leave-request')->with('success', 'Demande de congé envoyée avec succès');
        } else {
            return redirect()->to('/leave-request')->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
