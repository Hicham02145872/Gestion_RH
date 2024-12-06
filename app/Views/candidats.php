<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidats</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #2563eb;
            --primary-light: #eff6ff;
            --secondary-color: #6b7280;
            --background-color: #f0f4f8;
            --surface-color: #ffffff;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --border-radius: 12px;
            --shadow: 0 12px 24px -4px rgba(0,0,0,0.08), 0 6px 12px -2px rgba(0,0,0,0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--background-color);
            color: var(--text-primary);
            line-height: 1.6;
            margin-left: 250px;
        }

        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .candidates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .candidate-card {
            background-color: var(--surface-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
        }

        .candidate-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.1);
        }

        .candidate-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.25rem;
            background-color: var(--primary-light);
            border-bottom: 1px solid var(--border-color);
        }

        .candidate-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .candidate-name i {
            color: var(--primary-color);
        }

        .candidate-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.2s ease;
            text-transform: uppercase;
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        .candidate-content {
            padding: 1rem 1.25rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .candidate-contact {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text-secondary);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .candidate-contact i {
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .document-actions {
            display: flex;
            gap: 1rem;
            border-top: 1px solid var(--border-color);
            padding: 1rem 1.25rem;
            background-color: var(--primary-light);
        }

        .download-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
            font-size: 0.9rem;
        }

        .download-link:hover {
            color: var(--primary-dark);
        }

        .download-link i {
            font-size: 1.2rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            background-color: var(--primary-light);
            border-radius: var(--border-radius);
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .empty-state h2 {
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--text-secondary);
        }

        @media (max-width: 768px) {
            .candidates-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include('RH_sidebare.php'); ?>

    <main class="main-content">
        <div class="container">
            <h1 class="title">
                <i class="bx bx-user"></i>
                Candidats pour : <?= esc($offre->titre) ?>
            </h1>
            <br>
            <?php if (empty($candidatures)): ?>
                <div class="empty-state">
                    <i class="bx bx-user-x"></i>
                    <h2>Aucune candidature</h2>
                    <p>Il n'y a pas encore de candidatures pour cette offre.</p>
                </div>
            <?php else: ?>
                <div class="candidates-grid">
                    <?php foreach ($candidatures as $candidature): ?>
                        <div class="candidate-card" id="candidate-<?= $candidature->id ?>">
                            <div class="candidate-header">
                                <span class="candidate-name">
                                    <i class="bx bx-user-circle"></i>
                                    <?= esc($candidature->nom) ?> <?= esc($candidature->prenom) ?>
                                </span>
                                <div class="candidate-actions">
                                    <a href="<?= site_url('candidats/accepter/' . $candidature->id) ?>" class="btn btn-success">
                                        <i class="bx bx-check"></i>
                                        Accepter
                                    </a>
                                    <a href="<?= site_url('candidats/refuser/' . $candidature->id) ?>" class="btn btn-danger">
                                        <i class="bx bx-x"></i>
                                        Refuser
                                    </a>
                                </div>
                            </div>
                            <div class="candidate-content">
                                <div class="candidate-contact">
                                    <i class="bx bx-envelope"></i>
                                    <?= esc($candidature->email) ?>
                                </div>
                            </div>
                            <div class="document-actions">
                                <?php if (!empty($candidature->cv)): ?>
                                    <a class="download-link" href="<?= '../../uploads/' . esc($candidature->cv) ?>" target="_blank">
                                        <i class="bx bx-download"></i>
                                        CV
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($candidature->lettre)): ?>
                                    <a class="download-link" href="<?= '../../uploads/' . esc($candidature->lettre) ?>" target="_blank">
                                        <i class="bx bx-file"></i>
                                        Lettre
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>