<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une actualité - SAAHDEL ONG</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- TinyMCE Editor (optionnel) -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
        
        .news-container {
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
        
        .file-input-container {
            position: relative;
        }
        
        .file-input-label {
            display: block;
            padding: 1.5rem;
            border: 2px dashed var(--border-color);
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fafafa;
        }
        
        .file-input-label:hover {
            border-color: var(--primary-blue);
            background: #f0f8ff;
        }
        
        .file-input-label i {
            font-size: 2.5rem;
            color: var(--primary-green);
            margin-bottom: 1rem;
        }
        
        .file-input-label span {
            display: block;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }
        
        .file-input-label small {
            color: #6c757d;
        }
        
        input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
        
        .preview-container {
            margin-top: 1.5rem;
            display: none;
        }
        
        .preview-title {
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 1rem;
        }
        
        .preview-items {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .preview-item {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }
        
        .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .preview-item-remove {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(220, 53, 69, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 0.8rem;
            cursor: pointer;
        }
        
        @media (max-width: 768px) {
            .news-container {
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
    </style>
</head>
<body>
    <div class="news-container">
        <!-- En-tête avec logo -->
        <div class="logo-header">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo SAAHDEL">
            <h2>SAAHDEL ONG</h2>
        </div>
        
        <!-- En-tête de la page -->
        <div class="page-header">
            <h1 class="page-title">Créer une nouvelle actualité</h1>
            <p class="page-subtitle">Partagez les dernières nouvelles et événements de l'ONG</p>
        </div>

        <!-- Formulaire -->
        <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Carte Informations de base -->
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Informations de base
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label required-field">
                            <i class="fas fa-heading form-icon"></i>Titre de l'actualité
                        </label>
                        <input type="text" class="form-control" id="title" name="title" 
                               placeholder="Ex: Lancement du nouveau projet éducatif" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="type" class="form-label required-field">
                            <i class="fas fa-tag form-icon"></i>Type de contenu
                        </label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="actualite">Actualité</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Carte Contenu -->
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-align-left form-icon"></i> Contenu détaillé
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="body" class="form-label required-field">
                            <i class="fas fa-edit form-icon"></i>Contenu de l'actualité
                        </label>
                        <textarea class="form-control" id="body" name="body" rows="12" 
                                  placeholder="Rédigez le contenu détaillé de votre actualité..." required></textarea>
                        <div class="character-count" id="body-character-count">0 caractères</div>
                    </div>
                </div>
            </div>

            <!-- Carte Médias -->
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-images form-icon"></i> Médias
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-upload form-icon"></i>Ajouter des médias
                        </label>
                        
                        <div class="file-input-container">
                            <label class="file-input-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Glissez-déposez vos fichiers ici</span>
                                <small>ou cliquez pour parcourir</small>
                                <small>Formats acceptés: JPG, PNG, MP4 (max 5MB)</small>
                            </label>
                            <input type="file" class="form-control" id="media" name="media[]" multiple 
                                   accept="image/jpeg,image/png,video/mp4">
                        </div>
                        
                        <div class="preview-container" id="media-preview">
                            <div class="preview-title">Fichiers sélectionnés:</div>
                            <div class="preview-items" id="preview-items"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Publier l'actualité
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
        // Compteur de caractères pour le texte
        const bodyTextarea = document.getElementById('body');
        const characterCount = document.getElementById('body-character-count');

        bodyTextarea.addEventListener('input', function() {
            characterCount.textContent = this.value.length + ' caractères';
        });

        // Prévisualisation des médias
        const mediaInput = document.getElementById('media');
        const previewContainer = document.getElementById('media-preview');
        const previewItems = document.getElementById('preview-items');

        mediaInput.addEventListener('change', function(e) {
            previewItems.innerHTML = '';
            
            if (this.files.length > 0) {
                previewContainer.style.display = 'block';
                
                Array.from(this.files).forEach((file, index) => {
                    const reader = new FileReader();
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';
                    previewItem.innerHTML = `
                        <button type="button" class="preview-item-remove" data-index="${index}">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    
                    reader.onload = function(e) {
                        if (file.type.startsWith('image/')) {
                            previewItem.innerHTML += `<img src="${e.target.result}" alt="${file.name}">`;
                        } else {
                            previewItem.innerHTML += `
                                <div style="background: #e9ecef; height: 100%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-video" style="font-size: 2rem; color: #6c757d;"></i>
                                </div>
                            `;
                        }
                    };
                    
                    reader.readAsDataURL(file);
                    previewItems.appendChild(previewItem);
                    
                    // Bouton de suppression
                    const removeBtn = previewItem.querySelector('.preview-item-remove');
                    removeBtn.addEventListener('click', function() {
                        // Créer un nouveau DataTransfer sans le fichier supprimé
                        const newFiles = new DataTransfer();
                        Array.from(mediaInput.files).forEach((f, i) => {
                            if (i !== parseInt(this.dataset.index)) {
                                newFiles.items.add(f);
                            }
                        });
                        
                        mediaInput.files = newFiles.files;
                        previewItem.remove();
                        
                        if (newFiles.files.length === 0) {
                            previewContainer.style.display = 'none';
                        }
                    });
                });
            } else {
                previewContainer.style.display = 'none';
            }
        });

        // Validation du formulaire
        document.querySelector('form').addEventListener('submit', function(e) {
            const title = document.getElementById('title').value.trim();
            const body = document.getElementById('body').value.trim();
            
            if (!title || !body) {
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
    </script>
</body>
</html>