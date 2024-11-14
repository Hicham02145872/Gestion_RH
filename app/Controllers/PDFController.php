<?php
namespace App\Controllers;

use App\Models\CandidatureModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends BaseController
{
    public function generateReceipt($id)
    {
        $model = new CandidatureModel();
        $data['candidature'] = $model->find($id);

        // Vérifiez que la candidature a été trouvée
        if (!$data['candidature']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Candidature with ID $id not found");
        }

        // Charger la vue
        $html = view('receipt', $data);

        // Initialiser Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Générer le fichier PDF
        $dompdf->stream('receipt.pdf', array('Attachment' => 1));
    }
}
