<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function employee()
    {
        // Vérifiez si la session de l'utilisateur existe (s'il est connecté)
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');  // Redirige vers la page de connexion si la session n'existe pas
        }
        // Si l'utilisateur est connecté, afficher le tableau de bord
        return view('leave_request');   
    }

    public function rh()
    {
        // Vérifiez si la session de l'utilisateur existe (s'il est connecté)
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');  // Redirige vers la page de connexion si la session n'existe pas
        }

        // Si l'utilisateur est connecté, afficher le tableau de bord RH
        return view('leave_calendar');
    }
}
