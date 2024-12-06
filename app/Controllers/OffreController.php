<?php
namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\OffreModel;

class OffreController extends Controller
{
    public function index()
    {
        $offreModel = new OffreModel();

        // Récupérer toutes les offres depuis la base de données
        $offres = $offreModel->findAll();

        // Envoyer les données à la vue
        return view('offres', ['offres' => $offres]);
    }
}