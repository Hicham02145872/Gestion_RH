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

    // Soumet une demande de congé
    public function submit()
    {
        $model = new LeaveRequestModel(); // Crée une instance du modèle LeaveRequestModel
        $session = session(); // Récupère la session en cours

        // Récupérer les informations de l'utilisateur connecté depuis la session
        $employeeEmail = $session->get('email');

        // Vérifier si l'utilisateur est authentifié (si l'email de l'employé est présent)
        if (!$employeeEmail) {
            return redirect()->to('/leave-request') // Redirige vers la page de demande de congé si l'utilisateur n'est pas authentifié
                ->withInput() // Garder les données saisies dans le formulaire
                ->with('errors', ['user' => 'Utilisateur non identifié.']); // Affiche un message d'erreur
        }

        // Définir les règles de validation du formulaire
        $validationRules = [
            'employee_name' => 'required|min_length[3]', 
            'start_date' => 'required|valid_date', 
            'end_date' => 'required|valid_date', 
            'reason' => 'required|min_length[10]', 
        ];

        if ($this->validate($validationRules)) {
            // Créer une entité LeaveRequest avec les données du formulaire
            $leaveRequest = new LeaveRequest([
                'employee_name' => $this->request->getPost('employee_name'), 
                'start_date' => $this->request->getPost('start_date'), 
                'end_date' => $this->request->getPost('end_date'), 
                'reason' => $this->request->getPost('reason'), 
                'employee_email' => $employeeEmail, 
                'status' => 'Pending',
            ]);

            // Enregistrer la demande de congé dans la base de données
            if ($model->insert($leaveRequest)) {
                return redirect()->to('/leave-request') // Rediriger vers la page de demande de congé
                    ->with('success', 'Demande de congé envoyée avec succès.'); 
            }

            // Si l'insertion échoue, rediriger avec les erreurs du modèle
            return redirect()->to('/leave-request')
                ->withInput() // Garder les données saisies
                ->with('errors', $model->errors()); 
        }

        // Si la validation échoue, rediriger avec les erreurs de validation
        return redirect()->to('/leave-request')
            ->withInput()
            ->with('errors', $this->validator->getErrors()); // Afficher les erreurs de validation
    }

    // Liste des demandes de congé pour le département RH
    public function listRH()
    {
        $model = new LeaveRequestModel(); // Crée une instance du modèle LeaveRequestModel
        $leaveRequests = $model->findAll(); // Récupère toutes les demandes de congé

        // Affiche la vue 'leave_requests_rh' avec la liste des demandes de congé
        return view('leave_requests_rh', ['leaveRequests' => $leaveRequests]);
    }

    // Accepter une demande de congé
    public function accept($id)
    {
        // Appelle la méthode pour mettre à jour le statut de la demande et envoyer la notification
        $this->updateLeaveRequestStatus($id, 'accepted', 'Votre demande de congé a été acceptée.');
        return redirect()->to('/leave-requests-rh')->with('success', 'Demande acceptée avec succès.');
    }

    // Rejeter une demande de congé
    public function reject($id)
    {
        // Appelle la méthode pour mettre à jour le statut de la demande et envoyer la notification
        $this->updateLeaveRequestStatus($id, 'rejected', 'Votre demande de congé a été refusée.');
        return redirect()->to('/leave-requests-rh')->with('success', 'Demande refusée avec succès.');
    }

    // Met à jour le statut d'une demande de congé et envoie une notification par email
    private function updateLeaveRequestStatus($id, $status, $message)
    {
        $model = new LeaveRequestModel(); // Crée une instance du modèle LeaveRequestModel
        $leaveRequest = $model->find($id); // Trouve la demande de congé par son ID

        // Vérifie si la demande existe et si son statut est toujours "Pending"
        if ($leaveRequest && $leaveRequest['status'] === 'Pending') {
            $leaveRequest['status'] = $status; // Met à jour le statut de la demande (accepté ou rejeté)
            $leaveRequest['notification_sent'] = 1; // Indique que la notification a été envoyée
            $model->save($leaveRequest); // Sauvegarde les changements dans la base de données

            // Envoie une notification par email à l'employé
            $this->sendNotification($leaveRequest, $message);
        }
    }

    // Envoie une notification par email à l'employé
    private function sendNotification($leaveRequest, $message)
    {
        $emailService = \Config\Services::email(); // Charge le service d'email

        // Configuration de l'email
        $emailService->setFrom('mehdialtit@gmail.com', 'Gestion RH');
        $emailService->setTo($leaveRequest['employee_email']);
        $emailService->setSubject('Notification de Congé');
        $emailService->setMessage($message);

        // Envoie l'email et enregistre les logs
        if ($emailService->send()) {
            log_message('info', "Notification envoyée à {$leaveRequest['employee_email']}");
        } else {
            log_message('error', 'Erreur lors de l\'envoi de l\'email: ' . $emailService->printDebugger(['headers', 'subject', 'message']));
        }
    }

    // Affiche le calendrier des demandes de congé
    public function calendar()
    {
        return view('leave_calendar'); // Affiche la vue 'leave_calendar'
    }

    // Récupère toutes les demandes de congé acceptées et les renvoie sous forme d'événements pour le calendrier
    public function getAcceptedRequests()
    {
        $model = new LeaveRequestModel(); // Crée une instance du modèle LeaveRequestModel
        $leaveRequests = $model->where('status', 'Accepted')->findAll(); // Récupère les demandes acceptées

        // Prépare les événements pour le calendrier
        $events = array_map(function ($request) {
            return [
                'title' => $request['employee_name'], // Titre de l'événement (nom de l'employé)
                'start' => $request['start_date'], // Date de début de la demande
                'end' => date('Y-m-d', strtotime($request['end_date'] . ' +1 day')), // Date de fin de la demande (inclusivité pour FullCalendar)
                'description' => $request['reason'], // Raison de la demande
            ];
        }, $leaveRequests);

        // Renvoie les événements sous forme de JSON
        return $this->response->setJSON($events);
    }
}
