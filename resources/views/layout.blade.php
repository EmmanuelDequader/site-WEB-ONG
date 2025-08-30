@extends('layouts.app')

@section('content')
<style>
        :root {
            --primary-green: #2E865F;
            --light-green: #34C759;
            --primary-blue: #4682B4;
            --dark-blue: #2A4F6E;
            --light-bg: #f8f9fa;
            --text-dark: #333;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            padding-top: 0;
        }
        
        /* Hero Section avec Carousel */
        .hero-section {
            position: relative;
            height: 100vh;
            overflow: hidden;
            color: white;
            display: flex;
            align-items: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        
        .carousel-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        
        .carousel-item {
            height: 100vh;
        }
        
        .carousel-img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            filter: brightness(0.7);
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
            padding: 0 15px;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2.5rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Sections générales */
        .section-title {
            color: var(--primary-blue);
            font-weight: 700;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid var(--light-green);
            display: inline-block;
        }
        
        .container {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }
        
        /* Cartes */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
            padding: 1.25rem 2rem;
        }
        
        .objective-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--light-green);
        }
        
        .department-card {
            height: 100%;
        }
        
        /* Boutons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(70, 130, 180, 0.4);
        }
        
        .btn-outline-light {
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        /* Liste des réalisations */
        .realisation-list {
            list-style-type: none;
            padding-left: 0;
        }
        
        .realisation-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 1.5rem;
        }
        
        .realisation-list li:before {
            content: "✓";
            color: var(--light-green);
            position: absolute;
            left: 0;
            font-weight: bold;
        }
        
        /* Texte extensible */
        .text-collapsed {
            max-height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .text-collapsed:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: linear-gradient(to bottom, transparent, white);
        }
        
        .read-more-btn {
            background: none;
            border: none;
            color: var(--primary-blue);
            font-weight: 600;
            padding: 0.5rem 0;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        
        .read-more-btn:after {
            content: '↓';
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }
        
        .read-more-btn.expanded:after {
            transform: rotate(180deg);
        }
        
        /* Section de dons */
        .cause-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }
        
        /* Contact */
        .contact-icon {
            width: 40px;
            height: 40px;
            background: var(--light-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
        }
        
        .contact-info {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }
        
        .map-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .btn {
                display: block;
                width: 100%;
                margin-bottom: 1rem;
            }
            
            .btn + .btn {
                margin-left: 0;
            }
        }
