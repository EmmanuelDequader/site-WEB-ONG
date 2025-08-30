<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'actualité - SAAHDEL ONG</title>
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
            --accent-color: #e74c3c;
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
        
        .existing-media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .media-item {
            position: relative;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .media-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .media-item img, 
        .media-item video {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
        }
        
        .media-checkbox-label {
            display: block;
            padding: 10px;
            background: #f8f9fa;
            text-align: center;
            font-weight: 500;
            color: var(--dark-green);
        }
        
        .media-checkbox {
            position: absolute;
            top: 10px;
            left: 10px;
            transform: scale(1.5);
            accent-color: var(--primary-green);
            z-index: 10;
        }
        
        .error-message {
            color: var(--accent-color);
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: none;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
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
            
            .existing-media-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            }
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
            <h1 class="page-title">Modifier l'actualité</h1>
            <p class="page-subtitle">Mettez à jour le contenu de votre actualité</p>
        </div>

        <!-- Messages de statut -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        
        <!-- Formulaire -->
        <form action="{{ route('contents.update', $content) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
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
                               value="{{ old('title', $content->title) }}" placeholder="Ex: Nouveau projet éducatif" required>
                        @error('title')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="type" class="form-label required-field">
                            <i class="fas fa-tag form-icon"></i>Type de contenu
                        </label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Sélectionnez un type</option>
                            <option value="actualite" {{ old('type', $content->type) === 'actualite' ? 'selected' : '' }}>Actualité</option>
                        </select>
                        @error('type')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
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
                                  placeholder="Rédigez le contenu détaillé de votre actualité..." required>{{ old('body', $content->body) }}</textarea>
                        <div class="character-count" id="body-character-count">{{ strlen(old('body', $content->body)) }} caractères</div>
                        @error('body')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
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
                            <i class="fas fa-photo-video form-icon"></i>Médias existants
                        </label>
                        <p class="text-muted">Cochez les médias que vous souhaitez conserver. Les médias non cochés seront supprimés.</p>
                        
                        @if($content->media->count() > 0)
                            <div class="existing-media-grid">
                                @foreach($content->media as $media)
                                    <div class="media-item">
                                        <input type="checkbox" 
                                               class="media-checkbox"
                                               name="existing_media[]" 
                                               value="{{ $media->id }}" 
                                               id="media-{{ $media->id }}"
                                               checked>
                                        @if($media->type === 'image')
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" 
                                                 alt="Image {{ $loop->iteration }}">
                                        @elseif($media->type === 'video')
                                            <video controls>
                                                <source src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" 
                                                        type="video/mp4">
                                            </video>
                                        @endif
                                        <label for="media-{{ $media->id }}" class="media-checkbox-label">
                                            {{ $media->type === 'image' ? 'Image' : 'Vidéo' }} {{ $loop->iteration }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center text-muted py-3">Aucun média associé à cette actualité.</p>
                        @endif
                        
                        <label class="form-label mt-4">
                            <i class="fas fa-upload form-icon"></i>Ajouter de nouveaux médias
                        </label>
                        
                        <div class="file-input-container">
                            <label class="file-input-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Glissez-déposez vos fichiers ici</span>
                                <small>ou cliquez pour parcourir</small>
                                <small>Formats acceptés: JPG, PNG, MP4 (max 20MB)</small>
                            </label>
                            <input type="file" class="form-control" id="media" name="media[]" multiple 
                                   accept="image/jpeg,image/png,video/mp4,video/quicktime,video/x-msvideo">
                        </div>
                        
                        <div class="preview-container" id="media-preview">
                            <div class="preview-title">Nouveaux fichiers sélectionnés:</div>
                            <div class="preview-items" id="preview-items"></div>
                        </div>
                        
                        @error('media.*')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Informations de mise à jour -->
            <div class="last-updated">
                <h5><i class="fas fa-history"></i> Dernière modification</h5>
                <p class="mb-1">Créé le: {{ $content->created_at->format('d/m/Y à H:i') }}</p>
                <p>Modifié le: {{ $content->updated_at->format('d/m/Y à H:i') }}</p>
            </div>

            <!-- Boutons d'action -->
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Mettre à jour l'actualité
                </button>
                <a href="{{ route('contents.show', $content) }}" class="btn btn-secondary">
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

        // Prévisualisation des nouveaux médias
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
            const type = document.getElementById('type').value;
            
            if (!title || !body || !type) {
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
        const originalTitle = "{{ $content->title }}";
        const originalBody = "{{ $content->body }}";
        const originalType = "{{ $content->type }}";
        
        document.getElementById('title').addEventListener('input', function() {
            if (this.value !== originalTitle) {
                this.style.borderLeft = '4px solid var(--primary-green)';
            } else {
                this.style.borderLeft = '';
            }
        });
        
        document.getElementById('body').addEventListener('input', function() {
            if (this.value !== originalBody) {
                this.style.borderLeft = '4px solid var(--primary-green)';
            } else {
                this.style.borderLeft = '';
            }
        });
        
        document.getElementById('type').addEventListener('change', function() {
            if (this.value !== originalType) {
                this.style.borderLeft = '4px solid var(--primary-green)';
            } else {
                this.style.borderLeft = '';
            }
        });
    </script>
</body>
</html>