document.getElementById('mobile-menu-button').addEventListener('click', function() {
    const menu = document.getElementById('navbar-default');
    menu.classList.toggle('hidden');
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