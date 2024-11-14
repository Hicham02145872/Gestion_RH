<?php
// app/Controllers/GestionOffreController.php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\OffreModel;

class Loading_pageController extends Controller
{
    public function index()
{
    $model = new OffreModel();
    $data['offres'] = $model->findAll();

    // Ensure 'loading_page' is the correct view name (without file extension)
    return view('loading_page', $data);
}

}