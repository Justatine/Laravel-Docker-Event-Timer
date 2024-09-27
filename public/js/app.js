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

    // const showDrawerBtn = document.querySelector('[data-drawer-show="drawer-example"]');
    // const hideDrawerBtn = document.querySelector('[data-drawer-hide="drawer-example"]');
    // const drawer = document.getElementById('drawer-example');

    // function toggleDrawer() {
    //   if (drawer.classList.contains('-translate-x-full')) {
    //     drawer.classList.remove('-translate-x-full'); 
    //   } else {
    //     drawer.classList.add('-translate-x-full'); 
    //   }
    // }

    // showDrawerBtn.addEventListener('click', () => {
    //   toggleDrawer();
    // });

    // hideDrawerBtn.addEventListener('click', () => {
    //   toggleDrawer();
    // });

    const modalToggleBtns = document.querySelectorAll('[data-modal-toggle]');
    const modalCloseBtns = document.querySelectorAll('[data-modal-hide]');
    
    modalToggleBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const targetModal = document.getElementById(btn.getAttribute('data-modal-target'));
            toggleModal(targetModal);
        });
    });

    modalCloseBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const modal = btn.closest('.modal');
            if (modal) {
                toggleModal(modal);
            }
        });
    });

    function toggleModal(modal) {
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }
})

document.addEventListener('DOMContentLoaded', (event) => {
    const today = new Date();
    const formattedDate = today.toISOString().slice(0, 16);
    document.getElementById('deadline').setAttribute('min', formattedDate);
});