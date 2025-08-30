<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le projet - SAAHDEL ONG</title>
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
            padding: 20px 0;
        }
        
        .project-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 2.5rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-top: 4px solid var(--primary-green);
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--primary-blue);
        }
        
        .page-title {
            color: var(--primary-blue);
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 2.2rem;
        }
        
        .page-subtitle {
            color: #6c757d;
            font-size: 1.2rem;
        }
        
        .form-group {
            margin-bottom: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
        }
        
        .form-control {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 1rem;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.3rem rgba(70, 130, 180, 0.2);
        }
        
        textarea.form-control {
            min-height: 250px;
            resize: vertical;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #5a9bd5 100%);
            border: none;
            border-radius: 10px;
            padding: 1rem 2.5rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(70, 130, 180, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(70, 130, 180, 0.4);
            background: linear-gradient(135deg, #5a9bd5 0%, var(--primary-blue) 100%);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #868e96 100%);
            border: none;
            border-radius: 10px;
            padding: 1rem 2.5rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
        }
        
        .btn-group {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-top: 3rem;
        }
        
        .form-icon {
            color: var(--primary-green);
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #5a9bd5 100%);
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
            padding: 1.25rem 2rem;
            border-radius: 0 !important;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .required-field::after {
            content: "*";
            color: #dc3545;
            margin-left: 0.3rem;
        }
        
        .logo-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .logo-header img {
            height: 70px;
            margin-bottom: 1rem;
        }
        
        .logo-header h2 {
            color: var(--primary-blue);
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
        }
        
        .character-count {
            text-align: right;
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }
        
        .last-updated {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1.5rem;
            border-left: 4px solid var(--primary-green);
        }
        
        .last-updated h5 {
            color: var(--dark-green);
            margin-bottom: 0.5rem;
            font-weight: 600;
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
                margin-bottom: 1rem;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
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
            <h1 class="page-title">Modifier le projet</h1>
            <p class="page-subtitle">Mettez à jour les informations de votre projet</p>
        </div>

        <!-- Formulaire -->
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Carte Informations de base -->
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
                               value="{{ $project->title }}" placeholder="Ex: Projet d'éducation en milieu rural" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description" class="form-label required-field">
                            <i class="fas fa-align-left form-icon"></i>Description du projet
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="12" 
                                  placeholder="Décrivez votre projet en détail..." required>{{ $project->description }}</textarea>
                        <div class="character-count" id="description-character-count">{{ strlen($project->description) }} caractères</div>
                    </div>
                </div>
            </div>

            <!-- Informations de mise à jour -->
            <div class="last-updated">
                <h5><i class="fas fa-history"></i> Dernière modification</h5>
                <p class="mb-1">Créé le: {{ $project->created_at->format('d/m/Y à H:i') }}</p>
                <p>Modifié le: {{ $project->updated_at->format('d/m/Y à H:i') }}</p>
            </div>

            <!-- Boutons d'action -->
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Mettre à jour le projet
                </button>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">
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
        // Compteur de caractères pour la description
        const descriptionTextarea = document.getElementById('description');
        const characterCount = document.getElementById('description-character-count');

        descriptionTextarea.addEventListener('input', function() {
            characterCount.textContent = this.value.length + ' caractères';
        });

        // Validation du formulaire
        document.querySelector('form').addEventListener('submit', function(e) {
            const title = document.getElementById('title').value.trim();
            const description = document.getElementById('description').value.trim();
            
            if (!title || !description) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });

        // Animation pour les champs
        document.querySelectorAll('.form-control').forEach(control => {
            control.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            control.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
        
        // Indication visuelle des modifications
        const originalTitle = "{{ $project->title }}";
        const originalDescription = "{{ $project->description }}";
        
        document.getElementById('title').addEventListener('input', function() {
            if (this.value !== originalTitle) {
                this.style.borderLeft = '4px solid var(--primary-green)';
            } else {
                this.style.borderLeft = '';
            }
        });
        
        document.getElementById('description').addEventListener('input', function() {
            if (this.value !== originalDescription) {
                this.style.borderLeft = '4px solid var(--primary-green)';
            } else {
                this.style.borderLeft = '';
            }
        });
    </script>
</body>
</html>