<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Dons - SAAHDEL ONG</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #1a4f8b;
            --secondary-blue: #3a7cce;
            --accent-green: #2ecc71;
            --light-green: #e8f5e9;
            --dark-blue: #0a2d53;
            --light-blue: #e3f2fd;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .donation-hero {
            background: linear-gradient(90deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
        }
        
        .donation-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            background: white;
            margin-bottom: 2rem;
        }
        
        .donation-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .donation-status {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: bold;
        }
        
        .status-completed {
            background-color: #e8f5e9;
            color: #2ecc71;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #ffc107;
        }
        
        .project-badge {
            background-color: var(--light-blue);
            color: var(--primary-blue);
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.85rem;
            margin-right: 0.5rem;
        }
        
        .back-to-home {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            background: var(--primary-blue);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }
        
        .back-to-home:hover {
            transform: translateY(-3px);
            background: var(--secondary-blue);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Bouton retour accueil -->
    <a href="index.html" class="back-to-home" title="Retour à l'accueil">
        <i class="fas fa-home"></i>
    </a>

    <!-- Hero Section -->
    <section class="donation-hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold"><i class="fas fa-hand-holding-heart me-2"></i>Mes Dons</h1>
            <p class="lead">Historique de vos contributions à SAAHDEL ONG</p>
        </div>
    </section>

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-donate fa-3x text-primary mb-3"></i>
                        <h3>14 500 XAF</h3>
                        <p class="text-muted">Total des dons</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-project-diagram fa-3x text-success mb-3"></i>
                        <h3>3</h3>
                        <p class="text-muted">Projets soutenus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-gift fa-3x text-warning mb-3"></i>
                        <h3>2</h3>
                        <p class="text-muted">Dons ce mois-ci</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="donation-card">
            <div class="donation-header">
                <h2 class="mb-0"><i class="fas fa-history me-2"></i>Historique de mes dons</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Projet</th>
                                <th>Montant</th>
                                <th>Méthode</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15/10/2023</td>
                                <td><span class="project-badge">Éducation</span></td>
                                <td>10 000 XAF</td>
                                <td>Orange Money</td>
                                <td><span class="donation-status status-completed">Complété</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-receipt"></i> Reçu
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>05/10/2023</td>
                                <td><span class="project-badge">Santé</span></td>
                                <td>2 500 XAF</td>
                                <td>MTN Mobile Money</td>
                                <td><span class="donation-status status-completed">Complété</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-receipt"></i> Reçu
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>28/09/2023</td>
                                <td><span class="project-badge">Autonomisation</span></td>
                                <td>2 000 XAF</td>
                                <td>Virement Bancaire</td>
                                <td><span class="donation-status status-pending">En attente</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-secondary" disabled>
                                        <i class="fas fa-clock"></i> En traitement
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="donation-card">
            <div class="donation-header">
                <h2 class="mb-0"><i class="fas fa-project-diagram me-2"></i>Mes projets soutenus</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Éducation des enfants défavorisés</h5>
                                <p class="card-text">Soutien à la scolarisation des enfants des communautés rurales.</p>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                </div>
                                <p class="card-text"><small class="text-muted">Dernier don: 15/10/2023</small></p>
                                <a href="#" class="btn btn-sm btn-primary">Voir le projet</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Soins de santé communautaire</h5>
                                <p class="card-text">Accès aux soins de santé primaire pour les communautés isolées.</p>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                </div>
                                <p class="card-text"><small class="text-muted">Dernier don: 05/10/2023</small></p>
                                <a href="#" class="btn btn-sm btn-primary">Voir le projet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="donation.html" class="btn btn-primary btn-lg">
                <i class="fas fa-plus me-2"></i>Faire un nouveau don
            </a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>