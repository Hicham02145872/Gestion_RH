    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Offres d'Emploi</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <style>
            :root {
                --primary-color: #0f172a;
                --primary-light: #1e293b;
                --accent-color: #3b82f6;
                --accent-hover: #2563eb;
                --background-light: #f8fafc;
                --text-color: #334155;
                --text-light: #94a3b8;
                --success-color: #10b981;
                --border-radius-sm: 8px;
                --border-radius-lg: 16px;
                --transition: all 0.3s ease;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', system-ui, -apple-system, sans-serif;
                background: var(--background-light);
                color: var(--text-color);
                line-height: 1.6;
            }

            header {
                background: var(--primary-color);
                padding: 1.5rem 2rem;
                position: sticky;
                top: 0;
                z-index: 100;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }

            .header-content {
                max-width: 1200px;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                color: white;
                font-size: 1.5rem;
                font-weight: 700;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .logo i {
                color: var(--accent-color);
            }

            .nav-buttons {
                display: flex;
                gap: 1rem;
            }

            .button {
                padding: 0.75rem 1.5rem;
                border-radius: var(--border-radius-sm);
                border: none;
                font-weight: 500;
                cursor: pointer;
                transition: var(--transition);
                font-size: 0.9rem;
            }

            .button-primary {
                background: var(--accent-color);
                color: white;
            }

            .button-primary:hover {
                background: var(--accent-hover);
            }

            .button-ghost {
                background: transparent;
                color: white;
            }

            .button-ghost:hover {
                background: rgba(255, 255, 255, 0.1);
            }

            main {
                max-width: 1200px;
                margin: 2rem auto;
                padding: 0 2rem;
            }

            .section-title {
                font-size: 2rem;
                color: var(--primary-color);
                margin-bottom: 2rem;
                position: relative;
                padding-bottom: 0.5rem;
            }

            .section-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 60px;
                height: 4px;
                background: var(--accent-color);
                border-radius: 2px;
            }

            .jobs-container {
                background: white;
                padding: 2rem;
                border-radius: var(--border-radius-lg);
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            }

            .job-cards-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                gap: 2rem;
            }

            .job-card {
                background: white;
                border: 1px solid #e2e8f0;
                border-radius: var(--border-radius-lg);
                padding: 1.5rem;
                transition: var(--transition);
                position: relative;
                overflow: hidden;
            }

            .job-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.15);
            }

            .job-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 4px;
                height: 100%;
                background: var(--accent-color);
                opacity: 0;
                transition: var(--transition);
            }

            .job-card:hover::before {
                opacity: 1;
            }

            .job-card h4 {
                color: var(--primary-color);
                font-size: 1.25rem;
                margin-bottom: 1rem;
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .job-card h4 i {
                color: var(--accent-color);
            }

            .job-card p {
                color: var(--text-light);
                margin-bottom: 1rem;
                font-size: 0.95rem;
            }

            .job-info {
                display: flex;
                gap: 1rem;
                margin: 1rem 0;
                flex-wrap: wrap;
            }

            .job-info-item {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: var(--text-color);
                font-size: 0.9rem;
            }

            .apply-button {
                width: 100%;
                background: var(--primary-color);
                color: white;
                padding: 0.75rem;
                border: none;
                border-radius: var(--border-radius-sm);
                font-weight: 500;
                cursor: pointer;
                transition: var(--transition);
                margin-top: 1rem;
            }

            .apply-button:hover {
                background: var(--primary-light);
            }

            footer {
                background: var(--primary-color);
                color: white;
                padding: 3rem 2rem;
                margin-top: 4rem;
            }

            .footer-content {
                max-width: 1200px;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 2rem;
            }

            .footer-links {
                display: flex;
                gap: 2rem;
            }

            .footer-links a {
                color: var(--text-light);
                text-decoration: none;
                transition: var(--transition);
                font-size: 0.9rem;
            }

            .footer-links a:hover {
                color: white;
            }

            @media (max-width: 768px) {
                .job-cards-container {
                    grid-template-columns: 1fr;
                }

                .footer-content {
                    flex-direction: column;
                    text-align: center;
                }

                .footer-links {
                    flex-direction: column;
                    gap: 1rem;
                }
            }
        </style>
    </head>
    <body>
        <header>
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-briefcase"></i>
                    Gestion RH
                </div>
                <nav class="nav-buttons">
                    <button class="button button-ghost">Accueil</button>
                    <button class="button button-ghost">À propos</button>
                    <button class="button button-primary">Contact</button>
                </nav>  
            </div>
        </header>

        <main>
            <h2 class="section-title">Dernières Offres d'Emploi</h2>
            <section class="jobs-container">
                <div class="job-cards-container">
                    <?php foreach ($offres as $offre): ?>
                        <div class="job-card">
                            <h4>
                                <i class="fas fa-briefcase"></i>
                                <?= esc($offre->titre); ?>
                            </h4>
                            <p><?= esc($offre->description); ?></p>
                            <div class="job-info">
                                <span class="job-info-item">
                                    <i class="fas fa-clock"></i>
                                    <?= esc($offre->type); ?>
                                </span>
                                <span class="job-info-item">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <?= esc($offre->salaire); ?> MAD
                                </span>
                            </div>
                            <a href="<?= site_url('candidature') ?>" class="apply-button">Postuler maintenant</a>

                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>

        <footer>
            <div class="footer-content">
                <span>&copy; <?= date("Y"); ?> Gestion RH. Tous droits réservés.</span>
                <div class="footer-links">
                    <a href="#">Politique de confidentialité</a>
                    <a href="#">Conditions d'utilisation</a>
                    <a href="#">FAQ</a>
                </div>
            </div>
        </footer>
    </body>
    <script>
    function redirectToCandidatePage() {
        // Redirects to candidat.php after form submission
        window.location.href = "/candidature";
        return false; // Prevents the default form submission
    }
</script>

    </html>