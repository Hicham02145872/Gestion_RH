<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Modifier l'Offre</title>
    <style>
        :root {
            --primary-color: #4318FF;
            --primary-dark: #3613cc;
            --primary-light: #F6F8FD;
            --secondary-color: #A3AED0;
            --background-color: #f4f7fe;
            --surface-color: #ffffff;
            --error-color: #DC3545;
            --success-color: #22c55e;
            --text-primary: #2B3674;
            --text-secondary: #A3AED0;
            --border-radius: 14px;
            --transition: all 0.2s ease;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background-color);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .main-content {
            margin-left: 270px;
            padding: 2rem;
            transition: var(--transition);
        }

        .sidebar.active + .main-content {
            margin-left: 80px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .card {
            background: var(--surface-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
            margin-bottom: 2rem;
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-title i {
            color: var(--primary-color);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .form-group {
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--primary-light);
            border-radius: var(--border-radius);
            font-size: 0.875rem;
            transition: var(--transition);
            background: var(--surface-color);
        }

        .form-control:hover {
            border-color: var(--primary-color);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 24, 255, 0.1);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: var(--border-radius);
            border: none;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: var(--secondary-color);
            color: var(--text-primary);
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: slideIn 0.3s ease;
        }

        .alert-success {
            background: #f0fdf4;
            border-left: 4px solid var(--success-color);
            color: #166534;
        }

        .alert-error {
            background: #fef2f2;
            border-left: 4px solid var(--error-color);
            color: #991b1b;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 80px;
                padding: 1rem;
            }

            .card {
                padding: 1.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include 'employe_sidebar.php'; ?>
    
    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Modifier l'Offre</h1>
                <div class="breadcrumb">
                    <i class="bx bx-home"></i>
                    <span>Accueil</span>
                    <i class="bx bx-chevron-right"></i>
                    <span>Gestion des Offres</span>
                    <i class="bx bx-chevron-right"></i>
                    <span>Modifier l'Offre</span>
                </div>
            </div>

            <?php if (session()->has('errors')): ?>
                <div class="alert alert-error">
                    <i class="bx bx-error-circle"></i>
                    <?= session('errors') ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bx bx-edit"></i>
                        Modifier l'offre
                    </h2>
                </div>
                <form action="/g_offres/update/<?= esc($offre->id) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>
                                <i class="bx bx-briefcase"></i>
                                Titre
                            </label>
                            <input type="text" class="form-control" name="titre" value="<?= esc($offre->titre) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>
                                <i class="bx bx-file"></i>
                                Type de contrat
                            </label>
                            <select class="form-control" name="type" required>
                                <option value="CDI" <?= $offre->type === 'CDI' ? 'selected' : '' ?>>CDI</option>
                                <option value="CDD" <?= $offre->type === 'CDD' ? 'selected' : '' ?>>CDD</option>
                                <option value="Stage" <?= $offre->type === 'Stage' ? 'selected' : '' ?>>Stage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                <i class="bx bx-money"></i>
                                Salaire annuel (MAD)
                            </label>
                            <input type="number" class="form-control" name="salaire" value="<?= esc($offre->salaire) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>
                                <i class="bx bx-detail"></i>
                                Description
                            </label>
                            <textarea class="form-control" name="description" rows="4" required><?= esc($offre->description) ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save"></i>
                        Mettre à jour l'offre
                    </button>
                    <a href="/g_offres" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i>
                        Annuler
                    </a>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Script for sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById("toggle-button");
            const sidebar = document.getElementById("sidebar");
            const mainContent = document.querySelector(".main-content");

            if (toggleButton && sidebar) {
                toggleButton.addEventListener("click", () => {
                    if (sidebar.classList.contains("active")) {
                        mainContent.style.marginLeft = "80px";
                    } else {
                        mainContent.style.marginLeft = "270px";
                    }
                });
            }
        });
    </script>
</body>
</html>