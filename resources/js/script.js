   // Script pour gérer les textes extensibles
        document.addEventListener('DOMContentLoaded', function() {
            const readMoreButtons = document.querySelectorAll('.read-more-btn');
            const textOverlay = document.getElementById('textOverlay');
            let currentlyExpanded = null;
            
            // Gestion des boutons "Voir plus"
            readMoreButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.getElementById(targetId);
                    
                    // Fermer le texte précédemment étendu
                    if (currentlyExpanded && currentlyExpanded !== targetElement) {
                        currentlyExpanded.classList.remove('text-expanded');
                        currentlyExpanded.classList.add('text-collapsed');
                        const correspondingButton = document.querySelector(`[data-target="${currentlyExpanded.id}"]`);
                        correspondingButton.textContent = 'Voir plus';
                    }
                    
                    // Ouvrir/fermer le texte actuel
                    if (targetElement.classList.contains('text-collapsed')) {
                        targetElement.classList.remove('text-collapsed');
                        targetElement.classList.add('text-expanded');
                        this.textContent = 'Voir moins';
                        currentlyExpanded = targetElement;
                        textOverlay.style.display = 'block';
                    } else {
                        targetElement.classList.remove('text-expanded');
                        targetElement.classList.add('text-collapsed');
                        this.textContent = 'Voir plus';
                        currentlyExpanded = null;
                        textOverlay.style.display = 'none';
                    }
                });
            });
            
            // Fermer en cliquant ailleurs
            textOverlay.addEventListener('click', function() {
                if (currentlyExpanded) {
                    currentlyExpanded.classList.remove('text-expanded');
                    currentlyExpanded.classList.add('text-collapsed');
                    const correspondingButton = document.querySelector(`[data-target="${currentlyExpanded.id}"]`);
                    correspondingButton.textContent = 'Voir plus';
                    currentlyExpanded = null;
                    textOverlay.style.display = 'none';
                }
            });
            
            // Smooth scrolling pour la navigation
            document.querySelectorAll('a.nav-link').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    if (this.getAttribute('href').startsWith('#')) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        window.scrollTo({
                            top: target.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
