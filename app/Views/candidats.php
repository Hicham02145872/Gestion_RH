<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidats</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        /* Previous styles from the candidates page */
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #2563eb;
            --primary-light: #eff6ff;
            --secondary-color: #6b7280;
            --background-color: #f8fafc;
            --surface-color: #ffffff;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --border-radius: 16px;
            --shadow: 0 10px 15px -3px rgba(0,0,0,0.05), 0 4px 6px -2px rgba(0,0,0,0.03);
        }

        /* Sidebar styles from the first document */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 270px;
            background: #ffffff;
            padding: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        .sidebar.active {
            width: 80px;
        }

        .sidebar.active .menu-item span,
        .sidebar.active .logout span,
        .sidebar.active .menu-header {
            display: none;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }

        .logo i {
            font-size: 32px;
            color: #4318FF;
        }

        .menu {
            margin-top: 30px;
        }

        .menu-header {
            color: #A3AED0;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            padding-left: 10px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 5px;
            cursor: pointer;
            border-radius: 14px;
            transition: all 0.2s ease;
            position: relative;
        }

        .menu-item i {
            font-size: 20px;
            color: #A3AED0;
            margin-right: 15px;
            transition: all 0.2s ease;
        }

        .menu-item span {
            color: #2B3674;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
        }

        .menu-item:hover {
            background: #F6F8FD;
        }

        .menu-item:hover i,
        .menu-item:hover span {
            color: #4318FF;
        }

        .menu-item.nav-active {
            background: #4318FF;
        }

        .menu-item.nav-active i,
        .menu-item.nav-active span {
            color: #ffffff;
        }

        .logout {
            position: absolute;
            bottom: 30px;
            width: calc(100% - 40px);
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout i {
            font-size: 20px;
            color: #A3AED0;
            margin-right: 15px;
            transition: all 0.2s ease;
        }

        .logout span {
            color: #2B3674;
            font-size: 14px;
            font-weight: 500;
        }

        .logout:hover {
            background: #FFF5F5;
        }

        .logout:hover i,
        .logout:hover span {
            color: #DC3545;
        }

        .toggle-menu {
            position: absolute;
            top: 20px;
            right: -15px;
            width: 30px;
            height: 30px;
            background: #4318FF;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .toggle-menu i {
            font-size: 14px;
            color: #ffffff;
        }

        .toggle-menu:hover {
            transform: scale(1.1);
        }

        /* Tooltip */
        .menu-item[data-tooltip]:hover::before,
        .logout[data-tooltip]:hover::before {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background: #2B3674;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            animation: fadeIn 0.3s ease forwards;
            margin-left: 10px;
        }

        .sidebar.active .menu-item[data-tooltip]:hover::before,
        .sidebar.active .logout[data-tooltip]:hover::before {
            opacity: 1;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Existing candidates page styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--background-color);
            color: var(--text-primary);
            line-height: 1.7;
        }

        .main-content {
            margin-left: 270px;
            padding: 2rem;
            transition: margin 0.3s ease;
            min-height: 100vh;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }
            .main-content {
                margin-left: 80px;
            }
        }
        /* Improved Candidate Card Styles */
.candidates-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.candidate-card {
    background-color: var(--surface-color);
    border-radius: var(--border-radius);
    box-shadow: 0 12px 20px -4px rgba(0, 0, 0, 0.06), 0 4px 10px -2px rgba(0, 0, 0, 0.03);
    padding: 1.5rem;
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
}

.candidate-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 25px -4px rgba(0, 0, 0, 0.08), 0 6px 15px -2px rgba(0, 0, 0, 0.04);
}

.candidate-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    border-bottom: 1px solid var(--border-color);
    padding-bottom: 1rem;
}

.candidate-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text-primary);
}

.candidate-actions {
    display: flex;
    gap: 0.5rem;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.875rem;
    transition: all 0.2s ease;
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

.candidate-contact {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-secondary);
    margin-bottom: 1rem;
}

.candidate-contact i {
    color: var(--primary-color);
}

.document-actions {
    display: flex;
    gap: 1rem;
    border-top: 1px solid var(--border-color);
    padding-top: 1rem;
}

.download-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
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

        /* Rest of the candidates page styles remain the same as in the original document */
        /* ... (all previous CSS for candidates page) ... */
    </style>
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="logo">
            <i class="bx bx-cube-alt"></i>
        </div>

        <nav class="menu">
            <h1 class="menu-header">Menu</h1>

            <div class="menu-item" data-tooltip="Offres">
                <i class="bx bx-briefcase"></i>
                <span>Offres</span>
            </div>
            <div class="menu-item nav-active" data-tooltip="Candidats">
                <i class="bx bx-user"></i>
                <span>Candidats</span>
            </div>
            <div class="menu-item" data-tooltip="Messages">
                <i class="bx bx-message-square-dots"></i>
                <span>Messages</span>
            </div>
            <div class="menu-item" data-tooltip="Statistiques">
                <i class="bx bx-bar-chart-alt-2"></i>
                <span>Statistiques</span>
            </div>
        </nav>

        <div class="logout" data-tooltip="Déconnexion">
            <i class="bx bx-log-out"></i>
            <span>Déconnexion</span>
        </div>

        <div class="toggle-menu" id="toggle-button">
            <i class="bx bxs-right-arrow"></i>
            <i class="bx bxs-left-arrow"></i>
        </div>
    </aside>

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
                                <span class="candidate-name"><?= esc($candidature->nom) ?> <?= esc($candidature->prenom) ?></span>
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
                            <div class="candidate-contact">
                                <i class="bx bx-envelope"></i>
                                <?= esc($candidature->email) ?>
                            </div>
                            <div class="document-actions">
                                <?php if (!empty($candidature->cv)): ?>
                                    <a class="download-link" href="<?= ROOTPATH . 'public/uploads/' . esc($candidature->cv) ?>">
                                        <i class="bx bx-download"></i>
                                        Télécharger CV
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($candidature->lettre)): ?>
                                    <a class="download-link" href="<?= ROOTPATH . 'public/uploads/' . esc($candidature->lettre) ?>">
                                        <i class="bx bx-file"></i>
                                        Télécharger Lettre
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <script>
        const toggleButton = document.getElementById("toggle-button");
        const sidebar = document.getElementById("sidebar");
        const openIcon = toggleButton.querySelector(".bxs-right-arrow");
        const closeIcon = toggleButton.querySelector(".bxs-left-arrow");

        closeIcon.style.display = "none";

        toggleButton.addEventListener("click", () => {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                openIcon.style.display = "none";
                closeIcon.style.display = "block";
                // Adjust main content margin when sidebar is collapsed
                document.querySelector('.main-content').style.marginLeft = "80px";
            } else {
                openIcon.style.display = "block";
                closeIcon.style.display = "none";
                // Restore main content margin when sidebar is expanded
                document.querySelector('.main-content').style.marginLeft = "270px";
            }
        });
    </script>
</body>
</html>