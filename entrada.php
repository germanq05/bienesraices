<?php 
    require 'includes/funciones.php';

    incluirTemplate('header');
?>



    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen Destacada">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>


        <div class="resumen-propiedad">


            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste hic dicta asperiores, distinctio labore ducimus qui? Veniam modi temporibus rem ipsa voluptatibus voluptates dolores mollitia voluptate ullam, perferendis doloremque quaerat unde
                quia corrupti sapiente provident hic cumque enim itaque. Saepe aspernatur reiciendis voluptates ex libero. Corrupti eum, velit esse deserunt maiores quas repudiandae. Laborum iusto nisi vitae unde atque incidunt suscipit, labore consectetur
                cumque amet.</p>

        </div>


    </main>


    <?php 
    incluirTemplate('footer');
    ?>