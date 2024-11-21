<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Liste des Offres</title>
    <style>
        :root {
            --primary-color: #4318FF;
            --primary-dark: #2563eb;
            --primary-light: #F6F8FD;
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

        .main-content {
            margin-left: 270px;
            padding: 2rem;
            transition: margin 0.3s ease;
            min-height: 100vh;
        }

        .job-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
        }

        .job-card {
            background-color: var(--surface-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px -4px rgba(0,0,0,0.08), 0 6px 15px -2px rgba(0,0,0,0.04);
        }

        .job-info {
            margin-bottom: 1rem;
        }

        .job-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .job-description {
            color: var(--text-secondary);
            font-size: 0.95rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .job-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 1rem;
            border-top: 1px solid var(--border-color);
            padding-top: 1rem;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .page-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            gap: 1rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }
            .main-content {
                margin-left: 80px;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="logo">
            <i class="bx bx-cube-alt"></i>
        </div>

        <nav class="menu">
            <h1 class="menu-header">Menu</h1>

            <div class="menu-item nav-active" data-tooltip="Offres">
                <i class="bx bx-briefcase"></i>
                <span>Offres</span>
            </div>
            <div class="menu-item" data-tooltip="Candidats">
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
        <div class="page-header">
            <i class='bx bx-briefcase' style="font-size: 1.75rem; color: var(--primary-color)"></i>
            <h1 class="page-title">Liste des Offres</h1>
        </div>

        <div class="job-list">
            <?php foreach ($offres as $offre): ?>
            <div class="job-card">
                <div class="job-info">
                    <h2 class="job-title"><?= esc($offre->titre) ?></h2>
                    <p class="job-description"><?= esc($offre->description) ?></p>
                </div>
                <div class="job-actions">
                    <a href="<?= site_url('candidats/' . $offre->id) ?>" class="action-btn">
                        <i class='bx bx-user'></i>
                        <span>Voir candidats</span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
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