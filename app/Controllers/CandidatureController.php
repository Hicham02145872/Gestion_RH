<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CandidatureModel;
use App\Entities\Candidature;

class CandidatureController extends Controller
{
    public function index()
    {
        return view('candidature');
    }

    public function submit()
    {
        $model = new CandidatureModel();

        // Validation du formulaire
        if ($this->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|valid_email',
            'cv' => 'uploaded[cv]|mime_in[cv,application/pdf]|max_size[cv,5120]',
            'lettre' => 'uploaded[lettre]|mime_in[lettre,application/pdf]|max_size[lettre,5120]',
            'photo' => 'uploaded[photo]|is_image[photo]|max_size[photo,5120]',
        ])) {
            $cv = $this->request->getFile('cv');
            $lettre = $this->request->getFile('lettre');
            $photo = $this->request->getFile('photo');

            $cvName = $cv->getRandomName();
            $lettreName = $lettre->getRandomName();
            $photoName = $photo->getRandomName();

            $cv->move(ROOTPATH . 'public/uploads', $cvName);
            $lettre->move(ROOTPATH . 'public/uploads', $lettreName);
            $photo->move(ROOTPATH . 'public/uploads', $photoName);

            // Créer une nouvelle instance de l'entité Candidature
            $candidature = new Candidature();
            $candidature->nom = $this->request->getPost('nom');
            $candidature->prenom = $this->request->getPost('prenom');
            $candidature->email = $this->request->getPost('email');
            $candidature->cv = $cvName;
            $candidature->lettre = $lettreName;
            $candidature->photo = $photoName;

            // Insérer la candidature dans la base de données
            $model->insert($candidature);

            // Récupérer l'ID de la dernière insertion
            $id = $model->insertID();

            return redirect()->to('/generate-receipt/' . $id)->with('success', 'Candidature envoyée avec succès! Votre reçu est en cours de téléchargement.');
        } else {
            return redirect()->to('/candidature')->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
