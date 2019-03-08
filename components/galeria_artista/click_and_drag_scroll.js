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
    
    /*
    scroll_posts = document.querySelectorAll('.scroll_posts');
    console.log(scroll_posts);
    Array.from(scroll_posts).forEach(function(scroll_posts, index){
        console.log(scroll_posts.childNodes);
        console.log(index);
    });
    */
    
    const slider_01 = document.querySelector('.scrolling-wrapper');

    const scroll_prev = document.querySelector('.scroll_prev');
    const scroll_next = document.querySelector('.scroll_next');

    
    scroll_prev.addEventListener('click', () => {
        var control = 0;
        console.log(slider_01.scrollLeft );
        do {
            control += 80;
            slider_01.scrollLeft = slider_01.scrollLeft - control ;
        } while (control < 800);
        //slider_01.scrollLeft = slider_01.scrollLeft - 800;
    });

    scroll_next.addEventListener('click', () => {
        slider_01.scrollLeft = slider_01.scrollLeft + 800;
    });

    /*
    const slider_02 = document.querySelector('.s-w-2');
    const scroll_prev_02 = document.querySelector('.scroll_prev_sw2');
    const scroll_next_02 = document.querySelector('.scroll_next_sw2');
    
    scroll_prev_02.addEventListener('click', () => {
        slider_02.scrollLeft = slider_02.scrollLeft - 200;
    });
    scroll_next_02.addEventListener('click', () => {
        slider_02.scrollLeft = slider_02.scrollLeft + 200;
    });
    const slider_03 = document.querySelector('.s-w-3');
    const scroll_prev_03 = document.querySelector('.scroll_prev_sw3');
    const scroll_next_03 = document.querySelector('.scroll_next_sw3');
    
    scroll_prev_03.addEventListener('click', () => {
        slider_03.scrollLeft = slider_02.scrollLeft - 200;
    });
    scroll_next_03.addEventListener('click', () => {
        slider_03.scrollLeft = slider_02.scrollLeft + 200;
    });
    */