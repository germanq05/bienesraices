<?php 
    require 'includes/app.php';

    incluirTemplate('header');
?>



    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jepg">
                    <img src="build/img/nosotros.jpg" alt="Imagen Nosotros" loading="lazy">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>

                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque minima at inventore blanditiis corporis sit possimus rerum obcaecati distinctio, vitae, ut voluptate sint dolorem repellendus placeat eaque reprehenderit nihil similique
                    amet maiores! Reprehenderit recusandae accusantium voluptate obcaecati, id ipsum quidem modi nobis consequatur illum dolores.</p>

                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita non, mollitia nemo culpa odit fugit ipsum optio, sequi in iure nisi nulla perspiciatis quae distinctio dolor necessitatibus animi eos rerum! Distinctio aperiam dolore quam
                    labore minima delectus. Voluptas ea aspernatur nihil vel inventore ullam expedita error!</p>


            </div>

        </div>
    </main>


    <?php 
    incluirTemplate('footer');
    ?>