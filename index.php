

<?php
include 'includeweb/header.php';
?>

<!-- BANNER PRINCIPAL  -->
<section class="banner" id="banner">

   <div class="content">
      <span>Variedad de</span>
      <h3>Productos</h3>
      <p>Contamos con esos cosmeticos que necesitas para realzar tu belleza durante todo el dia, En todo momento, </p>
      <a href="#categorias" class="btn">Ver Categorias</a>
   </div>

   <div class="image">
      <img src="public/images/banner-producto.png" alt="">
   </div>

</section>
<!-- FINAL BANNER PRINCIPAL -->



<div class="container my-5">
    <div class="row mb-5">
        <div class="col col-md-12">
        <h2 id="categorias" class="text-center">CATEGORIAS</h2>
        </div>
    </div>
<div class="row row-cols-1 row-cols-md-4 g-4">
  <a href="rostros.php">
  <div class="col">
    <div class="card h-100">
      <img src="public/images/crema_maquillaje.png" class="card-img-top" alt="..." style="max-width: 300px;">
      <div class="card-body">
        <h3 class="card-title">ROSTRO</h3>
      </div>
    </div>
  </div>
  </a>

  <div class="col">
    <div class="card h-100">
      <img src="public/images/mascaras_de_Pestañas.png" class="card-img-top" alt="..." style="max-width: 300px; background: transparent !important;">
      <div class="card-body">
        <h3 class="card-title">CEJAS</h3>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card h-100">
      <img src="public/images/mascaras_de_Pestañas.png" class="card-img-top" alt="..." style="max-width: 300px;">
      <div class="card-body">
        <h3 class="card-title">OJOS</h3>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card h-100">
      <img src="public/images/lapiz_labial.png" class="card-img-top" style="max-width: 300px;">
      <div class="card-body d-flex align-items-center d-flex justify-content-center">
        <h3 class="card-title fw-bold">LABIOS</h3>  
      </div>
    </div>
  </div>
</div>
</div>

<!-- Servicios Adicionales  -->

<section class="service">

   <div class="box">
      <i class="fa-solid fa-motorcycle"></i>
      <p>Delivery Gratis</p>
      <span>La Serena</span>
   </div>

   <div class="box">
      <i class="fas fa-redo"></i>
      <p>Comunicación Directa</p>
   </div>

   <div class="box">
      <i class="fa-brands fa-whatsapp"></i>
      <p>Ventas</p>
   </div>

</section>

<!-- services section ends -->



<!-- Comentarios de Clientes  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> Experiencias de Usuarios <span></span> </h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <i class="fas fa-quote-right"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt laudantium est quam eveniet perferendis cum reprehenderit aperiam nesciunt soluta optio?</p>
            <img src="public/images/pic-1.png" alt="">
            <h3>Juan Sanchez</h3>
         </div>

         <div class="swiper-slide slide">
            <i class="fas fa-quote-right"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt laudantium est quam eveniet perferendis cum reprehenderit aperiam nesciunt soluta optio?</p>
            <img src="public/images/pic-2.png" alt="">
            <h3>Tania Mejias</h3>
         </div>

         <div class="swiper-slide slide">
            <i class="fas fa-quote-right"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt laudantium est quam eveniet perferendis cum reprehenderit aperiam nesciunt soluta optio?</p>
            <img src="public/images/pic-3.png" alt="">
            <h3>Jose Gonzalez</h3>
         </div>

         <div class="swiper-slide slide">
            <i class="fas fa-quote-right"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt laudantium est quam eveniet perferendis cum reprehenderit aperiam nesciunt soluta optio?</p>
            <img src="public/images/pic-4.png" alt="">
            <h3>Mirna Alejandra</h3>
         </div>

         <div class="swiper-slide slide">
            <i class="fas fa-quote-right"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt laudantium est quam eveniet perferendis cum reprehenderit aperiam nesciunt soluta optio?</p>
            <img src="public/images/pic-5.png" alt="">
            <h3>Marco Yanez</h3>
         </div>

         <div class="swiper-slide slide">
            <i class="fas fa-quote-right"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt laudantium est quam eveniet perferendis cum reprehenderit aperiam nesciunt soluta optio?</p>
            <img src="public/images/pic-6.png" alt="">
            <h3>Maria E.</h3>
         </div>
         
      </div>

   </div>

</section>

<!-- Final de comentarios de clientes -->


<!-- Seccion Contacto  -->

<section class="contact" id="contact">

 <h1 class="heading"> <span>Nuestro</span> Contacto </h1>

   <div class="row">

      <form action="">
         <input type="text" name="nombre" placeholder="Nombre" class="box">
         <input type="email" name="email" placeholder="Email" class="box">
         <input type="number" name="telefono" placeholder="Telefono " class="box">
         <textarea name="" name="mensaje" class="box" placeholder="Mensaje" id="" cols="30" rows="10"></textarea>
         <input type="submit" value="enviar" class="btn">
      </form>

      <div class="contact-info">
         <h3>¿Tienes alguna pregunta?</h3>
         <p class="grapgh">Cuentanos tus look y te contactamos, asesoramos tu BELLEZA</p>
         <div class="icons">
            <i class="fas fa-map"></i>
            <div class="info">
               <p>Sector Cuatro Esquina, La Serena</p>
            </div>
         </div>
         <div class="icons">
            <i class="fas fa-envelope"></i>
            <div class="info">
               <p>correocontacto@gmail.com</p>
               <p>correoventas@gmail.com</p>
            </div>
         </div>
         <div class="icons">
            <i class="fas fa-phone"></i>
            <div class="info">
               <p>+123-456-7890</p>
               <p>+111-222-3333</p>
            </div>
         </div>
        
      </div>
   </div>
</section>

<!-- contact section ends -->



<?php
include 'includeweb/footer.php';
?>