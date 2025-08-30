@extends('layouts.app')

@section('title', 'Faire un Don - SAAHDEL ONG')

@section('content')
    <!-- Bouton retour accueil -->
    <a href="{{ url('/') }}#accueil" class="back-to-home" title="Retour à l'accueil">
        <i class="fas fa-home"></i>
    </a>

    <!-- Hero Section -->
    <section class="donation-hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold"><i class="fas fa-hands-helping me-2"></i>Soutenir SAAHDEL ONG</h1>
            <p class="lead">Votre don fait la différence dans la vie des communautés que nous servons</p>
            <div class="mt-4">
                <span class="badge bg-light text-primary me-2 p-2"><i class="fas fa-lock me-1"></i>Paiement Sécurisé</span>
                <span class="badge bg-light text-primary me-2 p-2"><i class="fas fa-receipt me-1"></i>Reçu Fiscal</span>
                <span class="badge bg-light text-primary p-2"><i class="fas fa-chart-pie me-1"></i>Transparence</span>
            </div>
        </div>
    </section>

    <div class="donation-container">
        <div class="row">
            <!-- Formulaire de don (gauche) -->
            <div class="col-lg-8 mb-4">
                <div class="donation-card">
                    <div class="donation-header">
                        <h2 class="mb-0"><i class="fas fa-donate me-2"></i>Formulaire de Don</h2>
                    </div>
                    <div class="donation-body">
                        <form id="donationForm">
                            <!-- Sélection du projet -->
                            <div class="mb-4">
                                <h4 class="mb-3"><i class="fas fa-project-diagram me-2 text-primary"></i>Choisissez un projet à soutenir</h4>
                                <select class="form-select form-select-lg" id="projectSelect" required>
                                    <option value="" selected disabled>Sélectionnez un projet...</option>
                                    <option value="education">Éducation des enfants défavorisés</option>
                                    <option value="healthcare">Soins de santé communautaire</option>
                                    <option value="women">Autonomisation des femmes</option>
                                    <option value="civil">État civil et citoyenneté</option>
                                    <option value="urgence">Interventions d'urgence</option>
                                    <option value="general">Fonds général (affecté où le besoin est le plus urgent)</option>
                                </select>
                            </div>
                            
                            <!-- Montant du don -->
                            <div class="mb-4">
                                <h4 class="mb-3"><i class="fas fa-coins me-2 text-primary"></i>Montant de votre don</h4>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="amount-option" data-amount="5000">
                                            <h5>5 000 XAF</h5>
                                            <p class="text-muted small">Fournit des fournitures scolaires à 2 enfants</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="amount-option selected" data-amount="10000">
                                            <h5>10 000 XAF</h5>
                                            <p class="text-muted small">Permet une consultation médicale pour 5 personnes</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="amount-option" data-amount="25000">
                                            <h5>25 000 XAF</h5>
                                            <p class="text-muted small">Finance une formation professionnelle</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="custom-amount-input mt-3">
                                    <label for="customAmount" class="form-label fw-bold">Ou saisissez un montant personnalisé</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light">XAF</span>
                                        <input type="number" class="form-control" id="customAmount" min="1000" step="500" placeholder="Montant personnalisé">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Mode de paiement -->
                            <div class="mb-4">
                                <h4 class="mb-3"><i class="fas fa-credit-card me-2 text-primary"></i>Mode de paiement</h4>
                                
                                <div class="payment-method selected" id="methodCinetpay">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="cinetpay" checked>
                                        <label class="form-check-label fw-bold" for="cinetpay">
                                            <i class="fas fa-mobile-alt me-2 text-primary"></i>Paiement Mobile (CinetPay)
                                        </label>
                                    </div>
                                    <div class="mt-3" id="cinetpayDetails">
                                        <div class="alert alert-info">
                                            <p class="mb-1"><strong>Disponible:</strong> MTN Mobile Money, Orange Money, Carte Bancaire</p>
                                            <p class="mb-0">Vous serez redirigé vers une interface de paiement sécurisée</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="payment-method" id="methodBank">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="bank">
                                        <label class="form-check-label fw-bold" for="bank">
                                            <i class="fas fa-university me-2 text-primary"></i>Virement Bancaire
                                        </label>
                                    </div>
                                    <div class="mt-3 d-none" id="bankDetails">
                                        <div class="alert alert-info">
                                            <p class="mb-1"><strong>Banque: BICEC</strong></p>
                                            <p class="mb-1"><strong>Compte: 12345678901</strong></p>
                                            <p class="mb-0"><strong>Nom: SAAHDEL ONG</strong></p>
                                        </div>
                                        <p class="small text-muted">Après avoir effectué votre virement, veuillez nous envoyer une preuve à contact@saahdel.org</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Informations personnelles -->
                            <div class="mb-4">
                                <h4 class="mb-3"><i class="fas fa-user me-2 text-primary"></i>Vos informations</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Adresse email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Téléphone</label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Adresse</label>
                                    <input type="text" class="form-control" id="address" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="form-label">Ville</label>
                                        <input type="text" class="form-control" id="city" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="country" class="form-label">Pays</label>
                                        <select class="form-select" id="country" required>
                                            <option value="CM">Cameroun</option>
                                            <option value="CI">Côte d'Ivoire</option>
                                            <option value="SN">Sénégal</option>
                                            <option value="ML">Mali</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="TG">Togo</option>
                                            <option value="BJ">Bénin</option>
                                            <option value="NE">Niger</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message (optionnel)</label>
                                    <textarea class="form-control" id="message" rows="2" placeholder="Dédicace ou mot d'encouragement..."></textarea>
                                </div>
                            </div>
                            
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="newsletter" checked>
                                <label class="form-check-label" for="newsletter">
                                    Je souhaite recevoir des nouvelles des projets et impact de SAAHDEL
                                </label>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-donate">
                                    <i class="fas fa-heart me-2"></i>Faire un don maintenant
                                </button>
                            </div>
                            
                            <div class="security-badge mt-4">
                                <p class="mb-0"><i class="fas fa-lock me-2 text-primary"></i>Vos données sont sécurisées et cryptées. Nous respectons votre vie privée.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Informations sur les projets (droite) -->
            <div class="col-lg-4">
                <div class="donation-card mb-4">
                    <div class="donation-header">
                        <h3 class="mb-0"><i class="fas fa-hand-holding-heart me-2"></i>Impact de votre don</h3>
                    </div>
                    <div class="donation-body">
                        <div class="impact-item">
                            <div class="impact-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Éducation</h6>
                                <p class="mb-0 small">5 000 XAF = fournitures scolaires pour 2 enfants</p>
                            </div>
                        </div>
                        
                        <div class="impact-item">
                            <div class="impact-icon">
                                <i class="fas fa-stethoscope"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Soins de santé</h6>
                                <p class="mb-0 small">10 000 XAF = consultations médicales pour 5 personnes</p>
                            </div>
                        </div>
                        
                        <div class="impact-item">
                            <div class="impact-icon">
                                <i class="fas fa-female"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Autonomisation</h6>
                                <p class="mb-0 small">25 000 XAF = formation professionnelle pour 1 femme</p>
                            </div>
                        </div>
                        
                        <div class="impact-item">
                            <div class="impact-icon">
                                <i class="fas fa-id-card"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">État civil</h6>
                                <p class="mb-0 small">15 000 XAF = documents d'identité pour 3 enfants</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="donation-card mb-4">
                    <div class="donation-header">
                        <h3 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Répartition des fonds</h3>
                    </div>
                    <div class="donation-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Programmes sur le terrain</span>
                                <span>85%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Frais administratifs</span>
                                <span>10%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 10%"></div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Collecte de fonds</span>
                                <span>5%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 5%"></div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info mt-4">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Transparence garantie</strong> - Nous publions des rapports annuels détaillés sur l'utilisation des fonds.
                        </div>
                    </div>
                </div>
                
                <div class="counter-box">
                    <h4><i class="fas fa-users me-2"></i>Donateurs aujourd'hui</h4>
                    <h2 class="display-4 fw-bold">3</h2>
                    <p class="mb-0">Rejoignez notre communauté de bienfaiteurs</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary-blue: #1a4f8b;
            --secondary-blue: #3a7cce;
            --accent-green: #2ecc71;
            --light-green: #e8f5e9;
            --dark-blue: #0a2d53;
            --light-blue: #e3f2fd;
            --orange-money: #ff6600;
        }
        
        body {
            background: linear-gradient(135deg, var(--light-blue) 0%, #f8f9fa 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            min-height: 100vh;
        }
        
        .donation-hero {
            background: linear-gradient(90deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: white; 
            border-radius: 0 0 2rem 2rem;
            margin-bottom: 3rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 5px; /* Compensation pour la navbar fixe */
        }
        
        .donation-container {
            max-width: 1200px;
            margin: 0 auto 4rem;
            padding: 0 15px;
        }
        
        .donation-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            transition: transform 0.3s;
            background: white;
        }
        
        .donation-card:hover {
            transform: translateY(-5px);
        }
        
        .donation-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .donation-body {
            padding: 2rem;
        }
        
        .impact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 12px;
            background-color: var(--light-green);
            border-radius: 8px;
            border-left: 4px solid var(--accent-green);
        }
        
        .impact-icon {
            width: 45px;
            height: 45px;
            background-color: var(--accent-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 1.1rem;
        }
        
        .amount-option {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 15px;
            background: white;
        }
        
        .amount-option:hover, .amount-option.selected {
            border-color: var(--secondary-blue);
            background-color: rgba(58, 124, 206, 0.05);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .amount-option.selected {
            background-color: rgba(58, 124, 206, 0.1);
            border-width: 3px;
        }
        
        .payment-method {
            border: 2px solid #dee2e6;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }
        
        .payment-method:hover, .payment-method.selected {
            border-color: var(--secondary-blue);
            background-color: rgba(58, 124, 206, 0.05);
        }
        
        .payment-method.selected {
            background-color: rgba(58, 124, 206, 0.1);
        }
        
        .progress {
            height: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        
        .btn-donate {
            background: linear-gradient(135deg, var(--accent-green), #27ae60);
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s;
            width: 100%;
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
        }
        
        .btn-donate:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(46, 204, 113, 0.4);
            background: linear-gradient(135deg, #27ae60, #219653);
        }
        
        .custom-amount-input {
            border: 2px dashed #ced4da;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            background: white;
        }
        
        .form-control:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 0.25rem rgba(58, 124, 206, 0.25);
        }
        .form-control {
             margin-bottom: 20px;
             border-radius: 10px;
             padding: 15px;
        }
        
        .form-select:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 0.25rem rgba(58, 124, 206, 0.25);
        }
        
        .momo-color {
            color: #ffcc00;
        }
        
        .orange-money-color {
            color: var(--orange-money);
        }
        
        .security-badge {
            background-color: var(--light-blue);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin-top: 20px;
            border-left: 4px solid var(--primary-blue);
        }
        
        .counter-box {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin-bottom: 20px;
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
        
        @media (max-width: 768px) {
            .donation-body {
                padding: 1.5rem;
            }
            
            .donation-hero {
                padding: 2rem 0;
                border-radius: 0 0 1rem 1rem;
                margin-top: 66px; /* Ajustement pour mobile */
            }
        }
        
        .cinetpay-processing {
            text-align: center;
            padding: 2rem;
        }
        
        .cinetpay-processing .spinner {
            width: 3rem;
            height: 3rem;
            margin-bottom: 1rem;
        }

        .btn-donate {
    background-color: var(--primary-color);
    color: white;
    padding: 15px 30px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
}

.btn-donate:hover {
    background-color: var(--secondary-color);
}

    </style>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Configuration CinetPay (remplacez par vos vraies clés)
        const CINETPAY_API_KEY = 'VOTRE_API_KEY'; // À remplacer par votre API Key CinetPay
        const CINETPAY_SITE_ID = 'VOTRE_SITE_ID'; // À remplacer par votre Site ID CinetPay
        
        document.addEventListener('DOMContentLoaded', function() {
            // Sélection des options de montant
            const amountOptions = document.querySelectorAll('.amount-option');
            const customAmountInput = document.getElementById('customAmount');
            
            amountOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Retirer la sélection précédente
                    amountOptions.forEach(opt => opt.classList.remove('selected'));
                    
                    // Sélectionner l'option cliquée
                    this.classList.add('selected');
                    
                    // Désélectionner le montant personnalisé
                    customAmountInput.value = '';
                });
            });
            
            // Lorsqu'on saisit un montant personnalisé, désélectionner les options prédéfinies
            customAmountInput.addEventListener('focus', function() {
                amountOptions.forEach(opt => opt.classList.remove('selected'));
            });
            
            // Gestion des méthodes de paiement
            const paymentMethods = document.querySelectorAll('.payment-method');
            const paymentRadios = document.querySelectorAll('input[name="paymentMethod"]');
            
            paymentMethods.forEach(method => {
                method.addEventListener('click', function() {
                    const radio = this.querySelector('input[type="radio"]');
                    if (radio) {
                        radio.checked = true;
                        paymentMethods.forEach(m => m.classList.remove('selected'));
                        this.classList.add('selected');
                        
                        // Afficher les détails spécifiques à la méthode
                        document.getElementById('cinetpayDetails').classList.remove('d-none');
                        document.getElementById('bankDetails').classList.add('d-none');
                        
                        if (radio.id === 'bank') {
                            document.getElementById('cinetpayDetails').classList.add('d-none');
                            document.getElementById('bankDetails').classList.remove('d-none');
                        }
                    }
                });
            });
            
            // Validation du formulaire
            const donationForm = document.getElementById('donationForm');
            donationForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Récupérer le montant sélectionné
                let amount = 0;
                const selectedOption = document.querySelector('.amount-option.selected');
                if (selectedOption) {
                    amount = selectedOption.getAttribute('data-amount');
                } else if (customAmountInput.value) {
                    amount = customAmountInput.value;
                }
                
                if (amount < 1000) {
                    alert('Le montant minimum du don est de 1000 XAF.');
                    return;
                }
                
                // Récupérer la méthode de paiement
                const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').id;
                
                // Si paiement par virement bancaire
                if (paymentMethod === 'bank') {
                    alert(`Merci pour votre engagement ! Veuillez effectuer un virement de ${amount} XAF sur notre compte bancaire. Vous recevrez un email de confirmation.`);
                    // Ici vous pouvez envoyer les données du formulaire à votre serveur
                    return;
                }
                
                // Si paiement via CinetPay
                if (paymentMethod === 'cinetpay') {
                    // Récupérer les informations du formulaire
                    const firstName = document.getElementById('firstName').value;
                    const lastName = document.getElementById('lastName').value;
                    const email = document.getElementById('email').value;
                    const phone = document.getElementById('phone').value;
                    const address = document.getElementById('address').value;
                    const city = document.getElementById('city').value;
                    const country = document.getElementById('country').value;
                    const project = document.getElementById('projectSelect').value;
                    const message = document.getElementById('message').value;
                    
                    // Générer un ID de transaction unique
                    const transactionId = 'DON_' + Math.floor(Math.random() * 100000000).toString();
                    
                    // Afficher un message de traitement
                    showProcessingMessage();
                    
                    // Initialiser CinetPay
                    initCinetPay(transactionId, amount, firstName, lastName, email, phone, address, city, country, project, message);
                }
            });
            
            // Fonction pour afficher le message de traitement
            function showProcessingMessage() {
                const processingMessage = `
                    <div class="cinetpay-processing">
                        <div class="spinner-border text-primary spinner" role="status">
                            <span class="visually-hidden">Chargement...</span>
                        </div>
                        <h4>Initialisation du paiement...</h4>
                        <p>Veuillez patienter pendant que nous préparons votre transaction.</p>
                    </div>
                `;
                
                // Remplacer le formulaire par le message de traitement
                document.querySelector('.donation-body').innerHTML = processingMessage;
            }
            
            // Fonction pour initialiser CinetPay
            function initCinetPay(transactionId, amount, firstName, lastName, email, phone, address, city, country, project, message) {
                // Configuration de CinetPay
                CinetPay.setConfig({
                    apikey: CINETPAY_API_KEY,
                    site_id: CINETPAY_SITE_ID,
                    notify_url: 'https://votredomaine.com/notify/', // URL de notification à configurer
                    close_after_response: true,
                    mode: 'PRODUCTION' // Ou 'TEST' pour les tests
                });
                
                // Préparer les données pour le paiement
                CinetPay.getCheckout({
                    transaction_id: transactionId,
                    amount: amount,
                    currency: 'XOF',
                    channels: 'ALL',
                    description: 'Don à SAAHDEL ONG - Projet: ' + project,
                    // Informations client obligatoires pour les paiements par carte
                    customer_name: firstName,
                    customer_surname: lastName,
                    customer_email: email,
                    customer_phone_number: phone,
                    customer_address: address,
                    customer_city: city,
                    customer_country: country,
                    customer_state: country,
                    customer_zip_code: '0000',
                    // Metadata pour stocker des informations supplémentaires
                    metadata: JSON.stringify({
                        project: project,
                        message: message,
                        type: 'donation'
                    })
                });
                
                // Gérer la réponse après paiement
                CinetPay.waitResponse(function(data) {
                    if (data.status == "REFUSED") {
                        showPaymentResult('error', 'Votre paiement a échoué. Veuillez réessayer.');
                    } else if (data.status == "ACCEPTED") {
                        showPaymentResult('success', 'Votre don a été effectué avec succès. Merci pour votre générosité!');
                    }
                });
                
                // Gérer la fermeture du popup
                CinetPay.onClose(function(data) {
                    if (data.status === "REFUSED") {
                        showPaymentResult('error', 'Le paiement a été annulé.');
                    } else if (data.status === "ACCEPTED") {
                        showPaymentResult('success', 'Paiement effectué avec succès!');
                    } else {
                        showPaymentResult('info', 'La fenêtre de paiement a été fermée.');
                    }
                });
                
                // Gérer les erreurs
                CinetPay.onError(function(data) {
                    console.error('Erreur CinetPay:', data);
                    showPaymentResult('error', 'Une erreur est survenue lors du traitement de votre paiement.');
                });
            }
            
            // Fonction pour afficher le résultat du paiement
            function showPaymentResult(type, message) {
                let icon, title, className;
                
                if (type === 'success') {
                    icon = 'fa-check-circle';
                    title = 'Paiement Réussi';
                    className = 'alert-success';
                } else if (type === 'error') {
                    icon = 'fa-times-circle';
                    title = 'Échec du Paiement';
                    className = 'alert-danger';
                } else {
                    icon = 'fa-info-circle';
                    title = 'Information';
                    className = 'alert-info';
                }
                
                const resultMessage = `
                    <div class="alert ${className} text-center">
                        <i class="fas ${icon} fa-3x mb-3"></i>
                        <h4>${title}</h4>
                        <p>${message}</p>
                        <p>Vous recevrez un email de confirmation sous peu.</p>
                        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
                    </div>
                `;
                
                document.querySelector('.donation-body').innerHTML = resultMessage;
            }
            
            // Mise à jour du compteur de donateurs (simulation)
            function updateDonorCounter() {
                const counterElement = document.querySelector('.counter-box h2');
                let count = parseInt(counterElement.textContent);
                // Simuler l'arrivée de nouveaux donateurs
                setInterval(() => {
                    count += Math.floor(Math.random() * 3);
                    counterElement.textContent = count;
                }, 60000); // Mise à jour toutes les minutes
            }
            
            updateDonorCounter();
        });
    </script>
@endsection