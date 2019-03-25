<?php include_once 'includes/templates/header.php'//para hacer modular el sitio web ?>




<section class = "seccion contenedor">
<h2>Calendario de eventos</h2>
    <?php 
    
        try {
            require_once('includes/funciones/db_conexion.php');//creamos la conexion
            $conn->set_charset("utf8");
            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono,nombre_invitado, apellido_invitado ";//Escribimos la consulta
            $sql .= " FROM eventos ";//.= para concatenar
            $sql .= " INNER JOIN categoria_evento ";//con INNER JOIN unes las tabla
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";//dejar los espacios al inicio y al final de las comillas dobles es importante
            $sql .= " ORDER BY evento_id ";
            $resultado = $conn->query($sql);//consultamos la base
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    ?>
    <div class="calendario">
        <?php //forma recomendada de trabajar con fetch_assoc() 
        //formatear arreglos para agruparlos como sea necesario
        $calendario = array();
        while ($eventos = $resultado->fetch_assoc()){ 
            
            //obtiene la fecha del evento
            $fecha = $eventos['fecha_evento'];
            $categoria = $eventos['cat_evento'];

            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha' => $eventos['fecha_evento'],
                'hora' => $eventos['hora_evento'],
                'categoria' => $eventos['cat_evento'],//utilicé fa porque university es fas
                'icono' => "fas" . " " . $eventos['icono'],
                'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado'] 
            );
            //agrupa los eventos con la misma fecha
            $calendario[$fecha][] = $evento;
            ?>
            
            
        <?php }//while del fetch_assoc() //imprimimos los resultados - fetch_all retorna todos ?> 
        
        <?php //imprime todos los eventos
        foreach ($calendario as $dia => $lista_eventos) {?>
            
            <h3>
            <i class = "far fa-calendar-alt" ></i>
            <?php 
            //unix
            setlocale(LC_TIME, 'es_ES.UTF-8');
            //windows
            setlocale(LC_TIME, 'spanish');
            echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia)));//el utf8_encode cambia la linea a formato utf8 ?>
            </h3>


            <?php 
            foreach ($lista_eventos as $evento) { ?>
                <div class="dia">
                <p class="titulo"> <?php echo $evento['titulo']; ?> </p>
                <p class="hora"> <i class = "far fa-clock" aria-hidden="true"></i> <?php echo $evento['fecha'] . " " . $evento['hora']; ?>  </p>
                <p class="categoria"> <i class = "<?php echo $evento['icono']; ?>" aria-hidden = "true"></i> <?php echo $evento['categoria']; ?> </p>

                
                <p class="invitado"> <i class = "far fa-user" aria-hidden = "true"></i> <?php echo $evento['invitado'];?> </p>
                
                </div>
                

            <?php } //fin foreach eventos?>
        <?php    } //fin foreach de dias ?>
        
        
       
        
    </div><!--.calendario-->
    <!--<pre>
        <?php //var_dump($calendario); ?>
    </pre>-->

    <?php $conn->close();//cerramos la conexión ?>
</section>




<?php include_once 'includes/templates/footer.php'//para hacer modular el sitio web ?>