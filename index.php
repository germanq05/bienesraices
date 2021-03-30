<?php

require 'includes/app.php';

incluirTemplate('header',  $inicio = true);
?>



<main class="contenedor seccion">
    <h1 class="titulo">Mas Sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
            <h3 class="subtitulo">Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium earum totam in tempore qui accusantium? Est, distinctio, fuga libero fugit maxime impedit nam labore esse numquam, excepturi voluptas nesciunt saepe. Tenetur fugit facere
                porro officiis tempore eos, esse magni deleniti magnam id similique necessitatibus vitae. Aliquam eum nulla voluptatum, quasi delectus, perspiciatis ipsam veritatis, molestias omnis consequatur atque qui corporis!</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
            <h3 class="subtitulo">Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium earum totam in tempore qui accusantium? Est, distinctio, fuga libero fugit maxime impedit nam labore esse numquam, excepturi voluptas nesciunt saepe. Tenetur fugit facere
                porro officiis tempore eos, esse magni deleniti magnam id similique necessitatibus vitae. Aliquam eum nulla voluptatum, quasi delectus, perspiciatis ipsam veritatis, molestias omnis consequatur atque qui corporis!</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
            <h3 class="subtitulo">Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium earum totam in tempore qui accusantium? Est, distinctio, fuga libero fugit maxime impedit nam labore esse numquam, excepturi voluptas nesciunt saepe. Tenetur fugit facere
                porro officiis tempore eos, esse magni deleniti magnam id similique necessitatibus vitae. Aliquam eum nulla voluptatum, quasi delectus, perspiciatis ipsam veritatis, molestias omnis consequatur atque qui corporis!</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2 class="titulo">Casas y Departamentos en Venta</h2>

    <?php 
        include 'includes/templates/anuncios.php';
    ?>

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver Todas</a>
    </div>

</section>

<section class="imagen-contacto">
    <h2>Encuentra la Casa de tus Sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
    <a href="contacto" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3 class="titulo">Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" loading="lazy" alt="Texto entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el Techo de tu Casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img src="build/img/blog2.jpg" loading="lazy" alt="Texto entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la Decoracion de tu Hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>13/7/2021</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </div>
        </article>

    </section>


    <section class="testimoniales ">
        <h3 class="titulo">Testimoniales</h3>
        <div class="testimonial">
            <blockquote>El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofreieron cumple con todas mis expectativas.</blockquote>
            <p>- German Quiroga</p>
        </div>
    </section>
</div>

<?php
incluirTemplate('footer');
?>