<?php

namespace App\Controllers;

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

        // Validation des champs du formulaire
        if ($this->validate([
            'employee_name' => 'required',
            'start_date' => 'required|valid_date',
            'end_date' => 'required|valid_date',
            'reason' => 'required',
        ])) {
            $data = [
                'employee_name' => $this->request->getPost('employee_name'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'reason' => $this->request->getPost('reason'),
                'status' => 'Pending',
            ];

            $model->insert($data);

            return redirect()->to('/leave-request')->with('success', 'Demande de congé envoyée avec succès');
        } else {
            return redirect()->to('/leave-request')->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
