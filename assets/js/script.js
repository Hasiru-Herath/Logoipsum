        // Hamburger Menu
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('nav-menu');
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });

        // Form Validation
        const form = document.getElementById('contact-form');
        form.addEventListener('submit', (e) => {
            const firstName = document.getElementById('first-name').value.trim();
            const lastName = document.getElementById('last-name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            const terms = document.querySelector('input[name="terms"]').checked;

            if (!firstName || !lastName || !email || !message || !terms) {
                e.preventDefault();
                alert('Please fill in all required fields and agree to the terms.');
            }
        });

        // Movie Search and Grid
        const searchInput = document.getElementById('search-input');
        const movieGrid = document.getElementById('movie-grid');

        // Remove movie from grid
        movieGrid.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-btn')) {
                e.target.parentElement.remove();
            }
        });

        // Fetch movies from TMDb API
        searchInput.addEventListener('keypress', async (e) => {
            if (e.key === 'Enter') {
                const query = searchInput.value.trim();
                if (!query) return;

                try {
                    const response = await fetch(`https://api.themoviedb.org/3/search/movie?api_key=YOUR_API_KEY&query=${encodeURIComponent(query)}`);
                    const data = await response.json();
                    if (data.results && data.results.length > 0) {
                        const movie = data.results[0];
                        const movieCard = document.createElement('div');
                        movieCard.classList.add('movie-card');
                        movieCard.innerHTML = `
                            <button class="remove-btn">✖</button>
                            <img src="https://image.tmdb.org/t/p/w300${movie.poster_path}" alt="${movie.title}">
                            <h3>${movie.title}</h3>
                            <p>${movie.overview.slice(0, 100)}...</p>
                        `;
                        movieGrid.appendChild(movieCard);
                        searchInput.value = '';
                    } else {
                        alert('No movies found.');
                    }
                } catch (error) {
                    console.error('Error fetching movie:', error);
                    alert('Error fetching movie data.');
                }
            }
        });