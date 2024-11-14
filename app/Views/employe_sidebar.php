<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Sidebar Navigation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7fe;
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

        .shortcuts {
            margin-top: 30px;
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
    </style>
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="logo">
            <i class="bx bx-cube-alt"></i>
        </div>

        <nav class="menu">
            <h1 class="menu-header">Menu</h1>

            <div class="menu-item nav-active" data-tooltip="Accueil">
                <i class="bx bx-home-smile"></i>
                <span>Accueil</span>
            </div>
            <div class="menu-item" data-tooltip="Statistiques">
                <i class="bx bx-bar-chart-alt-2"></i>
                <span>Statistiques</span>
            </div>
            <div class="menu-item" data-tooltip="Messages">
                <i class="bx bx-message-square-dots"></i>
                <span>Messages</span>
            </div>
            <div class="menu-item" data-tooltip="Favoris">
                <i class="bx bx-bookmarks"></i>
                <span>Favoris</span>
            </div>
            <div class="menu-item" data-tooltip="Notifications">
                <i class="bx bx-bell"></i>
                <span>Notifications</span>
            </div>
            <div class="menu-item" data-tooltip="Paramètres">
                <i class="bx bx-cog"></i>
                <span>Paramètres</span>
            </div>

            <h1 class="menu-header shortcuts">Raccourcis</h1>
            <div class="menu-item" data-tooltip="Ajouter">
                <i class="bx bx-add-to-queue"></i>
                <span>Ajouter</span>
            </div>
            <div class="menu-item" data-tooltip="Supprimer">
                <i class="bx bx-message-square-minus"></i>
                <span>Supprimer</span>
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
            } else {
                openIcon.style.display = "block";
                closeIcon.style.display = "none";
            }
        });
    </script>
</body>
</html>