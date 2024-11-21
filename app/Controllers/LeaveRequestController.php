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
            'employee_name' => 'required|min_length[3]',
            'start_date' => 'required|valid_date',
            'end_date' => 'required|valid_date',
            'reason' => 'required|min_length[10]',
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
    public function listRH()
    {
        $model = new LeaveRequestModel();
        $leaveRequests = $model->findAll();

        return view('leave_requests_rh', ['leaveRequests' => $leaveRequests]);
    }

    // Méthode pour accepter une demande
    public function accept($id)
    {
        $model = new LeaveRequestModel();
        $leaveRequest = $model->find($id);

        if ($leaveRequest && $leaveRequest->status === 'pending') {
            $leaveRequest['status'] = 'accepted';
            $leaveRequest['notification_sent'] = 1;
            $model->save($leaveRequest);

            // Envoyer une notification
            $this->sendNotification($leaveRequest, 'Votre demande de congé a été acceptée.');
        }

        return redirect()->to('/leave-requests-rh')->with('success', 'Demande acceptée avec succès.');
    }

    // Méthode pour refuser une demande
    public function reject($id)
    {
        $model = new LeaveRequestModel();
        $leaveRequest = $model->find($id);

        if ($leaveRequest && $leaveRequest->status === 'pending') {
            $leaveRequest['status'] = 'rejected';
            $leaveRequest['notification_sent'] = 1;
            $model->save($leaveRequest);

            // Envoyer une notification
            $this->sendNotification($leaveRequest, 'Votre demande de congé a été refusée.');
        }

        return redirect()->to('/leave-requests-rh')->with('success', 'Demande refusée avec succès.');
    }

    // Méthode pour envoyer une notification
    private function sendNotification($leaveRequest, $message)
    {
        $email = \Config\Services::email();

        $email->setTo('employee@example.com'); // Remplacez par $leaveRequest['employee_email'] si disponible
        $email->setSubject('Notification de Congé');
        $email->setMessage($message);

        if ($email->send()) {
            log_message('info', 'Notification envoyée à ' . $leaveRequest['employee_name']);
        } else {
            log_message('error', 'Erreur lors de l\'envoi de la notification.');
        }
    }
}
