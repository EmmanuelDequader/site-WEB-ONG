@extends('layouts.app')

@section('title', 'Tableau de bord Admin - SAAHDEL ONG')

@section('styles')
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles spécifiques au tableau de bord -->
    <style>
        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .stats-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            margin-bottom: 20px;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .stats-icon {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stats-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .section-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }
        
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
        }
        
        .table th {
            background-color: #3498db;
            color: white;
        }
        
        .badge-admin {
            background-color: #3498db;
            color: white;
        }
        
        .badge-user {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
        
        .action-buttons {
            white-space: nowrap;
        }
        
        .btn-edit {
            background-color: #3498db;
            color: white;
            border: none;
        }
        
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
        }
        
        .btn-toggle {
            background-color: #28a745;
            color: white;
            border: none;
        }
        
        .content-preview {
            max-height: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        
        .navbar-admin {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-admin .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .navbar-admin .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
        }
        
        .navbar-admin .nav-link:hover {
            color: #ffffff !important;
        }
        
        .user-welcome {
            color: white;
            margin-right: 15px;
            font-weight: 500;
        }

        
    </style>
@endsection

@section('content')
    <div class="admin-container">
        <!-- Vérification du rôle administrateur -->
        @if(!Auth::check())
            <div class="alert alert-warning">
                <h4>Connexion requise</h4>
                <p>Veuillez vous connecter pour accéder à  cette page.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
            </div>
        @elseif(Auth::user()->role !== 'admin' && Auth::user()->role !== 'super-admin')
            <div class="alert alert-danger">
                <h4>Accès refusé</h4>
                <p>Vous n'avez pas les permissions nécessaires pour accéder à cette page.</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Retour à l'accueil</a>
            </div>
        @else
            <!-- Tableau de bord administrateur -->
            <h1 class="text-center mb-5">Tableau de bord Administrateur - SAAHDEL ONG</h1>
            
            <!-- Messages de session -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <!-- Statistiques -->
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="stats-card card" style="background-color: #3498db; color: white;">
                        <div class="card-body text-center">
                            <div class="stats-icon">
                                <i class="fas fa-donate"></i>
                            </div>
                            <div class="stats-number">{{ $totalDons ?? 0 }}</div>
                            <div class="stats-label">Dons totaux</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card card" style="background-color: #28a745; color: white;">
                        <div class="card-body text-center">
                            <div class="stats-icon">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <div class="stats-number">{{ $totalProjets ?? 0 }}</div>
                            <div class="stats-label">Projets actifs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card card" style="background-color: #17a2b8; color: white;">
                        <div class="card-body text-center">
                            <div class="stats-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="stats-number">{{ $totalActualites ?? 0 }}</div>
                            <div class="stats-label">Actualités</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card card" style="background-color: #6c757d; color: white;">
                        <div class="card-body text-center">
                            <div class="stats-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stats-number">{{ $totalUtilisateurs ?? 0 }}</div>
                            <div class="stats-label">Utilisateurs</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Dons -->
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section-title">Dons récents</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="background-color: #3498db; color: white;">
                                <tr>
                                    <th>Montant</th>
                                    <th>Utilisateur</th>
                                    <th>Projet</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($dons)
                                    @forelse($dons as $don)
                                        <tr>
                                            <td>{{ $don->amount }} XAF</td>
                                            <td>{{ $don->user->name }}</td>
                                            <td>{{ $don->project->title }}</td>
                                            <td>{{ $don->created_at->format('d/m/Y') }}</td>
                                            <td class="action-buttons">
                                                <button class="btn btn-sm btn-edit">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-sm btn-delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Aucun don enregistré</td>
                                        </tr>
                                    @endforelse
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Données non disponibles</td>
                                    </tr>
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Section Projets -->
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section-title">Projets en cours</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="background-color: #3498db; color: white;">
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Auteur</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($projets)
                                    @forelse($projets as $projet)
                                        <tr>
                                            <td>{{ $projet->title }}</td>
                                            <td class="content-preview">{{ $projet->description }}</td>
                                            <td>{{ $projet->admin->name }}</td>
                                            <td>{{ $projet->created_at->format('d/m/Y') }}</td>
                                            <td class="action-buttons">
                                                <a href="{{ route('projects.edit', $projet->id) }}" class="btn btn-sm btn-edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('projects.destroy', $projet->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('Supprimer ce projet ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Aucun projet en cours</td>
                                        </tr>
                                    @endforelse
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Données non disponibles</td>
                                    </tr>
                                @endisset
                            </tbody>
                        </table>
                        <a href="{{ route('projects.create') }}" class="btn btn-sm" style="background-color: #3498db; color: white;">
                            <i class="fas fa-plus"></i> Ajouter un projet
                        </a>
                    </div>
                </div>
            </div>

            <!-- Section Actualités -->
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center">Actualités récentes</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="background-color: #3498db; color: white;">
                                <tr>
                                    <th>Titre</th>
                                    <th>Contenu</th>
                                    <th>Auteur</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
<tbody>
    @isset($actualites)
        @forelse($actualites as $actualite)
            <tr>
                <td>{{ $actualite->title }}</td>
                <td class="content-preview">{{ $actualite->body }}</td>
                <td>{{ $actualite->admin->name }} 
                    <span class="badge" style="background-color: {{ $actualite->admin->role == 'admin' ? '#28a745' : '#3498db' }}; color: white;">
                        {{ $actualite->admin->role }}
                    </span>
                </td>
                <td>{{ $actualite->created_at->format('d/m/Y') }}</td>
                <td class="action-buttons">
                    <a href="{{ route('contents.edit', $actualite->id) }}" class="btn btn-sm btn-edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('contents.destroy', $actualite->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('Supprimer cette actualité ?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Aucune actualité publiée</td>
            </tr>
        @endforelse
    @else
        <tr>
            <td colspan="5" class="text-center">Données non disponibles</td>
        </tr>
    @endisset
</tbody>
                        </table>
                        <a href="{{ route('contents.create') }}" class="btn btn-sm" style="background-color: #3498db; color: white;">
                            <i class="fas fa-plus"></i> Ajouter une actualité
                        </a>
                    </div>
                </div>
            </div>

            <!-- Section Utilisateurs -->
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section-title">Utilisateurs</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="background-color: #3498db; color: white;">
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($utilisateurs)
                                    @forelse($utilisateurs as $utilisateur)
                                        <tr>
                                            <td>{{ $utilisateur->name }}</td>
                                            <td>{{ $utilisateur->email }}</td>
                                            <td>
                                                <span class="badge" style="background-color: {{ $utilisateur->role == 'admin' ? '#28a745' : '#6c757d' }}; color: white;">
                                                    {{ $utilisateur->role }}
                                                </span>
                                            </td>
                                            <td class="action-buttons">
                                                @if($utilisateur->role != 'super-admin')
                                                    <form action="{{ route('admin.toggle-role', $utilisateur->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm" style="background-color: #28a745; color: white;">
                                                            {{ $utilisateur->role == 'admin' ? 'Retirer admin' : 'Rendre admin' }}
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.delete-user', $utilisateur->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('Supprimer cet utilisateur ?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Aucun utilisateur</td>
                                        </tr>
                                    @endforelse
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Données non disponibles</td>
                                    </tr>
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @section('scripts')
        <!-- Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Scripts spécifiques au tableau de bord -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Tableau de bord admin chargé');
                
                // Scripts pour les interactions spécifiques au dashboard
                // Vous pouvez ajouter ici des fonctionnalités JavaScript supplémentaires
            });
        </script>
    @endsection
@endsection