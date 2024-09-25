document.addEventListener('DOMContentLoaded', function() {
    const url = 'http://127.0.0.1:8000';

    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('navbar-default');
        menu.classList.toggle('hidden');
    });
    
    document.querySelectorAll('button[id="btn-delete"]').forEach(function(button) {
        button.addEventListener('click', function() {
            var eventId = this.getAttribute('data-id');
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            fetch(`${url}/delete`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ eventId: eventId }),
            })
            .then((res) => res.json())
            .then(window.location.reload())
        });
    });    

    setTimeout(() => {
        const elements = document.querySelectorAll('.alertPrompt');
        elements.forEach((element) => {
            element.style.transition = 'opacity 0.5s';
            element.style.opacity = '0';
            setTimeout(() => {
                element.style.display = 'none';
            }, 500); 
        });
    }, 3000);
})