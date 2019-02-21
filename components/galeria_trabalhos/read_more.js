jQuery(document).ready(function($) { 
    $('.galeria_artista_biografia').readmore({ 
        speed: 75, 
        collapsedHeight: 80,
        moreLink: '<div><a href="#">Exibir mais</a></div>',
        lessLink: '<div><a href="#">Exibir menos</a></div>',
        blockCSS: 'display: inline-block; width: 100%;'
    });
    $('.galeria_evento_descricao').readmore({ 
        speed: 75, 
        collapsedHeight: 68,
        moreLink: '<div><a href="#">Exibir mais</a></div>',
        lessLink: '<div><a href="#">Exibir menos</a></div>',
        blockCSS: 'display: inline-block; width: 100%;'
    });
});
