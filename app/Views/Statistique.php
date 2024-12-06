[19:05, 06/12/2024] Hicham Al: <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Paie et Avantages Sociaux</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
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
            --tex…
[19:05, 06/12/2024] Hicham Al: pyroll
[19:05, 06/12/2024] Hicham Al: <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Analytics Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #4318FF;
            --primary-dark: #3613cc;
            --primary-light: #F6F8FD;
            --secondary-color: #A3AED0;
            --background-color: #f4f7fe;
            --surface-color: #ffffff;
            --text-primary: #2B3674;
            --text-secondary: #A3AED0;
            --border-radius: 14px;
            --transition: all 0.2s ease;
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
            margin-left: 300px;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid rgba(67, 24, 255, 0.1);
            padding-bottom: 1rem;
        }

        .dashboard-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .dashboard-actions {
            display: flex;
            gap: 1rem;
        }

        .action-btn {
            background: var(--primary-light);
            color: var(--primary-color);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
        }

        .action-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 3fr 2fr;
            gap: 2rem;
        }

        .stat-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .stat-card {
            background: var(--surface-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 1.5rem;
            text-align: center;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .recruitment-funnel {
            background: var(--surface-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .funnel-stage {
            display: flex;
            align-items: center;
            background: var(--primary-light);
            border-radius: 8px;
            padding: 1rem;
            transition: var(--transition);
        }

        .funnel-stage:hover {
            background: rgba(67, 24, 255, 0.1);
        }

        .funnel-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-right: 1rem;
        }

        .funnel-details {
            flex-grow: 1;
        }

        .funnel-title {
            font-weight: 600;
            color: var(--text-primary);
        }

        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            .stat-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stat-cards {
                grid-template-columns: 1fr;
            }
            .dashboard-header {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'RH_sidebare.php'; ?>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">
                <i class="bx bx-chart"></i>
                Statistiques
            </h1>
        </div>

        <div class="dashboard-grid">
            <div>
                <div class="stat-cards">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bx bx-briefcase"></i>
                        </div>
                        <div class="stat-value"><?= $totalOffres ?></div>
                        <div class="stat-label">Offres</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bx bx-group"></i>
                        </div>
                        <div class="stat-value"><?= $totalCandidats ?></div>
                        <div class="stat-label">Candidates</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bx bx-user-check"></i>
                        </div>
                        <div class="stat-value"><?= $totalEmployes ?></div>
                        <div class="stat-label">Employees</div>
                    </div>
                </div>
                <div style="margin-top: 2rem;">
                    <canvas id="mainHrChart"></canvas>
                </div>
            </div>

            <div class="recruitment-funnel">
                <h2 style="text-align: center; color: var(--primary-color); margin-bottom: 1rem;">
                    <i class="bx bx-filter"></i> Etapes de recrutement
                </h2>
                
                <div class="funnel-stage">
                    <i class="bx bx-search funnel-icon"></i>
                    <div class="funnel-details">
                        <div class="funnel-title">Sélection des candidatures</div>
                    </div>
                </div>

                <div class="funnel-stage">
                    <i class="bx bx-conversation funnel-icon"></i>
                    <div class="funnel-details">
                        <div class="funnel-title">Entretien initial</div>
                    </div>
                </div>

                <div class="funnel-stage">
                    <i class="bx bx-briefcase funnel-icon"></i>
                    <div class="funnel-details">
                        <div class="funnel-title">Technical Interview</div>
                    </div>
                </div>

                <div class="funnel-stage">
                    <i class="bx bx-check-circle funnel-icon"></i>
                    <div class="funnel-details">
                        <div class="funnel-title">Entretien technique</div>
                    </div>
                </div>

                <div class="funnel-stage">
                    <i class="bx bx-user-plus funnel-icon"></i>
                    <div class="funnel-details">
                        <div class="funnel-title">Embauché</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainCtx = document.getElementById('mainHrChart').getContext('2d');

            const mainChart = new Chart(mainCtx, {
                type: 'bar',
                data: {
                    labels: ['Offres', 'Candidates', 'Employees'],
                    datasets: [{
                        label: 'HR Metrics',
                        data: [<?= $totalOffres ?>, <?= $totalCandidats ?>, <?= $totalEmployes ?>],
                        backgroundColor: [
                            'rgba(67, 24, 255, 0.7)',
                            'rgba(163, 174, 208, 0.7)', 
                            'rgba(34, 197, 94, 0.7)'
                        ],
                        borderRadius: 10
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>
</body>
</html>