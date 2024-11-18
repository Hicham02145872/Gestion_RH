    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">
        <title>Formulaire de Candidature</title>
        <style>
            .alert {
                padding: 1rem;
                margin-bottom: 1.5rem;
                border: 1px solid transparent;
                border-radius: var(--border-radius);
                opacity: 0;
                transition: opacity 1s ease-in-out, transform 0.5s ease-in-out;
                transform: translateY(-20px);
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 1000;
            }

            .alert-success {
                color: #155724;
                background-color: #d4edda;
                border-color: #c3e6cb;
            }

            .alert-danger {
                color: #721c24;
                background-color: #f8d7da;
                border-color: #f5c6cb;
            }

            .alert.show {
                opacity: 1;
                transform: translateY(0);
            }
        </style>
    </head>
    <body>
        <div class="main-container">
            <!-- Div gauche -->
            <div class="left-side">
                <h2>Bienvenue sur notre portail</h2>
                <p>Déposez votre candidature et rejoignez notre équipe !</p>
            </div>

            <!-- Affichage des messages -->
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success" id="successMessage">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('errors')): ?>
                <div class="alert alert-danger" id="errorMessage">
                    <ul>
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Div droite avec le formulaire -->
            <div class="right-side">
                <div class="header">
                    <h1>Formulaire de Candidature</h1>
                    <p>Veuillez remplir tous les champs obligatoires marqués d'un astérisque (*)</p>
                </div>

                <form id="candidatureForm" action="/submit-candidature/" method="post" enctype="multipart/form-data">
                <input type="hidden" name="offre_id" value="<?= $offre->id ?>">
                    <div class="form-section">
                        <h2>Informations Personnelles</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Nom <span class="required">*</span></label>
                                <input type="text" name="nom" required placeholder="Votre nom">
                            </div>
                            <div class="form-group">
                                <label>Prénom <span class="required">*</span></label>
                                <input type="text" name="prenom" required placeholder="Votre prénom">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <input type="email" name="email" required placeholder="exemple@email.com">
                        </div>
                    </div>

                    <div class="form-section">
                        <h2>Documents</h2>
                        <div class="form-group">
                            <div class="file-upload">
                                <label for="cv"><i class="fas fa-file-pdf"></i> CV (PDF) <span class="required">*</span></label>
                                <input type="file" id="cv" name="cv" accept=".pdf" required>
                                <div class="file-info">Format accepté : PDF (Max. 5MB)</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="file-upload">
                                <label for="lettre"><i class="fas fa-file-alt"></i> Lettre de Motivation (PDF) <span class="required">*</span></label>
                                <input type="file" id="lettre" name="lettre" accept=".pdf" required>
                                <div class="file-info">Format accepté : PDF (Max. 5MB)</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="file-upload">
                                <label for="photo"><i class="fas fa-camera"></i> Photo <span class="required">*</span></label>
                                <input type="file" id="photo" name="photo" accept="image/*" required>
                                <div class="file-info">Format accepté : Image (Max. 5MB)</div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="submit-button">
                        <i class="fas fa-paper-plane"></i> Envoyer ma candidature
                    </button>
                </form>
            </div>
        </div>

        <script>
    function redirectToCandidatePage() {
        // Redirect to the 'candidature' route in CodeIgniter
        window.location.href = "<?= site_url('candidature'); ?>";
        return false; // Prevents the default form submission
    }
</script>

    </body>
    </html>
