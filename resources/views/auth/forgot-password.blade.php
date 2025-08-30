<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération de mot de passe</title>
    <style>
        /* Styles de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f8fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Section publicité à gauche */
        .ad-section {
            flex: 1;
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .ad-content {
            max-width: 500px;
            margin: 0 auto;
            z-index: 2;
            position: relative;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }
        
        .logo-icon {
            background: white;
            color: #4ca1af;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }
        
        .ad-title {
            font-size: 32px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .ad-description {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .ad-features {
            list-style: none;
            margin-top: 30px;
        }
        
        .ad-features li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .ad-features li::before {
            content: "✓";
            background: rgba(255, 255, 255, 0.2);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }
        
        .ad-background-shape {
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        /* Section formulaire à droite */
        .form-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .form-container {
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-title {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .form-description {
            color: #7a7a7a;
            font-size: 16px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
        }
        
        .form-input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #4ca1af;
            box-shadow: 0 0 0 2px rgba(76, 161, 175, 0.2);
        }
        
        .btn-primary {
            width: 100%;
            padding: 14px;
            background: #4ca1af;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .btn-primary:hover {
            background: #3d8d9a;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 25px;
        }
        
        .back-link {
            color: #4ca1af;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .back-link:hover {
            color: #3d8d9a;
            text-decoration: underline;
        }
        
        .status-message {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            background: #f1f9ff;
            color: #0c5cb3;
            border-left: 4px solid #0c5cb3;
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }
        
        /* Responsive */
        @media (max-width: 900px) {
            .container {
                flex-direction: column;
            }
            
            .ad-section {
                padding: 30px 20px;
            }
            
            .form-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Section publicité à gauche -->
        <div class="ad-section">
            <div class="ad-background-shape"></div>
            <div class="ad-content">
                <div class="logo">
                    <div class="logo-icon">SL</div>
                    SecureLogin
                </div>
                <h2 class="ad-title">La sécurité avant tout</h2>
                <p class="ad-description">Notre système de récupération de mot de passe garantit la protection de vos données personnelles avec un chiffrement de niveau bancaire.</p>
                
                <ul class="ad-features">
                    <li>Authentification à deux facteurs disponible</li>
                    <li>Surveillance 24h/24 contre les activités suspectes</li>
                    <li>Conformité RGPD pour la protection des données</li>
                    <li>Support client disponible 7j/7</li>
                </ul>
            </div>
        </div>
        
        <!-- Section formulaire à droite -->
        <div class="form-section">
            <div class="form-container">
                <div class="form-header">
                    <h1 class="form-title">Mot de passe oublié?</h1>
                    <p class="form-description">Indiquez votre adresse email et nous vous enverrons un lien de réinitialisation.</p>
                </div>
                
                <!-- Simuler le statut de session -->
                <div class="status-message">
                    Un lien de réinitialisation a été envoyé à votre adresse email.
                </div>
                
                <form method="POST" action="#">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-input" type="email" name="email" required autofocus>
                        <!-- Simuler un message d'erreur -->
                        <div class="error-message">
                            L'adresse email n'est pas associée à un compte.
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-primary">
                        Envoyer le lien de réinitialisation
                    </button>
                </form>
                
                <div class="form-footer">
                    <a href="#" class="back-link">← Retour à la connexion</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>