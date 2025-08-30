<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SAAHDEL ONG')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
        <!-- Lien vers les icônes Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Custom CSS -->
    @stack('styles')
</head>
<body>
    <!-- Navigation fixe - toujours visible -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="logo-container">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo SAAHDEL" class="logo-image">
                </div>
                SAAHDEL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#accueil">
                            <i class="bi bi-house-door"></i>Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#objectifs">
                            <i class="bi bi-bullseye"></i>Objectifs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#realisations">
                            <i class="bi bi-trophy"></i>Réalisations
                        </a>
                    </li>
                    <!-- LIEN VERS LA PAGE DE DONS -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dons.index') }}">
                            <i class="bi bi-heart"></i>Faire un Don
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('actualites.index') }}">
                            <i class="bi bi-newspaper"></i>Actualités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#contact">
                            <i class="bi bi-envelope"></i>Contact
                        </a>
                    </li>
                </ul>
                
                <!-- Liens d'authentification Laravel Breeze -->
                <ul class="navbar-nav ms-auto auth-links">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Tableau de bord</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link auth-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i>Connexion
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

  
    
    <script>
        // Script pour mettre en évidence le lien actif
        document.addEventListener('DOMContentLoaded', function() {
            const currentLocation = window.location.href;
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            
            navLinks.forEach(link => {
                if (link.href === currentLocation) {
                    link.classList.add('active');
                }
            });
            
            // Pour les ancres sur la page d'accueil
            if (currentLocation.includes('#')) {
                const anchor = currentLocation.split('#')[1];
                const correspondingLink = document.querySelector(`a[href$="${anchor}"]`);
                if (correspondingLink) {
                    correspondingLink.classList.add('active');
                }
            }
        });
    </script>

    <!-- Overlay pour fermer les textes étendus -->
    <div class="text-overlay" id="textOverlay"></div>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="footer-title">SAAHDEL ONG</h5>
                    <p>Solidarité Active pour l'Action Humanitaire et le Développement Local</p>
                    <p>Association humanitaire et d'Appui au Développement Local</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5 class="footer-title">Liens rapides</h5>
                    <div class="footer-links">
                        <a href="{{ url('/') }}#accueil">Accueil</a>
                        <a href="{{ url('/') }}#historique">Présentation</a>
                        <a href="{{ url('/') }}#objectifs">Objectifs</a>
                        <a href="{{ url('/') }}#domaines">Domaines</a>
                        <a href="{{ url('/') }}#realisations">Réalisations</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h5 class="footer-title">Nos actions</h5>
                    <div class="footer-links">
                        <a href="#">Action humanitaire</a>
                        <a href="#">Développement local</a>
                        <a href="#">État civil et citoyenneté</a>
                        <a href="#">Autonomisation des femmes</a>
                        <a href="#">Santé communautaire</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h5 class="footer-title">Contact</h5>
                    <div class="footer-links">
                        <p><i class="fas fa-map-marker-alt mr-2"></i> MONATELE QUARTIER MARCO</p>
                        <p><i class="fas fa-phone mr-2"></i> +237 659600228</p>
                        <p><i class="fas fa-envelope mr-2"></i> saahdel2@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 SAAHDEL ONG - Tous droits réservés</p>
                <p>Récépissé de déclaration n°00001098/RDA/06/BAPP</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Script personnalisé -->
    <script src="{{ asset('js/script.js') }}" defer></script>
    @stack('scripts')
    <script>
    // Script pour les boutons "Voir plus"
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreButtons = document.querySelectorAll('.read-more-btn');
        const textOverlay = document.getElementById('textOverlay');
        
        readMoreButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetText = document.getElementById(targetId);
                
                if (targetText) {
                    targetText.classList.toggle('text-collapsed');
                    
                    if (targetText.classList.contains('text-collapsed')) {
                        this.textContent = 'Voir plus';
                    } else {
                        this.textContent = 'Voir moins';
                    }
                }
            });
        });
        
        // Fermer les textes étendus en cliquant sur l'overlay
        if (textOverlay) {
            textOverlay.addEventListener('click', function() {
                const expandedTexts = document.querySelectorAll('.expandable-text:not(.text-collapsed)');
                const readMoreButtons = document.querySelectorAll('.read-more-btn');
                
                expandedTexts.forEach(text => {
                    text.classList.add('text-collapsed');
                });
                
                readMoreButtons.forEach(button => {
                    button.textContent = 'Voir plus';
                });
                
                this.style.display = 'none';
            });
        }
    });
</script>
</body>
</html>






