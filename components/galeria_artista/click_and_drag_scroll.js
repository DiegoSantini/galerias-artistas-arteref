
const slider = document.querySelectorAll('.scrolling-wrapper');
    let isDown = false;
    let startX;
    let scrollleft;

    Array.from(slider).forEach(function(slider){
            
        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('arteref_scroll_active');
            startX = e.pageX - slider.offsetLeft;
            scrollleft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('arteref_scroll_active');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('arteref_scroll_active');
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 3;
            slider.scrollLeft = scrollleft - walk;
        });

    });
    
    const slider_01 = document.querySelector('.scrolling-wrapper');

    const scroll_prev = document.querySelector('.scroll_prev');
    const scroll_next = document.querySelector('.scroll_next');

    const galeria_home_card = document.querySelectorAll('.galeria_home_card');

    var walkX = 0;

    scroll_prev.addEventListener('click', () => {

        if (walkX == 0) {
            return;
        }

        walkX = walkX + 100;

        Array.from(galeria_home_card).forEach(function(card){
            card.style.left = walkX + 'px';
        });

    });

    scroll_next.addEventListener('click', () => {

        if (walkX == -330) {
            return;
        }

        walkX = walkX - 100;
        
        Array.from(galeria_home_card).forEach(function(card){
            card.style.left = walkX + 'px';
        });
    });