document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const searchButton = document.querySelector('.search-button');

    searchButton.addEventListener('click', function(event) {
        if (searchInput.classList.contains('open')) {
            return;
        } else {
            event.preventDefault();
            searchInput.classList.toggle('open');
            searchInput.focus();
        }
    });

    searchInput.addEventListener('blur', function() {
        if (searchInput.value.trim() === '') {
            searchInput.classList.remove('open');
        }
    });
});
