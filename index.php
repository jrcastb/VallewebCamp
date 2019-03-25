<?php include_once 'includes/templates/header.php'//para hacer modular el sitio web ?>

  <section class="seccion contenedor">
    <h2>La mejor conferencia de diseño web en español</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At, molestiae iste! Tempore vel perferendis quidem corporis enim quia voluptatum repellat. Doloremque incidunt illum hic quas asperiores cumque dignissimos ut voluptatum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa cupiditate neque voluptates esse dicta porro est aliquam, vel delectus dolorem atque commodi autem quasi ratione tempore accusamus! Explicabo, eaque similique.</p>
  </section><!--.seccion contenedor-->
  <section class="programa">
    <div class="contenedor-video">
      <video autoplay loop muted poster="img/bg-talleres.jpg"><!--siempre agregar muted para autoplay-->
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogv">
      </video>
    </div><!--.contenedor-video-->


    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del evento</h2>
          <?php 
    
            try {
                require_once('includes/funciones/db_conexion.php');//creamos la conexion
                $conn->set_charset("utf8");
                $sql = " SELECT * FROM `categoria_evento` ";//Escribimos la consulta
                $sql .= " ORDER BY `categoria_evento`.`id_categoria` DESC ";//para que salga en el orden propuesto en el html
                $resultado = $conn->query($sql);//consultamos la base
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
          ?>
          <nav class="menu-programa">
          <?php
          while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <?php $categoriaEvento = $cat['cat_evento'] ?>
            <?php $icono = $cat['icono']; ?>
            <a href="#<?php echo strtolower($categoriaEvento); ?>"><i class="fa <?php echo $icono; ?>"></i><?php echo $categoriaEvento; ?></a>

          <?php } ?>

          </nav>
          <?php 
    
            try {
                require_once('includes/funciones/db_conexion.php');//creamos la conexion
                $conn->set_charset("utf8");
                //multipleQuery
                $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono,nombre_invitado, apellido_invitado ";//Escribimos la consulta
                $sql .= " FROM eventos ";//.= para concatenar
                $sql .= " INNER JOIN categoria_evento ";//con INNER JOIN unes las tabla
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";//dejar los espacios al inicio y al final de las comillas dobles es importante
                $sql .= " AND eventos.id_cat_evento = 1 ";
                $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono,nombre_invitado, apellido_invitado ";//Escribimos la consulta
                $sql .= " FROM eventos ";//.= para concatenar
                $sql .= " INNER JOIN categoria_evento ";//con INNER JOIN unes las tabla
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";//dejar los espacios al inicio y al final de las comillas dobles es importante
                $sql .= " AND eventos.id_cat_evento = 2 ";
                $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono,nombre_invitado, apellido_invitado ";//Escribimos la consulta
                $sql .= " FROM eventos ";//.= para concatenar
                $sql .= " INNER JOIN categoria_evento ";//con INNER JOIN unes las tabla
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";//dejar los espacios al inicio y al final de las comillas dobles es importante
                $sql .= " AND eventos.id_cat_evento = 3 ";
                $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
          ?>
          
          <?php $conn->multi_query($sql);//Ejecuta la función que permite realizar el multi query ?>

          <?php //el multi query se hace con el do While
          
          do {
            $resultado = $conn->store_result();//almacena los resultados de la consulta
            $row = $resultado->fetch_all(MYSQLI_ASSOC);//convierte el resultado en un array numerado?>
            <?php  $i = 0; ?>
            <?php foreach ($row as $evento): ?>
              <?php if ($i % 2 == 0) {  ?>
                
              
                <div id="<?php echo strtolower($evento['cat_evento']); ?>" class="info-curso ocultar"> <!--clearfix-->
                <?php }?>
                  <div class="detalle-evento">
                    <h3><?php echo $evento['nombre_evento']; ?> </h3>
                    <p><i class="far fa-clock" aria-hidden="true"></i> <?php echo $evento['hora_evento']; ?></p>
                    <p><i class="far fa-calendar-alt" aria-hidden="true"></i> <?php echo $evento['fecha_evento']; ?> </p>
                    <p><i class="fas fa-user-tie" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?> </p>
                  </div>
                
                
                <?php if ($i % 2 == 1): ?>
                  <a href="calendario.php" class="boton float-right">Ver todos</a>
                  </div><!--#talleres-->
                <?php endif; ?>
              <?php $i++; ?>
            <?php endforeach; ?>
            <?php $resultado->free(); //es necesario liberar la memoria luego de usar el multiquery?>
          <?php } while ($conn-> more_results() && $conn->next_result());// el while se ejecuta mientras que conexión tenga mas resultados y tenga resultados siguientes
          
          ?>



         
          

        </div><!--.programa-evento-->
      </div><!--.contenedor-->
    </div><!--.contenido-programa-->
  </section><!--.programa-->

 <!--Invitados-->
  <?php include_once 'includes/templates/invitados.php'?>


  <div class="contador parallax ">
    <div class="contenedor">
      <ul class="resume-evento clearfix">
        <li><p class="numero">0</p>Invitados</li>
        <li><p class="numero">0</p>Talleres</li>
        <li><p class="numero">0</p>Dias</li>
        <li><p class="numero">0</p>Conferencias</li>
      </ul>
    </div>
  </div>
  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por dia</h3>
            <p class="numero">30 COP</p>
            <ul>
              <li><i class="fas fa-check-square"></i> Bocadillos gratis</li>
              <li><i class="fas fa-check-square"></i> Todas las conferencias</li>
              <li><i class="fas fa-check-square"></i> Todos los talleres</li>
            </ul>
            <a href="#" class="boton hollow">Comprar</a>
          </div><!--.tabla-precio-->
        </li>
        <li>
            <div class="tabla-precio">
              <h3>Todos los días</h3>
              <p class="numero">50 COP</p>
              <ul>
                <li><i class="fas fa-check-square"></i> Bocadillos gratis</li>
                <li><i class="fas fa-check-square"></i> Todas las conferencias</li>
                <li><i class="fas fa-check-square"></i> Todos los talleres</li>
              </ul>
              <a href="#" class="boton">Comprar</a>
            </div><!--.tabla-precio-->
          </li>
          <li>
              <div class="tabla-precio">
                <h3>Pase por 2 días</h3>
                <p class="numero">45 COP</p>
                <ul>
                  <li><i class="fas fa-check-square"></i> Bocadillos gratis</li>
                  <li><i class="fas fa-check-square"></i> Todas las conferencias</li>
                  <li><i class="fas fa-check-square"></i> Todos los talleres</li>
                </ul>
                <a href="#" class="boton hollow">Comprar</a>
              </div><!--.tabla-precio-->
            </li>
      </ul><!--.lista-precios-->
    </div><!--.contenedor-->
  </section><!--.precios .seccion-->

  <div class="mapa" id="mapa">
    
  </div>

  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
      <div class="testimonial">
        <blockquote>
          
          <p><i class="fas fa-quote-left"></i> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi autem illum maiores voluptatem ad quaerat, qui laboriosam pariatur quibusdam ratione error! Unde dolorum, dignissimos autem sit tenetur laboriosam temporibus enim.</p>
         <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!--.testimonial-->
      <div class="testimonial">
        <blockquote>
          <p><i class="fas fa-quote-left"></i> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi autem illum maiores voluptatem ad quaerat, qui laboriosam pariatur quibusdam ratione error! Unde dolorum, dignissimos autem sit tenetur laboriosam temporibus enim.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!--.testimonial-->
      <div class="testimonial">
        <blockquote>
          <p><i class="fas fa-quote-left"></i> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi autem illum maiores voluptatem ad quaerat, qui laboriosam pariatur quibusdam ratione error! Unde dolorum, dignissimos autem sit tenetur laboriosam temporibus enim.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial_1.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Psicologa en @School</span></cite>
          </footer>
        </blockquote>
      </div><!--.testimonial-->
    </div><!--.testimoniales-->
  </section>

  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>Registrate al newsletter:</p>
      <h3>vallewebcamp</h3>
      <a href="#mc_embed_signup" class="boton-newsletter boton transparente">Registro</a>
    </div><!--.contenido .contenedor-->
  </div><!--.newsletter-->

  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul class="lista-cuenta clearfix">
        <li><p id="dias" class="numero"></p>Dias</li>
        <li><p id="horas" class="numero"></p>Horas</li>
        <li><p id="minutos" class="numero"></p>Minutos</li>
        <li><p id="segundos" class="numero"></p>Segundos</li>
      </ul>
    </div>
  </section>

 <?php include_once 'includes/templates/footer.php' ?>