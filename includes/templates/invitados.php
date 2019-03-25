
<?php 

try {
    require_once('includes/funciones/db_conexion.php');//creamos la conexion
    $conn->set_charset("utf8");
    $sql = " SELECT * FROM `invitados` ";
    $resultado = $conn->query($sql);//consultamos la base
} catch (\Exception $e) {
    echo $e->getMessage();
}
?>

<section class="invitados contenedor seccion">
<h2 class="h2-inv" >Nuestros invitados</h2>
<ul class="lista-invitados clearfix"><!--clearfix-->
<?php
while ($invitados = $resultado->fetch_assoc()){ ?>
    
    
    <li>
        <div class="invitado">
            <a class = "invitado-info" href="#invitado<?php echo $invitados['invitado_id'] ?>">
                <img src="img/<?php echo $invitados['url_imagen']?>" alt="invitado uno">
                <p> <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></p>
            </a>
        </div>
    </li>
    <div style= "display:none;" >
        <div class = "invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
            <h2><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'];  ?></h2>
            <img src="img/<?php echo $invitados['url_imagen']?>" alt="invitado uno">
            <p><?php echo $invitados['descripcion_invitado']; ?></p>
            
        </div>
    </div>
        

    
<?php }//while del fetch_assoc() //imprimimos los resultados - fetch_all retorna todos ?> 
</ul>
</section>

</div><!--.calendario-->


<?php $conn->close();//cerramos la conexión ?>

