<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Gestion des Offres</title>
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

        .table-container {
            overflow-x: auto;
            border-radius: var(--border-radius);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        th, td {
            padding: 1rem;
            text-align: left;
        }

        th {
            background: var(--primary-light);
            font-weight: 600;
            color: var(--primary-color);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tbody tr {
            transition: var(--transition);
        }

        tbody tr:hover {
            background: var(--primary-light);
        }

        td {
            border-bottom: 1px solid var(--primary-light);
            font-size: 0.875rem;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .badge-cdi {
            background: #ecfdf5;
            color: #059669;
        }

        .badge-cdd {
            background: #fff7ed;
            color: #c2410c;
        }

        .badge-stage {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .action-btn {
            padding: 0.5rem;
            border-radius: 50%;
            border: none;
            background: transparent;
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition);
        }

        .action-btn:hover {
            background: var(--primary-light);
            color: var(--primary-color);
            transform: scale(1.1);
        }

        .delete-btn:hover {
            background: #FFF5F5;
            color: var(--error-color);
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
                <h1 class="page-title">Gestion des Offres</h1>
                <div class="breadcrumb">
                    <i class="bx bx-home"></i>
                    <span>Accueil</span>
                    <i class="bx bx-chevron-right"></i>
                    <span>Gestion des Offres</span>
                </div>
            </div>

            <?php if (session()->has('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            
            <?php if (session()->has('errors')): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php foreach (session('errors') as $error): ?>
                        <p><?= esc($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bx bx-plus-circle"></i>
                        Créer une nouvelle offre
                    </h2>
                </div>
                <form action="/g_offres/store" method="post">
                    <?= csrf_field() ?>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>
                                <i class="bx bx-briefcase"></i>
                                Titre du poste
                            </label>
                            <input type="text" class="form-control" name="titre" placeholder="Ex: Développeur Full Stack" required>
                        </div>
                        <div class="form-group">
                            <label>
                                <i class="bx bx-file"></i>
                                Type de contrat
                            </label>
                            <select class="form-control" name="type" required>
                                <option value="">Sélectionnez un type</option>
                                <option value="CDI">CDI</option>
                                <option value="CDD">CDD</option>
                                <option value="Stage">Stage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                <i class="bx bx-money"></i>
                                Salaire annuel (MAD)
                            </label>
                            <input type="number" class="form-control" name="salaire" placeholder="Ex: 45000" required>
                        </div>
                        <div class="form-group">
                            <label>
                                <i class="bx bx-detail"></i>
                                Description du poste
                            </label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Décrivez les responsabilités et exigences du poste..." required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-plus"></i>
                        Publier l'offre
                    </button>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bx bx-list-ul"></i>
                        Liste des offres
                    </h2>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Type</th>
                                <th>Salaire</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($offres as $offre): ?>
                                <tr>
                                    <td>
                                        <strong><?= esc($offre->titre) ?></strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-<?= strtolower($offre->type) ?>">
                                            <?= esc($offre->type) ?>
                                        </span>
                                    </td>
                                    <td><?= number_format((float)$offre->salaire, 0, ',', ' ') ?> MAD</td>
                                    <td><?= esc($offre->description) ?></td>
                                    <td>
                                        <a href="/g_offres/edit/<?= $offre->id ?>" class="action-btn" title="Modifier">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="/g_offres/delete/<?= $offre->id ?>" 
                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?');" 
                                           class="action-btn delete-btn" 
                                           title="Supprimer">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Script for sidebar toggle and alert auto-hide
        document.addEventListener('DOMContentLoaded', function() {
            // Alert auto-hide
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.style.display = 'none', 500);
                });
            }, 1000);

            // Sidebar toggle adjustment
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