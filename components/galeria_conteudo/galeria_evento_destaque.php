<?php
    function galeria_evento_destaque(){
        ?>
        <div class="col-lg-12 galeria_evento_destaque">
            <div class="col-lg-6 galeria_evento_texto">
                <p><b>Últimos eventos</b></p>
                <div class='ge_texto'>
                    <h2>Lorem inpsum</h2>
                    <p> <i>21/01/2019 - 02/02/2019</i></p>
                </div>
                <div class='ge_texto'>
                    <h2>dolor sit amet consectetur.</h2>
                    <p> <i>01/02/2019 - 02/07/2019</i></p>
                </div>
                <div style="text-align:center">
                    <span class="galeria_dot" onclick="currentSlide(1)"></span> 
                    <span class="galeria_dot" onclick="currentSlide(2)"></span> 
                </div>
            </div>

            <div class="col-lg-6 galeria_evento_img galeria_evento_slide">
                <div class='galeria_slide galeria_fade'>
                    <img src="https://arteref.com/wp-content/uploads/2019/02/JUGS-I.jpg" alt="">
                </div>
                <div class='galeria_slide galeria_fade'>
                    <img src="https://arteref.com/wp-content/uploads/2019/02/forca-do-mar-saquarema-militao.jpg" alt="">
                </div>
                <!-- Next and previous buttons -->
                <a class="galeria_evento_prev" onclick="plusSlides(-1)"><span class='glyphicon glyphicon-chevron-left'></span></a>
                <a class="galeria_evento_next" onclick="plusSlides(1)"><span class='glyphicon glyphicon-chevron-right'></span></a>
            </div>

        </div>

        <?php
    }
?>