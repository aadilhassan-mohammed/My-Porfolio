document.addEventListener("DOMContentLoaded", function() {
    document.body.style.opacity = 0;

    // Fade in effect
    setTimeout(function() {
        document.body.style.transition = "opacity 0.5s";
        document.body.style.opacity = 1;
    }, 100);

    // Add event listeners to links for fade out effect
    const links = document.querySelectorAll('a');
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            const href = this.getAttribute('href');

            // Fade out effect
            document.body.style.opacity = 0;

            setTimeout(function() {
                window.location.href = href; // Redirect after fade out
            }, 500); // Match the duration of the fade out
        });
    });
});
