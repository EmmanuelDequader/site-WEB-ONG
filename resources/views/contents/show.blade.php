@extends('layouts.app')

@section('title', $content->title . ' - SAAHDEL ONG')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('contents.index') }}">Contenus</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($content->title, 30) }}</li>
                </ol>
            </nav>

            <!-- En-tête de l'article -->
            <div class="article-header mb-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h1 class="article-title">{{ $content->title }}</h1>
                        <div class="article-meta text-muted">
                            <span class="mr-3">
                                <i class="fas fa-user"></i> Par {{ $content->admin->name }}
                            </span>
                            <span class="mr-3">
                                <i class="fas fa-calendar"></i> Créé le {{ $content->created_at->format('d/m/Y à H:i') }}
                            </span>
                            <span>
                                <i class="fas fa-sync-alt"></i> Modifié le {{ $content->updated_at->format('d/m/Y à H:i') }}
                            </span>
                        </div>
                    </div>
                    <span class="badge badge-type badge-{{ $content->type }}">
                        {{ ucfirst($content->type) }}
                    </span>
                </div>
            </div>

            <!-- Contenu principal -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="article-content">
                        {!! nl2br(e($content->body)) !!}
                    </div>
                </div>
            </div>

            <!-- Section Médias -->
            @if($content->media->count() > 0)
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-images"></i> Médias associés
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($content->media as $media)
                                <div class="col-md-4 mb-3">
                                    <div class="media-item">
                                        @if($media->type === 'image')
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" 
                                                 alt="Image {{ $loop->iteration }}" 
                                                 class="img-fluid rounded shadow-sm"
                                                 style="width: 100%; height: 200px; object-fit: cover;">
                                            <div class="media-type-badge">
                                                <i class="fas fa-image"></i> Image
                                            </div>
                                        @elseif($media->type === 'video')
                                            <div class="video-container position-relative">
                                                <video class="img-fluid rounded shadow-sm" 
                                                       style="width: 100%; height: 200px; object-fit: cover;"
                                                       controls>
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
                </div>
            @endif

            <!-- Actions -->
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('contents.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Retour à la liste
                    </a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('contents.edit', $content) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.article-title {
    color: #2E865F;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.article-meta {
    font-size: 0.9rem;
}

.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.badge-type {
    font-size: 0.9rem;
    padding: 0.5rem 1rem;
}

.badge-actualite {
    background-color: #34C759;
    color: white;
}

.badge-evenement {
    background-color: #4682B4;
    color: white;
}

.badge-rapport {
    background-color: #6f42c1;
    color: white;
}

.badge-projet {
    background-color: #fd7e14;
    color: white;
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
    background: #f8f9fa;
    border-radius: 8px;
}

.breadcrumb {
    background: #f8f9fa;
    border-radius: 5px;
    padding: 0.75rem 1rem;
}

.card {
    border: none;
    border-radius: 10px;
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
    border: none;
}
</style>
@endsection