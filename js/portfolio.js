let expertiseChoice = "";

document.addEventListener("DOMContentLoaded", function() {    
    filterListeners();
    load_ajax();
});

function filterListeners() {
    const options = document.querySelectorAll('.filtre-expertise .option');

    options.forEach(function(option) {
        option.addEventListener('click', function() {
            changeColorFilter();
            changeFilter(option);
        });
    });
}

function changeColorFilter () {
   
    const options = document.querySelectorAll('.filtre-expertise .option');

    options.forEach(option => {
        option.addEventListener('click', function() {
            // on retire la classe selected à toute les options
            options.forEach(opt => opt.classList.remove('selected'));
            // on ajoute la classe selected à l'option cliquée
            this.classList.add('selected');
        });
    });
}

function changeFilter(option) {
    // Mise à jour de la variable expertiseChoice
    if (option.classList.contains('all-option')) {
        expertiseChoice = "";
    } else if (option.classList.contains('choice')) {
        const texteElement = option.querySelector('p');
        if (texteElement) {
            expertiseChoice = texteElement.textContent;
        }
    }
    load_ajax();
    console.log(expertiseChoice);
}

// Fonction pour charger les données via AJAX
function load_ajax() {
    let expertise = expertiseChoice;

    const data = {
        'action': 'filter_posts',
        'expertises': expertise,
        'ajax_nonce' : ajax_object.nonce
    }

    fetch(ajax_object.ajax_url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Cache-Control': 'no-cache',
        },
        body: new URLSearchParams(data),
    })
    .then(response => response.text())
    .then(body => {
        const cataloguePortfolio = document.querySelector('.portfolio');
        cataloguePortfolio.innerHTML = body;
    });

}

