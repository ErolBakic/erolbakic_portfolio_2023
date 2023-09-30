window.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#target-nav')){
        document.querySelectorAll('#target-nav a').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();

                const id = item.getAttribute('href');
                document.querySelector(id).scrollIntoView({
                    behavior: 'smooth'
                });
            })
        });
    }

});