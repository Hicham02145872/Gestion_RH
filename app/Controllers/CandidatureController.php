<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CandidatureModel;
use App\Models\OffreModel;
use App\Entities\Candidature;

class CandidatureController extends Controller
{
    // Affichage du formulaire de candidature pour une offre donnée
    public function apply($offreId)
    {
        $offreModel = new OffreModel();
        $data['offre'] = $offreModel->find($offreId);
        if (!$data['offre']) {
            return redirect()->to('/loading_page')->with('error', 'Offre non trouvée.');
        }

        return view('candidature', $data);
    }

    public function submit()
    {
        $model = new CandidatureModel();

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

            $candidature = new Candidature();
            $candidature->nom = $this->request->getPost('nom');
            $candidature->prenom = $this->request->getPost('prenom');
            $candidature->email = $this->request->getPost('email');
            $candidature->cv = $cvName;
            $candidature->lettre = $lettreName;
            $candidature->photo = $photoName;
            $candidature->offre_id = $this->request->getPost('offre_id'); 

            $model->insert($candidature);

            $id = $model->insertID();

            return redirect()->to('/generate-receipt/' . $id)->with('success', 'Candidature envoyée avec succès! Votre reçu est en cours de téléchargement.');
        } else {
            return redirect()->to('/candidature')->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function candidates($offreId)
    {
        $candidatureModel = new CandidatureModel();
        $offreModel = new OffreModel();

        $offre = $offreModel->find($offreId);

        if (!$offre) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Offre non trouvée.');
        }

        $candidatures = $candidatureModel->where('offre_id', $offreId)->findAll();

        return view('candidats', [
            'offre' => $offre,
            'candidatures' => $candidatures,
        ]);
    }

    public function accepter($id)
    {
        $candidatureModel = new CandidatureModel();
        $offreModel = new OffreModel();

        $candidature = $candidatureModel->find($id);

        if ($candidature) {
            $offre = $offreModel->find($candidature->offre_id);
            $offreTitle = $offre ? $offre->titre : 'Offre inconnue';

            $email = \Config\Services::email();
            $email->setFrom('mehdialtit@gmail.com', 'gestion RH');
            $email->setTo($candidature->email);
            $email->setSubject('Votre Candidature - Acceptée');
            $email->setMessage('Félicitations, votre candidature pour le poste "' . esc($offreTitle) . '" a été acceptée.');

            if ($email->send()) {
                $candidatureModel->delete($id);
                return redirect()->to('/candidats/' . $candidature->offre_id . '/')->with('message', 'Candidat accepté et e-mail envoyé.');
            } else {
                return redirect()->to('/candidats/' . $candidature->offre_id . '/')->with('error', 'Échec de l\'envoi de l\'e-mail.');
            }
        }
    }

    public function refuser($id)
    {
        $candidatureModel = new CandidatureModel();
        $offreModel = new OffreModel();

        $candidature = $candidatureModel->find($id);

        if ($candidature) {
            $offre = $offreModel->find($candidature->offre_id);
            $offreTitle = $offre ? $offre->titre : 'Offre inconnue';

            $email = \Config\Services::email();
            $email->setFrom('mehdialtit@gmail.com', 'Gestion RH');
            $email->setTo($candidature->email);
            $email->setSubject('Votre Candidature - Refusée');
            $email->setMessage('Nous regrettons de vous informer que votre candidature pour le poste "' . esc($offreTitle) . '" a été refusée.');

            if ($email->send()) {
                $candidatureModel->delete($id);
                return redirect()->to('/candidats/' . $candidature->offre_id . '/')->with('message', 'Candidat refusé et e-mail envoyé.');
            } else {
                return redirect()->to('/candidats/' . $candidature->offre_id . '/')->with('error', 'Échec de l\'envoi de l\'e-mail.');
            }
        }
    }
}
