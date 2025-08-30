<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouveau projet - SAAHDEL ONG</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #34C759;
            --dark-green: #2E865F;
            --primary-blue: #4682B4;
            --light-bg: #f8f9fa;
            --border-color: #dee2e6;
        }
        
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .project-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-top: 4px solid var(--primary-green);
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--primary-blue);
        }
        
        .page-title {
            color: var(--primary-blue);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(70, 130, 180, 0.25);
        }
        
        .form-control::placeholder {
            color: #6c757d;
            opacity: 0.7;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #5a9bd5 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(70, 130, 180, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(70, 130, 180, 0.4);
            background: linear-gradient(135deg, #5a9bd5 0%, var(--primary-blue) 100%);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #868e96 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }
        
        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }
        
        .form-icon {
            color: var(--primary-green);
            margin-right: 0.5rem;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #5a9bd5 100%);
            color: white;
            font-weight: 600;
            border-radius: 12px 12px 0 0 !important;
            padding: 1rem 1.5rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .required-field::after {
            content: "*";
            color: #dc3545;
            margin-left: 0.25rem;
        }
        
        @media (max-width: 768px) {
            .project-container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
        
        .logo-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo-header img {
            height: 60px;
            margin-bottom: 1rem;
        }
        
        .logo-header h2 {
            color: var(--primary-blue);
            font-weight: 700;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="project-container">
        <!-- En-tête avec logo -->
        <div class="logo-header">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo SAAHDEL">
            <h2>SAAHDEL ONG</h2>
        </div>
        
        <!-- En-tête de la page -->
        <div class="page-header">
            <h1 class="page-title">Créer un nouveau projet</h1>
            <p class="page-subtitle">Remplissez les informations pour lancer un nouveau projet humanitaire</p>
        </div>

        <!-- Formulaire -->
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Informations du projet
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label required-field">
                            <i class="fas fa-heading form-icon"></i>Titre du projet
                        </label>
                        <input type="text" class="form-control" id="title" name="title" 
                               placeholder="Ex: Construction d'une école primaire" required>
                        <small class="form-text text-muted">Donnez un titre clair et descriptif à votre projet</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="description" class="form-label required-field">
                            <i class="fas fa-align-left form-icon"></i>Description du projet
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="6" 
                                  placeholder="Décrivez en détail les objectifs, bénéficiaires et impacts de votre projet..." required></textarea>
                        <small class="form-text text-muted">Soyez précis sur les objectifs et les bénéficiaires du projet</small>
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Créer le projet
                </button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </form>
        
        <!-- Informations supplémentaires -->
        <div class="mt-4 text-center">
            <p class="text-muted">
                <i class="fas fa-info-circle"></i> Tous les champs marqués d'un astérisque (*) sont obligatoires
            </p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation simple pour les champs du formulaire
        document.addEventListener('DOMContentLoaded', function() {
            const formControls = document.querySelectorAll('.form-control');
            
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                control.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
        });
    </script>
</body>
</html>