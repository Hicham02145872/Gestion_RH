<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Congé - RH Portal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4318FF;
            --primary-dark: #3311CC;
            --primary-light: #F6F8FD;
            --secondary-color: #A3AED0;
            --text-primary: #2B3674;
            --text-secondary: #707EAE;
            --background-color: #f4f7fe;
            --surface-color: #ffffff;
            --error-color: #DC3545;
            --success-color: #22c55e;
            --border-radius: 14px;
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
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 270px;
            background: var(--surface-color);
            padding: 20px;
            transition: var(--transition);
            box-shadow: var(--shadow);
            z-index: 1000;
        }

        .sidebar.active {
            width: 80px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .logo i {
            font-size: 32px;
            color: var(--primary-color);
        }

        .logo-text {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .sidebar.active .logo-text,
        .sidebar.active .menu-item span,
        .sidebar.active .logout span,
        .sidebar.active .menu-header {
            display: none;
        }

        /* Menu Styles */
        .menu-header {
            color: var(--secondary-color);
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 30px 0 15px 10px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 5px;
            cursor: pointer;
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .menu-item i {
            font-size: 20px;
            color: var(--secondary-color);
            margin-right: 15px;
            transition: var(--transition);
        }

        .menu-item span {
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 500;
        }

        .menu-item:hover {
            background: var(--primary-light);
        }

        .menu-item:hover i,
        .menu-item:hover span {
            color: var(--primary-color);
        }

        .menu-item.nav-active {
            background: var(--primary-color);
        }

        .menu-item.nav-active i,
        .menu-item.nav-active span {
            color: white;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 270px;
            padding: 2rem;
            transition: var(--transition);
        }

        .sidebar.active ~ .main-content {
            margin-left: 80px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: var(--surface-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            margin-bottom: 2rem;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .card-subtitle {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .form-group label i {
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: var(--border-radius);
            font-size: 0.875rem;
            transition: var(--transition);
            background: var(--surface-color);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
            justify-content: center;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Alert Styles */
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
                width: 270px;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .sidebar.active ~ .main-content {
                margin-left: 0;
            }

            .card {
                padding: 1.5rem;
            }
        }

        /* Animations */
        @keyframes slideIn {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <?php include 'employe_sidebar.php'; ?>

    <div class="main-content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Demande de Congé</h1>
                    <p class="card-subtitle">Remplissez le formulaire pour soumettre votre demande de congé</p>
                </div>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <i class="bx bx-check-circle"></i>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-error">
                        <i class="bx bx-error-circle"></i>
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/leave-request/submit">
                    <div class="form-group">
                        <label>
                            <i class="bx bx-user"></i>
                            Nom
                        </label>
                        <input type="text" class="form-control" name="employee_name" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <i class="bx bx-calendar"></i>
                            Date de début
                        </label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <i class="bx bx-calendar-check"></i>
                            Date de fin
                        </label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <i class="bx bx-message-square-detail"></i>
                            Motif
                        </label>
                        <textarea class="form-control" name="reason" rows="3" placeholder="Motif de votre demande" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-send"></i>
                        Soumettre la demande
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle Sidebar
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

        // Auto-hide alerts
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    alert.style.transition = 'opacity 1s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.style.display = 'none', 1000);
                });
            }, 3000);
        });
    </script>
</body>
</html>