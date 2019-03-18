/*
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
*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    const scroll_prev = document.querySelector('.scroll_prev');
    const scroll_next = document.querySelector('.scroll_next');

    const galeria_home_card = document.querySelectorAll('.galeria_home_card');

    var walkX = 0;

    if (scroll_next != null) {

        scroll_prev.addEventListener('click', () => {
            console.log(walkX);
            if (walkX === 0) {
                return;
            }

            walkX = walkX + 250;

            Array.from(galeria_home_card).forEach(function(card){
                card.style.left = walkX + 'px';
            });

        });

        scroll_next.addEventListener('click', () => {
            if (walkX < -330) {
                return;
            }

            walkX = walkX - 250;
            
            Array.from(galeria_home_card).forEach(function(card){
                card.style.left = walkX + 'px';
            });
        });
        
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*******
 * outros slides
 */

/*****
 * 
 * 
 * 
 */

/*
    scroll_prev_lista.addEventListener('click', () => {
        if (walkX_slider === 0) {
            return;
        }

        walkX_slider = walkX_slider + 250;

        Array.from(galeria_slider).forEach(function(card){
            card.style.left = walkX_slider + 'px';
        });
    });

    scroll_next_lista.addEventListener('click', () => {
        if (walkX_slider < -1430) {
            return;
        }

        walkX_slider = walkX_slider - 250;
        
        Array.from(galeria_slider).forEach(function(card){
            card.style.left = walkX_slider + 'px';
        });
    });
*/
    var walkX_slider = 0;

    function scrolling_prev(){
        const galeria_slider = document.querySelectorAll('.card');
        if (walkX_slider === 0) {
            return;
        }

        walkX_slider = walkX_slider + 250;

        Array.from(galeria_slider).forEach(function(card){
            card.style.left = walkX_slider + 'px';
        });
    }

    function scrolling_next(){
        const galeria_slider = document.querySelectorAll('.card');
        if (walkX_slider < -1200) {
            return;
        }

        walkX_slider = walkX_slider - 250;
        
        Array.from(galeria_slider).forEach(function(card){
            card.style.left = walkX_slider + 'px';
        });
    }