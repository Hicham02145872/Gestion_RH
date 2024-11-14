<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de Candidature</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a56db;
            --border-color: #e5e7eb;
            --text-primary: #111827;
            --text-secondary: #4b5563;
            --background: #f9fafb;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 2rem;
            background: var(--background);
            color: var(--text-primary);
            line-height: 1.5;
        }

        .content {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
            color: var(--text-primary);
        }

        .photo {
            width: 150px; /* Increased size */
            height: 150px;
            border-radius: 4px;
            object-fit: cover;
            border: 1px solid var(--border-color);
        }

        .content-body {
            padding: 1.5rem;
        }

        .intro-text {
            margin-bottom: 1.5rem;
            color: var(--text-secondary);
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }

        .info-table th {
            text-align: left;
            padding: 0.75rem;
            background: var(--background);
            font-weight: 500;
            color: var(--text-primary);
            border: 1px solid var(--border-color);
            width: 30%;
        }

        .info-table td {
            padding: 0.75rem;
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
        }

        .download-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }

        .download-link:hover {
            text-decoration: underline;
        }

        .footer {
            padding: 1.5rem;
            border-top: 1px solid var(--border-color);
            color: var(--text-secondary);
            font-size: 0.875rem;
            text-align: center;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .content {
                box-shadow: none;
                border: none;
            }
        }

        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .header {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="header">
            <h1>Reçu de Candidature</h1><br>
            <?php 
            $image_path = ROOTPATH . 'public/uploads/' . $candidature->photo;
            $data = base64_encode(file_get_contents($image_path));
            $image = 'data:image/jpeg;base64,' . $data;
            ?>
            <img src="<?= $image ?>" alt="Photo de Candidature" class="photo" />
        </div><br>

        <div class="content-body">
            <p class="intro-text">
                Nous confirmons la réception de votre candidature. Voici le récapitulatif des informations fournies :
            </p>

            <table class="info-table">
                <tr>
                    <th>Nom</th>
                    <td> <?= esc($candidature->nom) ?></td>
                </tr>
                <tr>
                    <th>Prénom</th>
                    <td><?= esc($candidature->prenom) ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= esc($candidature->email) ?></td>
                </tr>
                <tr>
                    <th>CV</th>
                    <td>
                        <a class="download-link" href="<?= ROOTPATH . 'public/uploads/' . esc($candidature->cv) ?>" target="_blank">
                            Télécharger le CV
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Lettre de Motivation</th>
                    <td>
                        <a class="download-link" href="<?= ROOTPATH . 'public/uploads/' . esc($candidature->lettre) ?>" target="_blank">
                            Télécharger la Lettre
                        </a>
                    </td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>Nous vous remercions de votre intérêt. Votre candidature sera étudiée avec attention et nous vous contacterons dans les meilleurs délais.</p>
        </div>
    </div>
</body>
</html>
