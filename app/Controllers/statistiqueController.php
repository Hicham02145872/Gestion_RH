<?php

namespace App\Controllers;

use App\Models\OffreModel;
use App\Models\CandidatureModel;
use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class StatistiquesController extends Controller
{
    public function index()
    {
        // Charger les modèles
        $offreModel = new OffreModel();
        $candidatModel = new CandidatureModel();
        $employeModel = new EmployeeModel();

        // Récupérer les totaux
        $totalOffres = $offreModel->countAll();
        $totalCandidats = $candidatModel->countAll();
        $totalEmployes = $employeModel->countAll();

        // Passer les données à la vue
        return view('statistiques', [
            'totalOffres' => $totalOffres,
            'totalCandidats' => $totalCandidats,
            'totalEmployes' => $totalEmployes,
        ]);
    }
}