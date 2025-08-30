@extends('layouts.app')

@section('title', $actualite->title . ' - SAAHDEL ONG')

@section('content')
    <!-- Article Header -->
    <div class="article-header">
        <div class="container">
            <h1>{{ $actualite->title }}</h1>
            <p class="lead">
                <i class="far fa-calendar-alt"></i> 
                Publié le {{ $actualite->created_at->format('d/m/Y à H:i') }}
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Article Content -->
            <div class="col-md-8">
                <div class="article-content">
                    {!! nl2br(e($actualite->body)) !!}
                    
                    <!-- Médias -->
                    @if($actualite->media->count() > 0)
                        <div class="mt-5">
                            <h4 class="gallery-title">Galerie</h4>
                            <div class="row">
                                @foreach($actualite->media as $media)
                                    <div class="col-md-6 mb-4">
                                        <div class="media-item">
                                            @if($media->type === 'image')
                                                <img src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" 
                                                     alt="Média {{ $loop->iteration }}" 
                                                     class="img-fluid rounded shadow-sm">
                                                <div class="media-type-badge">
                                                    <i class="fas fa-image"></i> Image
                                                </div>
                                            @elseif($media->type === 'video')
                                                <div class="video-container">
                                                    <video controls class="img-fluid rounded shadow-sm">
                                                        <source src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" 
                                                                type="video/mp4">
                                                        Votre navigateur ne prend pas en charge la lecture de vidéos.
                                                    </video>
                                                    <div class="media-type-badge">
                                                        <i class="fas fa-video"></i> Vidéo
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="sidebar-card">
                    <div class="sidebar-card-header">
                        <h5 class="mb-0"><i class="fas fa-newspaper mr-2"></i>Actualités récentes</h5>
                    </div>
                    <div class="card-body">
                        @forelse($recentActualites as $recent)
                            <div class="recent-news-item">
                                <h6 class="recent-title">{{ $recent->title }}</h6>
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ $recent->created_at->format('d/m/Y') }}
                                </small>
                                <br>
                                <a href="{{ route('actualites.show', $recent->id) }}" class="btn btn-sm btn-outline-primary mt-2">
                                    <i class="fas fa-eye mr-1"></i> Lire la suite
                                </a>
                            </div>
                        @empty
                            <p class="text-muted text-center">
                                <i class="far fa-newspaper mr-1"></i> Aucune autre actualité
                            </p>
                        @endforelse
                    </div>
                </div>


            </div>
        </div>
    </div>

    <style>
    .article-header {
        background: linear-gradient(135deg, #4682B4 0%, #2E865F 100%);
        color: white;
        padding: 80px 0;
        text-align: center;
        margin-top: 76px;
    }
    
    .article-content {
        padding: 50px 0;
        line-height: 1.8;
        font-size: 1.1rem;
        color: #333;
    }
    
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 20px 0;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .gallery-title {
        color: #4682B4;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #34C759;
    }
    
    .sidebar-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        overflow: hidden;
    }
    
    .sidebar-card-header {
        background: #4682B4;
        color: white;
        padding: 15px 20px;
        border-radius: 15px 15px 0 0;
    }
    
    .recent-news-item {
        padding: 15px;
        border-bottom: 1px solid #eee;
        transition: background 0.3s ease;
    }
    
    .recent-news-item:hover {
        background: #f8f9fa;
    }
    
    .recent-news-item:last-child {
        border-bottom: none;
    }
    
    .recent-title {
        color: #2E865F;
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    .media-item {
        position: relative;
        transition: transform 0.3s ease;
    }
    
    .media-item:hover {
        transform: translateY(-2px);
    }
    
    .media-type-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 3px;
        font-size: 0.8rem;
    }
    
    .video-container {
        position: relative;
        background: #f8f9fa;
        border-radius: 8px;
        overflow: hidden;
    }
    
    @media (max-width: 768px) {
        .article-header {
            padding: 60px 0;
            margin-top: 66px;
        }
        
        .article-content {
            padding: 30px 0;
        }
        
        .sidebar-card {
            margin-top: 30px;
        }
    }
    </style>
@endsection