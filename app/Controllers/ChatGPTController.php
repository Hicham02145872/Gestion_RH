<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use GuzzleHttp\Client;
use Exception;

class ChatGPTController extends Controller
{
    public function index()
    {
        // Affiche le formulaire sans texte généré par défaut
        return view('chatgpt_view');
    }

    public function generate()
    {
        // Récupère la description et les mots-clés saisis par l'utilisateur
        $description = $this->request->getPost('prompt');
        $keywords = $this->request->getPost('keywords');

        // Construit le prompt en français avec les mots-clés
        $prompt = "Écris une offre d'emploi en français pour le poste suivant : $description. Intègre les mots-clés suivants : $keywords.";

        try {
            // Récupère la clé API depuis l'environnement
            $apiKey = getenv('COHERE_API_KEY');

            if (!$apiKey) {
                throw new Exception("API key is missing");
            }

            // Initialise le client Guzzle
            $client = new Client();

            // Envoyez une requête POST à l'API Cohere
            $response = $client->post('https://api.cohere.ai/v1/generate', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'command-light', // Utilisez un modèle gratuit comme `command-light`
                    'prompt' => $prompt,
                    'max_tokens' => 150,
                    'temperature' => 0.7
                ],
            ]);

            // Analysez la réponse
            $data = json_decode($response->getBody(), true);

            // Récupérez le texte généré
            $generatedText = $data['generations'][0]['text'] ?? 'Aucune réponse de l’IA';

            // Affiche la vue avec le texte généré
            return view('chatgpt_view', ['generatedText' => $generatedText]);

        } catch (Exception $e) {
            // Gère les exceptions et affiche un message d'erreur
            return view('chatgpt_view', ['generatedText' => 'Erreur : ' . $e->getMessage()]);
        }
    }
}