</style>

    <!-- Hero Section avec Carousel -->
    <section id="accueil" class="hero-section">
        <!-- Carousel -->
        <div class="carousel-container">
            <div id="carouselAccueil" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-inner h-100">
                    <!-- Image 1 -->
                    <div class="carousel-item active h-100">
                        <img src="{{ asset('images/ac.jpg') }}" class="d-block w-100 carousel-img" alt="Action humanitaire">
                    </div>
                    <!-- Image 2 -->
                    <div class="carousel-item h-100">
                        <img src="{{ asset('images/acc.jpg') }}" class="d-block w-100 carousel-img" alt="Développement communautaire">
                    </div>
                    <!-- Image 3 -->
                    <div class="carousel-item h-100">
                        <img src="{{ asset('images/pre.jpg') }}" class="d-block w-100 carousel-img" alt="Prévention et santé">
                    </div>
                    <!-- Image 4 -->
                    <div class="carousel-item h-100">
                        <img src="{{ asset('images/acceuil.jpg') }}" class="d-block w-100 carousel-img" alt="Éducation et formation">
                    </div>
                    <!-- Image 5 -->
                    <div class="carousel-item h-100">
                        <img src="{{ asset('images/photo.PNG') }}" class="d-block w-100 carousel-img" alt="Solidarité et entraide">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contenu superposé -->
        <div class="container hero-content">
            <h1 class="hero-title">Solidarité Active pour l'Action Humanitaire et le Développement Local</h1>
            <p class="hero-subtitle">Œuvrons ensemble pour un monde plus juste et solidaire depuis 2014</p>
            <div class="d-flex justify-content-center flex-wrap">
                <a href="{{ route('dons.index') }}" class="btn btn-primary btn-lg m-2">Soutenir nos actions</a>
                <a href="#domaines" class="btn btn-outline-light btn-lg m-2">Découvrir nos programmes</a>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Historique et Présentation -->
        <section id="historique" class="mb-5">
            <h2 class="section-title">Historique et Présentation</h2>
            <div class="card">
                <div class="card-body">
                    <div class="expandable-text text-collapsed" id="historique-text">
                        <p class="lead">C'est en 2014 que ce qu'il est convenu d'appeler « Solidarité Active pour l'Action Humanitaire et le Développement Local (SAAHDEL) » s'est réunie pour la première fois à Yaoundé sous l'instigation d'un groupe d'experts en Coopération Internationale, Action Humanitaire et Développement Durable.</p>
                        
                        <p>Cette première rencontre avait alors pour fil conducteur, la création d'une Association humanitaire et d'Appui au Développement Local pour promouvoir au Cameroun et en Afrique des actions en matière de Coopération au Développement, d'Action Humanitaire et de Développement Durable.</p>
                        
                        <p>SAAHDEL nait donc comme une Association à vocation d'ONG, non confessionnelle et à but non lucratif régie par l'article 7 de la loi n°90/053 du 19 décembre 1990 portant liberté d'association au Cameroun avec une compétence géographique nationale et des prétentions internationales.</p>
                        
                        <div class="mt-4 p-3 bg-light rounded">
                            <h5>Cadre juridique :</h5>
                            <p class="mb-0">Récépissé de déclaration n°00001098/RDA/06/BAPP</p>
                        </div>
                    </div>
                    <button class="read-more-btn" data-target="historique-text">Voir plus</button>
                </div>
            </div>
        </section>

        <!-- Objectifs -->
        <section id="objectifs" class="mb-5">
            <h2 class="section-title">Objectifs de l'Association</h2>
            
            <div class="objective-card">
                <h4>Objectif Général</h4>
                <p class="mb-0">Contribuer à la promotion de l'action humanitaire et l'appui au développement local en milieux rural et urbain.</p>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="objective-card">
                        <h4>Objectif Spécifique 1</h4>
                        <p class="mb-0">Protéger les droits des femmes et de la jeune fille et promouvoir leur autonomisation économique et sociale.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="objective-card">
                        <h4>Objectif Spécifique 2</h4>
                        <p class="mb-0">Porter assistance aux personnes en situation de vulnérabilité.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="objective-card">
                        <h4>Objectif Spécifique 3</h4>
                        <p class="mb-0">Contribuer au renforcement de la citoyenneté active à travers la vulgarisation et la modernisation des services d'état civil.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="objective-card">
                        <h4>Objectif Spécifique 4</h4>
                        <p class="mb-0">Promouvoir l'accès des couches défavorisées aux services de santé de qualité et à moindre coût.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Domaines d'intervention -->
        <section id="domaines" class="mb-5">
            <h2 class="section-title">Domaines d'Intervention</h2>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card department-card">
                        <div class="card-header">
                            <h4>Département Action Humanitaire</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Suivi de l'examen périodique universel au Cameroun (EPU)</li>
                                <li class="list-group-item">État civil et citoyenneté</li>
                                <li class="list-group-item">Accompagnement à la formalisation des Œuvres Sociales Privées (OSP)</li>
                                <li class="list-group-item">Intervention d'urgence humanitaire</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card department-card">
                        <div class="card-header">
                            <h4>Département Développement Local</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Habitat social</li>
                                <li class="list-group-item">AGENDA 21 LOCAL</li>
                                <li class="list-group-item">Activités génératrices de revenus (AGR)</li>
                                <li class="list-group-item">Autonomisation socio-économique des femmes</li>
                                <li class="list-group-item">Auto-emploi jeune</li>
                                <li class="list-group-item">Entrepreneuriat coopératif</li>
                                <li class="list-group-item">Santé communautaire</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card department-card">
                        <div class="card-header">
                            <h4>Département Transversal</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Communication et visibilité</li>
                                <li class="list-group-item">TIC et gestion des données</li>
                                <li class="list-group-item">Études/Projets</li>
                                <li class="list-group-item">Formation</li>
                                <li class="list-group-item">Coopération au développement</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Réalisations - Affichage des projets de la base de données -->
        <section id="realisations" class="mb-5">
            <h2 class="section-title">Nos Réalisations</h2>
            
            <!-- Boucle sur les projets de la base de données -->
            @foreach($projects as $project)
            <div class="card mb-4">
                <div class="card-header">
                    <h4>{{ $project->title }}</h4>
                </div>
                <div class="card-body">
                    <div class="expandable-text text-collapsed" id="project-{{ $project->id }}">
                        <p>{{ $project->description }}</p>
                    </div>
                    <button class="read-more-btn" data-target="project-{{ $project->id }}">Voir plus</button>
                </div>
            </div>
            @endforeach
            
            <!-- Réalisations statiques (conservées pour référence) -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Réalisations 2023</h4>
                </div>
                <div class="card-body">
                    <div class="expandable-text text-collapsed" id="realisations-2023">
                        <ul class="realisation-list">
                            <li>Accompagnement de cinq communes en montage des projets internationaux (système europeaid)</li>
                            <li>Appui à la formalisation de 05 centres d'encadrement des enfants en situation de vulnérabilité dans les Communes de Yaoundé III, NGOUMOU et BIKOK</li>
                            <li>Sensibilisation des populations et des acteurs de la chaine éducative sur l'importance de la Police Assistance Santé Scolaire dans la Commune de Yaoundé III. 50 accords de partenariats signés avec 50 écoles en phase pilote du projet</li>
                        </ul>
                    </div>
                    <button class="read-more-btn" data-target="realisations-2023">Voir plus</button>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h4>Réalisations 2022</h4>
                </div>
                <div class="card-body">
                    <div class="expandable-text text-collapsed" id="realisations-2022">
                        <ul class="realisation-list">
                            <li>Organisation et animation de 50 Universités Itinérantes Citoyennes (sur la sécurisation des AGR) dans la commune de Yaoundé VI (projet PAVDAC.CE)</li>
                            <li>Mobilisation et sensibilisation des acteurs du secteur informel sur l'importance de la formalisation des AGR dans les communes de Yaoundé III, NGOUMOU, BIKOK et ATOK</li>
                            <li>Organisation et animation des Universités Itinérantes Citoyennes (sur la sécurisation des AGR) dans la commune de Yaoundé III</li>
                        </ul>
                    </div>
                    <button class="read-more-btn" data-target="realisations-2022">Voir plus</button>
                </div>
            </div>
        </section>

        <!-- Section de don simplifiée avec lien vers la page complète -->
        <section id="don" class="mb-5">
            <h2 class="section-title">Soutenir nos Actions</h2>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Faire un Don</h4>
                        </div>
                        <div class="card-body">
                            <p>Votre soutien est essentiel pour continuer nos actions sur le terrain. Chaque don, quel que soit son montant, fait une différence.</p>
                            
                            <div class="text-center my-4">
                                <div class="cause-number">10 000 XAF</div>
                                <p>Permet de fournir des documents d'état civil à 5 enfants</p>
                            </div>
                            
                            <div class="text-center my-4">
                                <div class="cause-number">25 000 XAF</div>
                                <p>Finance une formation en entrepreneuriat pour une femme</p>
                            </div>
                            
                            <div class="text-center my-4">
                                <div class="cause-number">50 000 XAF</div>
                                <p>Contribue à une campagne de sensibilisation sur la santé</p>
                            </div>
                            
                            <!-- LIEN VERS LA PAGE DE DONS COMPLÈTE -->
                            <div class="text-center mt-4">
                                <a href="{{ route('dons.index') }}" class="btn btn-primary btn-lg">Faire un don maintenant</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Impact de votre don</h4>
                        </div>
                        <div class="card-body">
                            <p>Votre don sera utilisé pour:</p>
                            <ul>
                                <li>Programmes d'état civil et citoyenneté (35%)</li>
                                <li>Autonomisation des femmes (25%)</li>
                                <li>Santé communautaire (20%)</li>
                                <li>Interventions d'urgence (10%)</li>
                                <li>Frais administratifs (10%)</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h4>Autres moyens de don</h4>
                        </div>
                        <div class="card-body">
                            <p>Vous pouvez également nous soutenir par:</p>
                            <ul>
                                <li><strong>Mobile Money:</strong> +237 659600228</li>
                                <li><strong>Virement bancaire:</strong> Contactez-nous pour les détails</li>
                                <li><strong>Dons en nature:</strong> Matériels éducatifs, équipements médicaux</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="mb-5">
            <h2 class="section-title">Coordonnées</h2>
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="contact-info">
                        <h4>Coordination Générale</h4>
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <strong>Adresse:</strong><br>
                                MONATELE QUARTIER MARCO
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <strong>Téléphone:</strong><br>
                                +237 659600228 / +237 655899192
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <strong>Email:</strong><br>
                                saahdel2@gmail.com
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="contact-icon">
                                <i class="fab fa-facebook"></i>
                            </div>
                            <div>
                                <strong>Facebook:</strong><br>
                                saahdel_cam2013@yahoo.fr
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="map-container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15918.552766395515!2d11.483337567051885!3d4.210848847625147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1081273d6127f8a3%3A0x1d5d1317c54f6b2b!2sMonat%C3%A9l%C3%A9%2C%20Cameroun!5e0!3m2!1sfr!2sfr!4v1685362345678!5m2!1sfr!2sfr" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="contact-info">
                        <h4>Envoyez-nous un message</h4>
                        <form id="contactForm" method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom complet <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Sujet <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal de confirmation -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Message envoyé avec succès</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <i class="fas fa-check-circle text-success mb-3" style="font-size: 3rem;"></i>
                    <p>Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Gestion de l'envoi du formulaire de contact
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Récupération des données du formulaire
            const formData = new FormData(this);
            
            // Envoi des données via AJAX (compatible avec Laravel Breeze)
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Affichage du modal de succès
                    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();
                    
                    // Réinitialisation du formulaire
                    this.reset();
                    
                    // Redirection après fermeture du modal
                    document.getElementById('successModal').addEventListener('hidden.bs.modal', function () {
                        window.location.href = "{{ route('contact') }}";
                    });
                } else {
                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Une erreur s\'est produite. Veuillez réessayer.');
            });
        });

        // Smooth scroll pour la navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Gestion du texte extensible
        document.querySelectorAll('.read-more-btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetElement = document.getElementById(targetId);
                
                if (targetElement.classList.contains('text-collapsed')) {
                    targetElement.classList.remove('text-collapsed');
                    this.classList.add('expanded');
                    this.textContent = 'Voir moins';
                } else {
                    targetElement.classList.add('text-collapsed');
                    this.classList.remove('expanded');
                    this.textContent = 'Voir plus';
                }
            });
        });
@endsection