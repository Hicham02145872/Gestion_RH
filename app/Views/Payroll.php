<!DOCTYPE html>
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

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: var(--surface-color);
            margin: 15% auto;
            padding: 2rem;
            border-radius: var(--border-radius);
            width: 80%;
            max-width: 500px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--primary-light);
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }

        .close {
            color: var(--text-secondary);
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 1rem;
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

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 24, 255, 0.1);
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'RH_sidebare.php'; ?>
    
    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Gestion de Paie et Avantages Sociaux</h1>
                <div class="breadcrumb">
                    <i class="bx bx-home"></i>
                    <span>Accueil</span>
                    <i class="bx bx-chevron-right"></i>
                    <span>Paie et Avantages</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bx bx-money"></i>
                        Gestion de Paie
                    </h2>
                    <button class="btn btn-primary" onclick="openModal('payrollModal')">
                        <i class="bx bx-plus"></i>
                        Ajouter une Paie
                    </button>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID Employé</th>
                                <th>Salaire de Base</th>
                                <th>Primes</th>
                                <th>Déductions</th>
                                <th>Salaire Net</th>
                                <th>Date de Paiement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($payrolls)): ?>
                                <?php foreach ($payrolls as $payroll): ?>
                                    <tr>
                                        <td><?= $payroll['employee_id']; ?></td>
                                        <td><?= $payroll['basic_salary']; ?></td>
                                        <td><?= $payroll['bonuses']; ?></td>
                                        <td><?= $payroll['deductions']; ?></td>
                                        <td><?= $payroll['net_salary']; ?></td>
                                        <td><?= $payroll['payment_date']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="6">Aucun enregistrement de paie trouvé.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bx bx-heart"></i>
                        Gestion des Avantages
                    </h2>
                    <button class="btn btn-primary" onclick="openModal('benefitModal')">
                        <i class="bx bx-plus"></i>
                        Ajouter un Avantage
                    </button>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID Employé</th>
                                <th>Type d'Avantage</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($benefits)): ?>
                                <?php foreach ($benefits as $benefit): ?>
                                    <tr>
                                        <td><?= $benefit['employee_id']; ?></td>
                                        <td><?= $benefit['benefit_type']; ?></td>
                                        <td><?= $benefit['details']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="3">Aucun enregistrement d'avantages trouvé.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Paie -->
        <div id="payrollModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">Ajouter une Paie</h2>
                    <span class="close" onclick="closeModal('payrollModal')">&times;</span>
                </div>
                <form action="<?= site_url('payroll-benefits/addPayroll'); ?>" method="post">
                    <div class="form-group">
                        <label>ID Employé</label>
                        <input type="number" class="form-control" name="employee_id" required>
                    </div>
                    <div class="form-group">
                        <label>Salaire de Base</label>
                        <input type="number" step="0.01" class="form-control" name="basic_salary" required>
                    </div>
                    <div class="form-group">
                        <label>Primes</label>
                        <input type="number" step="0.01" class="form-control" name="bonuses">
                    </div>
                    <div class="form-group">
                        <label>Déductions</label>
                        <input type="number" step="0.01" class="form-control" name="deductions">
                    </div>
                    <div class="form-group">
                        <label>Date de Paiement</label>
                        <input type="date" class="form-control" name="payment_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter une Paie</button>
                </form>
            </div>
        </div>

        <!-- Modal Avantages -->
        <div id="benefitModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="card-title">Ajouter un Avantage</h2>
                    <span class="close" onclick="closeModal('benefitModal')">&times;</span>
                </div>
                <form action="<?= site_url('payroll-benefits/addBenefit'); ?>" method="post">
                    <div class="form-group">
                        <label>ID Employé</label>
                        <input type="number" class="form-control" name="employee_id" required>
                    </div>
                    <div class="form-group">
                        <label>Type d'Avantage</label>
                        <input type="text" class="form-control" name="benefit_type" required>
                    </div>
                    <div class="form-group">
                        <label>Détails</label>
                        <textarea class="form-control" name="details" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter un Avantage</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Fermer le modal en cliquant en dehors de celui-ci
        window.onclick = function(event) {
            const modals = document.getElementsByClassName('modal');
            for (let modal of modals) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>