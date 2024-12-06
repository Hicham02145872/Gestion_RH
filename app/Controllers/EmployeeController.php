<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\Email\Email;

class EmployeeController extends Controller
{
    // definir le model des employé
    protected $employeeModel;

    public function __construct()
    {
        // inisialiser le model des employé
        $this->employeeModel = new EmployeeModel();
    }

    // afficher tout les employé
    public function index()
    {
        // recuperer tout les employé du model
        $data['employees'] = $this->employeeModel->findAll();
        
        // charger la vue de gestion des employé et passer les donnés
        return view('gestion_employee', $data);
    }

    // montrer un form pour ajouter un nouveau employé
    public function create()
    {
        return view('gestion_employee/create');
    }

    // ajouter un employé et creer un compte utilisateur
    public function add()
    {
        $data = $this->request->getPost();

        // valider les donnés du employé
        if ($this->validate([
            'name'      => 'required|min_length[3]|max_length[100]|alpha_space',
            'email'     => 'required|valid_email|max_length[100]',
            'position'  => 'required|min_length[3]|max_length[50]',
            'phone'     => 'required|numeric|max_length[20]',
            'status'    => 'required|max_length[20]',
            'hire_date' => 'required|valid_date',
            'department' => 'required|min_length[3]|max_length[100]',
            'salary'    => 'required|numeric',
        ])) {

            // inserer les donnés de l'employé dans la base de donnée
            $employeeId = $this->employeeModel->insert($data);

            if ($employeeId) {
                // genérer un mot de passe aleatoire pour l'utilisateur
                $password = bin2hex(random_bytes(8));

                // preparation des donnés pour l'utilisateur
                $userData = [
                    'email'    => $data['email'],
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role_id'  => 1, // Definir le role de l'utilisateur (ici 1 pour employé)
                    'username' => $data['name'],
                ];

                // inserer l'utilisateur dans le model User
                $UserModel = new UserModel();
                $userId = $UserModel->insert($userData);

                if ($userId) {
                    // mettre à jour l'employé avec l'ID de l'utilisateur
                    $this->employeeModel->update($employeeId, ['user_id' => $userId]);

                    // envoyer un email de bienvenue au employé
                    $this->sendEmail($data['email'], $password);

                    return redirect()->to('/gestion_employee')->with('success', 'Employé et utilisateur ajouter avec succès.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Echec de la création de l\'utilisateur.');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Echec d\'ajout de l\'employé.');
            }
        }

        return redirect()->back()->withInput();
    }

    // envoyer un email au employé avec ses identifiants
    private function sendEmail($email, $password)
    {
        // initialiser le service email
        $emailService = \Config\Services::email();

        // définir les paramètres du mail
        $emailService->setTo($email);
        $emailService->setFrom('mehdialtit@gmail.com', 'Gestion RH');
        $emailService->setSubject('Votre compte employé à été créer avec succès !');
        $emailService->setMessage(
            "Félicitations, vous êtes maintenant prêt(e) à accéder à votre espace. Pour vous connecter, veuillez utiliser les informations suivantes :\n\n" .
            "Email : $email\nMot de passe : $password"
        );

        // envoyer le mail et vérifier s'il y a une erreur
        if (!$emailService->send()) {
            log_message('error', 'Echec de l\'envoi de l\'email de création de compte: ' . $emailService->printDebugger(['headers']));
        }
    }

    // afficher un formulaire pour modifier un employé
    public function edit($id)
    {
        $data['employee'] = $this->employeeModel->find($id);

        // gérer le cas ou l'employé n'existe pas
        if (!$data['employee']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Employé non trouvé');
        }

        return view('edit', $data);
    }

    // mettre à jour les données d'un employé
    public function update($id)
    {
        $data = $this->request->getPost();

        // mettre à jour les données dans la base de donnée
        if ($this->employeeModel->update($id, $data)) {
            return redirect()->to('/gestion_employee')->with('success', 'Employé mis à jour avec succès.');
        }

        return redirect()->back()->with('error', 'Echec de mise à jour de l\'employé.');
    }

    // supprimer un employé
    public function delete($id)
    {
        // supprimer l'employé de la base de donnée
        if ($this->employeeModel->delete($id)) {
            return redirect()->to('/gestion_employee')->with('success', 'Employé supprimé avec succès.');
        }

        return redirect()->back()->with('error', 'Echec de suppression de l\'employé.');
    }
}