<?php
// app/Controllers/GestionOffreController.php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\OffreModel;

class GestionOffreController extends Controller
{
    public function index()
    {
        // Load the model
        $offreModel = new OffreModel();

        // Fetch all offers from the database
        $data['offres'] = $offreModel->findAll();

        // Load the view and pass the $data array, which includes $offres
        return view('g_offres', $data);
    }

    public function store()
    {
        $model = new OffreModel();

        // Validate input fields
        if ($this->validate([
            'titre' => 'required|min_length[3]',
            'description' => 'required|min_length[10]',
            'type' => 'required',
            'salaire' => 'required|numeric',
        ])) {
            // Gather data from POST request
            $data = [
                'titre' => $this->request->getPost('titre'),
                'description' => $this->request->getPost('description'),
                'type' => $this->request->getPost('type'),
                'salaire' => $this->request->getPost('salaire'),
            ];

            // Insert data into the database
            $model->insert($data);

            return redirect()->to('/g_offres')->with('success', 'Offre créée avec succès');
        } else {
            return redirect()->to('/g_offres')->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id)
{
    $model = new OffreModel();
    $offre = $model->find($id);  // Fetch offer by ID

    if (!$offre) {
        // If no offer is found, redirect or show an error
        return redirect()->to('/g_offres')->with('error', 'Offre introuvable.');
    }

    return view('edit_offre', ['offre' => $offre]);
}


    public function update($id)
    {
        $model = new OffreModel();

        // Validate input fields
        if ($this->validate([
            'titre' => 'required|min_length[3]',
            'description' => 'required|min_length[10]',
            'type' => 'required',
            'salaire' => 'required|numeric',
        ])) {
            // Gather data from POST request
            $data = [
                'titre' => $this->request->getPost('titre'),
                'description' => $this->request->getPost('description'),
                'type' => $this->request->getPost('type'),
                'salaire' => $this->request->getPost('salaire'),
            ];

            // Update offer in the database
            $model->update($id, $data);

            return redirect()->to('/g_offres')->with('success', 'Offre mise à jour avec succès');
        } else {
            return redirect()->to('/g_offres/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        $model = new OffreModel();

        // Check if the offer exists before deleting
        if ($model->find($id)) {
            $model->delete($id);
            return redirect()->to('/g_offres')->with('success', 'Offre supprimée avec succès');
        } else {
            return redirect()->to('/g_offres')->with('error', 'Offre introuvable.');
        }
    }
}
