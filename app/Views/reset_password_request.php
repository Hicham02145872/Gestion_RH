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

        .send-reset-container {
            background: white;
            padding: 2.5rem;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                        0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .send-reset-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .send-reset-header h1 {
            color: var(--text-color);
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .send-reset-header p {
            color: var(--secondary-color);
            font-size: 0.975rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .input-group {
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem;
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

        .send-reset-button {
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

        .send-reset-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .send-reset-button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="send-reset-container">
        <div class="send-reset-header">
            <h1>Mot de passe oublié</h1>
            <p>Entrez votre email pour recevoir un lien de réinitialisation.</p>
        </div>

        <form action="/reset-password/sendToken" method="post">
            <div class="form-group">
                <label for="email">Adresse email</label>
                <div class="input-group">
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="exemple@email.com"
                        required
                    >
                </div>
            </div>

            <button type="submit" class="send-reset-button">Envoyer le lien de réinitialisation</button>
        </form>
    </div>
</body>
</html>
