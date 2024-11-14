<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1e40af;
            --secondary-color: #64748b;
            --background-color: #f1f5f9;
            --text-color: #334155;
            --border-radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: var(--background-color);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
            0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            color: var(--text-color);
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: var(--secondary-color);
            font-size: 0.975rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
            font-size: 0.875rem;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-color);
            transition: color 0.3s ease;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem;
            padding-left: 2.75rem;
            border: 2px solid #e2e8f0;
            border-radius: var(--border-radius);
            font-size: 0.975rem;
            transition: all 0.3s ease;
            color: var(--text-color);
        }

        .input-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .input-group input:focus + i {
            color: var(--primary-color);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .remember-me input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            accent-color: var(--primary-color);
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--primary-dark);
        }

        .login-button {
            width: 100%;
            padding: 0.875rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 0.975rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .login-button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="login-header">
        <h1>Connexion</h1>
        <p>Bienvenue ! Veuillez vous connecter pour continuer.</p>
    </div>

    <!-- Display error message if login fails -->
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; margin-bottom: 1rem; text-align: center;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="/login/authenticate" method="post">
        <!-- CSRF Token -->
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="email">Adresse email</label>
            <div class="input-group">
                <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="exemple@email.com"
                        required
                        aria-label="Email"
                >
                <i class="fas fa-envelope"></i>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <div class="input-group">
                <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Entrez votre mot de passe"
                        required
                        aria-label="Mot de passe"
                >
                <i class="fas fa-lock"></i>
            </div>
        </div>

        <div class="remember-forgot">
            <label class="remember-me">
                <input type="checkbox" name="remember" id="remember">
                <span>Se souvenir de moi</span>
            </label>
            <a href="/reset-password" class="forgot-password">Mot de passe oublié ?</a>
        </div>

        <button type="submit" class="login-button">
            Se connecter
        </button>
    </form>
</div>
</body>
</html>
