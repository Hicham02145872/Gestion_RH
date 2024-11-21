<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés</title>
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
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

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
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

        tbody tr:hover {
            background: var(--primary-light);
        }

        td {
            border-bottom: 1px solid var(--primary-light);
            font-size: 0.875rem;
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
    </style>
</head>
<body>
<?php include 'employe_sidebar.php'; ?>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Gestion des Employés</h1>
            <div class="breadcrumb">
                <i class="bx bx-home"></i>
                <span>Accueil</span>
                <i class="bx bx-chevron-right"></i>
                <span>Gestion des Employés</span>
            </div>
        </div>

        <!-- Success/Error Message -->
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
                    Ajouter un Employé
                </h2>
            </div>
            <form action="/gestion_employee/add" method="post">
                <?= csrf_field() ?>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="position">Poste</label>
                        <input type="text" class="form-control" name="position" id="position" required>
                    </div>

                    <div class="form-group">
                        <label for="department">Département</label>
                        <input type="text" class="form-control" name="department" id="department">
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>

                    <div class="form-group">
                        <label for="status">Statut</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Active">Actif</option>
                            <option value="On Leave">En congé</option>
                            <option value="Inactive">Inactif</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-save"></i>
                    Enregistrer
                </button>
            </form>
        </div>

        <!-- Employee Table -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="bx bx-list-ul"></i>
                    Liste des Employés
                </h2>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Poste</th>
                            <th>Département</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td><?= esc($employee->id) ?></td>
                                <td><?= esc($employee->name) ?></td>
                                <td><?= esc($employee->email) ?></td>
                                <td><?= esc($employee->position) ?></td>
                                <td><?= esc($employee->department) ?></td>
                                <td><?= esc($employee->status) ?></td>
                                <td>
                                    <button class="action-btn">
                                        <i class="bx bx-pencil"></i>
                                    </button>
                                    <button class="action-btn delete-btn">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
