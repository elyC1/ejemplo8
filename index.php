<?php
    include('menu.php');
//incluimo el archivo de la clase
    include('clases/producto.php');
//creamos una variable que representara a la clase
    $producto= NEW Producto();

    //mandamos a llamar la funcionn ppara mostrar los productos 
    $datos = $producto->mostrarNuevos();
    //tinen que llamarse la funcion exactamente con el mismo nombre, arroja la lista de registros en la BD
?>
<style type="text/css">
    .caja_producto{
        display: inline-block;
        width: 20%;
        border: black 2px solid;
        margin: 10px;
        padding: 20px 30px;
    }
</style>

</div>
    <h2>lo mas nuevo</h2>
    <?php
        while($fila=mysqli_fetch_array($datos)){ 
            $foto=mysqli_fetch_assoc($producto->obtenerportada($fila['idproducto']));
            $nombre ='';
            if ($foto!=null){
                $nombre = $foto['ruta'];
            }else{
                $nombre = 'noay.JPEG';
            }
    ?>

            <a class='a_producto' href="detalle_producto.php?producto=<?=$fila['idproducto']?>">
            <div class="caja_producto">
                <img width="200px" src="img/<?=$nombre?>">
                <h3> <?=$fila['nombre']?> </h3>
                <b> <?=$fila['precio']?> </b>
        </div>
            </a>

    <?php
        }
    ?>
</div>

<?php
    include('footer.php');
?>