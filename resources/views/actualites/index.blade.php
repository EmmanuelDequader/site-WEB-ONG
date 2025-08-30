@extends('layouts.app')

@section('title', 'Actualités - SAAHDEL ONG')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Actualités SAAHDEL</h1>
                <p class="hero-subtitle">Découvrez les dernières nouvelles de nos actions humanitaires</p>
                <div class="hero-illustration">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container page-container">
        <!-- Section Actualités -->
        <section class="news-section">
            <div class="section-header">
                <h2 class="section-title">Dernières Actualités</h2>
                <p class="section-description">Restez informé de nos dernières activités sur le terrain</p>
            </div>
            
            <div class="row news-grid">
                @forelse($actualites as $actualite)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="news-card">
                            <div class="news-card-image">
                                @if($actualite->media->count() > 0)
                                    @foreach($actualite->media->take(1) as $media)
                                        @if($media->type === 'image')
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" 
                                                 class="news-img" 
                                                 alt="{{ $actualite->title }}">
                                        @endif
                                    @endforeach
                                @else
                                    <div class="news-placeholder">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                @endif
                                <div class="news-card-badge">
                                    <i class="far fa-calendar-alt"></i> 
                                    {{ $actualite->created_at->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="news-card-content">
                                <h3 class="news-title">{{ $actualite->title }}</h3>
                                <p class="news-excerpt">
                                    {{ Str::limit(strip_tags($actualite->body), 120) }}
                                </p>
                                <div class="news-card-footer">
                                    <a href="{{ route('actualites.show', $actualite->id) }}" class="news-read-more">
                                        Lire la suite <i class="fas fa-arrow-right"></i>
                                    </a>
                                    <div class="news-category">Actualité</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <h3>Aucune actualité pour le moment</h3>
                            <p>Revenez bientôt pour découvrir nos dernières nouvelles</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- Section Projets -->
        <section class="projects-section">
            <div class="section-header">
                <h2 class="section-title">Projets Récents</h2>
                <p class="section-description">Découvrez nos initiatives en cours et à venir</p>
            </div>
            
            <div class="row projects-grid">
                @forelse($projets as $projet)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="project-card">
                            <div class="project-card-image">
                                @if($projet->media->count() > 0)
                                    @foreach($projet->media->take(1) as $media)
                                        @if($media->type === 'image')
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" 
                                                 class="project-img" 
                                                 alt="{{ $projet->title }}">
                                        @endif
                                    @endforeach
                                @else
                                    <div class="project-placeholder">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                @endif
                                <div class="project-card-badge">
                                    <i class="far fa-calendar-alt"></i> 
                                    {{ $projet->created_at->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="project-card-content">
                                <h3 class="project-title">{{ $projet->title }}</h3>
                                <p class="project-excerpt">
                                    {{ Str::limit(strip_tags($projet->body), 120) }}
                                </p>
                                <div class="project-card-footer">
                                    <a href="{{ route('actualites.show', $projet->id) }}" class="project-read-more">
                                        Voir le projet <i class="fas fa-arrow-right"></i>
                                    </a>
                                    <div class="project-status">En cours</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="far fa-folder-open"></i>
                            </div>
                            <h3>Aucun projet pour le moment</h3>
                            <p>Nos projets en cours seront bientôt disponibles</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>
    </div>

    <style>
    :root {
        --primary-blue: #2A4F6E;
        --secondary-blue: #4682B4;
        --light-blue: #E8F4FD;
        --primary-green: #2E865F;
        --secondary-green: #34C759;
        --light-green: #F0F9F4;
        --dark-text: #333333;
        --light-text: #6C757D;
        --white: #FFFFFF;
        --border-radius: 16px;
        --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }
    
    .hero-section {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        color: var(--white);
        padding: 1px;
        margin-top: 5px;
        position: relative;
        overflow: hidden;
        border-radius: 0 0 100px 100px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin-bottom: 60px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border: 2px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        font-size: 100%;
        line-height: 1.6;
        box-sizing: border-box;
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
        box-sizing: border-box;
        max-width: 100%;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.3;
    }
    
    .hero-content {
        position: relative;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 20px;
        margin-top: 100px;
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        margin-bottom: 40px;
        opacity: 0.9;
        font-weight: 400;
    }
    
    .hero-illustration {
        font-size: 4rem;
        opacity: 0.2;
        margin-top: 30px;
    }
    
    .page-container {
        padding: 80px 0;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--secondary-green);
        border-radius: 2px;
    }
    
    .section-description {
        font-size: 1.1rem;
        color: var(--light-text);
        max-width: 600px;
        margin: 25px auto 0;
        line-height: 1.6;
    }
    
    .news-grid, .projects-grid {
        margin-top: 30px;
    }
    
    .news-card, .project-card {
        background: var(--white);
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        overflow: hidden;
        transition: var(--transition);
        height: 100%;
        position: relative;
    }
    
    .news-card:hover, .project-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }
    
    .news-card-image, .project-card-image {
        position: relative;
        overflow: hidden;
        height: 220px;
    }
    
    .news-img, .project-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }
    
    .news-card:hover .news-img, .project-card:hover .project-img {
        transform: scale(1.05);
    }
    
    .news-placeholder, .project-placeholder {
        height: 100%;
        background: linear-gradient(135deg, var(--secondary-blue) 0%, var(--primary-blue) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 3rem;
    }
    
    .news-card-badge, .project-card-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--white);
        color: var(--secondary-green);
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .news-card-content, .project-card-content {
        padding: 25px;
    }
    
    .news-title, .project-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 15px;
        line-height: 1.4;
        height: 66px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    
    .news-excerpt, .project-excerpt {
        color: var(--light-text);
        line-height: 1.6;
        margin-bottom: 25px;
        height: 75px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
    
    .news-card-footer, .project-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .news-read-more, .project-read-more {
        background: linear-gradient(135deg, var(--secondary-blue) 0%, var(--primary-blue) 100%);
        color: var(--white);
        text-decoration: none;
        padding: 0.8rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .news-read-more:hover, .project-read-more:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(70, 130, 180, 0.3);
        color: var(--white);
        text-decoration: none;
    }
    
    .news-category, .project-status {
        background: var(--light-green);
        color: var(--primary-green);
        padding: 0.4rem 0.8rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .project-status {
        background: var(--light-blue);
        color: var(--primary-blue);
    }
    
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: var(--white);
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
    }
    
    .empty-icon {
        font-size: 4rem;
        color: var(--secondary-green);
        margin-bottom: 25px;
        opacity: 0.7;
    }
    
    .empty-state h3 {
        color: var(--primary-blue);
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .empty-state p {
        color: var(--light-text);
        font-size: 1.1rem;
        max-width: 400px;
        margin: 0 auto;
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .section-title {
            font-size: 2.2rem;
        }
    }
    
    @media (max-width: 992px) {
        .hero-title {
            font-size: 2.2rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .news-title, .project-title {
            font-size: 1.2rem;
            height: auto;
        }
        
        .news-excerpt, .project-excerpt {
            height: auto;
        }
    }
    
    @media (max-width: 768px) {
        .hero-section {
            padding: 100px 0 60px;
            margin-top: 66px;
        }
        
        .hero-title {
            font-size: 2rem;
        }
        
        .page-container {
            padding: 60px 0;
        }
        
        .section-header {
            margin-bottom: 40px;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .news-card-content, .project-card-content {
            padding: 20px;
        }
        
        .news-card-footer, .project-card-footer {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .news-category, .project-status {
            align-self: flex-end;
        }
    }
    
    @media (max-width: 576px) {
        .hero-title {
            font-size: 1.8rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .section-title {
            font-size: 1.6rem;
        }
        
        .section-description {
            font-size: 1rem;
        }
        
        .empty-state {
            padding: 60px 15px;
        }
        
        .empty-icon {
            font-size: 3rem;
        }
    }
    </style>
@endsection