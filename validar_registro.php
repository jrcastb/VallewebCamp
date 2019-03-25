<?php if (isset($_POST['submit'])):?>
        <?php
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $regalo = $_POST['regalo'];
        $total = $_POST['total_pedido'];
        $fecha = date('Y-m-d H:i:s');
        //pedidos de camisas, etiquetas y otros
        $boletos = $_POST['boletos'];
        $camisas = $_POST['pedido_camisa'];
        $etiquetas = $_POST['pedido_etiqueta'];
        include_once 'includes/funciones/funciones.php';
        $pedido = productos_json($boletos, $camisas, $etiquetas);//siempre que utilices una función que retorna valores debes colocarlos dentro de una variable
        //eventos
        $eventos = $_POST['registro'];
        $registro = eventos_json($eventos);
        try {
            require_once('includes/funciones/db_conexion.php');//creamos la conexion
            $conn->set_charset("utf8");
            $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, correo_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?) ") ; //statement
            //la letra s quiere decir string y la i es un entero. En el mismo orden que se agregan las letras se agregan las variables ya que de ello depende el timpo de dato
            $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);// -> un objeto en php
            $stmt->execute();//ejecutar el statement
            $stmt->close();
            $conn->close();
            //con esto nos aseguramos que los datos de registro no se vuelvan a reinsertar en la base de datos  
            header('Location: validar_registro.php?exitoso=1');//tiene que ser antes de que se mande cualquier cosa al navegador, por eso se cambió de posición todo el codigo a la parte superior
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        ?>
<?php endif; ?>
<?php include_once 'includes/templates/header.php'; ?>

<section class = "seccion contenedor">
    <h2>Resumen Registro</h2>
    <div class = "exitoso">
        <?php if(isset($_GET['exitoso'])) {
            if($_GET['exitoso'] == 1) {
                echo "El registro del usuario ha sido exitoso";
            }
        } ?>
    </div>    
    
</section>
<?php include_once 'includes/templates/footer.php'; ?>