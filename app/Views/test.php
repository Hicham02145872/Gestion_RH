<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Employé - RH Portal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        :root {
            --primary-color: #4318FF;
            --primary-dark: #3311CC;
            --primary-light: #F6F8FD;
            --secondary-color: #A3AED0;
            --success-color: #05CD99;
            --warning-color: #FFB547;
            --error-color: #DC3545;
            --background-color: #F4F7FE;
            --surface-color: #ffffff;
            --text-primary: #2B3674;
            --text-secondary: #707EAE;
            --border-radius: 16px;
            --transition: all 0.3s ease;
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
        }

        .main-content {
            margin-left: 270px;
            padding: 2rem;
            transition: var(--transition);
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .welcome-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .profile-picture {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--primary-color);
        }

        .welcome-text h1 {
            font-size: 1.75rem;
            margin-bottom: 0.25rem;
        }

        .welcome-text p {
            color: var(--text-secondary);
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card {
            background: var(--surface-color);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }

        .info-card {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .info-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .info-content h3 {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
        }

        .info-content p {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .info-primary .info-icon {
            background: var(--primary-light);
            color: var(--primary-color);
        }

        .info-success .info-icon {
            background: rgba(5, 205, 153, 0.1);
            color: var(--success-color);
        }

        .info-warning .info-icon {
            background: rgba(255, 181, 71, 0.1);
            color: var(--warning-color);
        }

        .detailed-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .info-section h2 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-list {
            list-style: none;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--primary-light);
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-value {
            font-weight: 500;
        }

        .chart-container {
            height: 300px;
            margin-top: 1rem;
        }

        .badge {
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .badge-success {
            background: rgba(5, 205, 153, 0.1);
            color: var(--success-color);
        }

        .badge-warning {
            background: rgba(255, 181, 71, 0.1);
            color: var(--warning-color);
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            border: none;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 24, 255, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .grid-container {
                grid-template-columns: 1fr;
            }

            .welcome-section {
                flex-direction: column;
                text-align: center;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <?php include 'employe_sidebar.php'; ?>

    <div class="main-content">
        <div class="dashboard-header">
            <div class="welcome-section">
                <div class="profile-picture">
                    <i class="bx bx-user"></i>
                </div>
                <div class="welcome-text">
                    <h1>Hicham Altit</h1>
                    <p>Développeur Junior - Équipe Frontend & Backend</p>
                </div>
            </div>
            <div class="action-buttons">
                <button class="btn btn-primary">
                    <i class="bx bx-edit"></i>
                    Modifier le profil
                </button>
                <button class="btn btn-outline">
                    <i class="bx bx-download"></i>
                    Télécharger CV
                </button>
            </div>
        </div>

        <div class="grid-container">
            <div class="card info-card info-primary">
                <div class="info-icon">
                    <i class="bx bx-calendar"></i>
                </div>
                <div class="info-content">
                    <h3>Jours de congés restants</h3>
                    <p>15 jours</p>
                </div>
            </div>

            <div class="card info-card info-success">
                <div class="info-icon">
                    <i class="bx bx-time"></i>
                </div>
                <div class="info-content">
                    <h3>Ancienneté</h3>
                    <p>3 ans et 2 mois</p>
                </div>
            </div>

            <div class="card info-card info-warning">
                <div class="info-icon">
                    <i class="bx bx-trophy"></i>
                </div>
                <div class="info-content">
                    <h3>Projets complétés</h3>
                    <p>24 projets</p>
                </div>
            </div>
        </div>

        <div class="detailed-info">
            <div class="card">
                <h2>
                    <i class="bx bx-user-pin"></i>
                    Informations personnelles
                </h2>
                <ul class="info-list">
                    <li class="info-item">
                        <span class="info-label">
                            <i class="bx bx-envelope"></i>
                            Email
                        </span>
                        <span class="info-value">hicham.altit@entreprise.com</span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">
                            <i class="bx bx-phone"></i>
                            Téléphone
                        </span>
                        <span class="info-value">+2126 36950188</span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">
                            <i class="bx bx-map"></i>
                            Localisation
                        </span>
                        <span class="info-value">casa, Maroc</span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">
                            <i class="bx bx-calendar"></i>
                            Date d'entrée
                        </span>
                        <span class="info-value">15 Sept 2020</span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">
                            <i class="bx bx-id-card"></i>
                            Statut
                        </span>
                        <span class="info-value">
                            <span class="badge badge-success">CDI</span>
                        </span>
                    </li>
                </ul>
            </div>

            <div class="card">
                <h2>
                    <i class="bx bx-line-chart"></i>
                    Performance
                </h2>
                <div class="chart-container">
                    <canvas id="performanceChart"></canvas>
                </div>
            </div>

            <div class="card">
                <h2>
                    <i class="bx bx-briefcase"></i>
                    Compétences
                </h2>
                <ul class="info-list">
                    <li class="info-item">
                        <span class="info-label">React.js</span>
                        <span class="badge badge-success">Expert</span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">Vue.js</span>
                        <span class="badge badge-success">Avancé</span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">Node.js</span>
                        <span class="badge badge-warning">Intermédiaire</span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">UX Design</span>
                        <span class="badge badge-success">Avancé</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Performance Chart
        const ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Performance mensuelle',
                    data: [85, 88, 92, 89, 94, 96],
                    fill: true,
                    borderColor: '#4318FF',
                    backgroundColor: 'rgba(67, 24, 255, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // Toggle Sidebar if included
        const toggleButton = document.getElementById("toggle-button");
        if (toggleButton) {
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
        }
    </script>
</body>
</html>