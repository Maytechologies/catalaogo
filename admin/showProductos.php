<?php

require './functions/function.php';

$auth = onlineUser();

//verificamos que exista usuario autenticado de no ser asi redirigir al sitio web

if (!$auth) {
    header('Location: ../index.php');
}


//conexion DB

require 'config/dbconfig.php';

$db = conectarDB();


//SENTENCIA SQL CONSULTAR REGISTROS IMAGEN_MODAL:
$modals = "SELECT *FROM modal_producto ORDER BY id_modal DESC";
$resul_modal = mysqli_query($db, $modals);
$modallist =mysqli_query($db, $modals);

//-------------------------------------------------------------//
//---SENTENCIA SQL CONSULTAR REGISTROS TIPOS DE PRODUCTO:-----//
//-------------------------------------------------------------//

$tipo = "SELECT * FROM tipo_producto";
$resul_tipo = mysqli_query($db, $tipo); 
/* $tipoprod = mysqli_fetch_assoc($resul_tipo);

var_dump($tipoprod);
exit;  */


//----------------------------------------------------------------//
//----------CONSULTA MULTITABLA INNER JOIN SLQ--------------------//
//----------------------------------------------------------------//

$productos = "SELECT * FROM productos as p
INNER JOIN modal_producto as m
ON p.modal_img_id = m.id_modal WHERE estado_id = 1";
$resulAllProductos = mysqli_query($db, $productos);
/* $ProductosAll = mysqli_fetch_assoc($resulAllProductos); */

//----------------------------------------------------------------//
//-----------Consulta para el modal newproducto.php--------------//
//----------------------------------------------------------------//
 //Visualizamos la consulta SQL que usaremos en el select de (imgModal)
 $prod_modal = mysqli_query($db, $productos); 



 //-----------------------------------------------------------------//
//-----------CONSULTA 3 TABLAS PRODUCTOS, MODAL, TIPO--------------//
//-----------------------------------------------------------------//

//selecionamos el listado de productos con relacion de registro en las tablas tipo_producto y producto_modal (3 Tablas)
  $tablesProductos = "SELECT p.id, p.nombre, p.small_img, p.precio, p.ingredientes, p.tipo_id, p.creado, t.tipo_nombre, p.modal_img_id as id_modal, m.nombre_modal, m.img_modal, st.id_status as estado_id, st.name_status as estado 
                        FROM productos as p
                        INNER JOIN modal_producto as m
                        ON p.modal_img_id = m.id_modal
                        INNER JOIN tipo_producto as t
                        ON p.tipo_id = t.id
                        INNER JOIN estado as st
                        ON p.estado_id = st.id_status
                        WHERE estado_id = 1";
        $tables3Query = mysqli_query($db, $tablesProductos);
          /* $tables3 = mysqli_fetch_assoc($tables3Query);  */

       
/* var_dump($tables3['publico']);
exit; */


//VALIDAMOS LO QUE LLEGUE POR GET
$registro = $_GET['registro'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null

$update = $_GET['update'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null



/******************************************/
/*======== ELIMINAR UN REGSITRO===========*/
/******************************************/

//COMPROBANDO LO QUE VIAJA POR EL POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if ($id) {
        //Si recibe una nueva imagen Eliminamos la imagen relacionada con nuestro id recibido por POST
        $queryImg = "SELECT small_img FROM productos WHERE id = ${id}";
        $resultadoImg = mysqli_query($db, $queryImg);
        $propiedadImg = mysqli_fetch_assoc($resultadoImg);

          
        unlink('uploads/product/' . $propiedadImg['imagen']);


        //eliminamos el registro relacionado con el id que recibimos por POST
        $query = "DELETE FROM productos WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('location: showProductos.php?registro=3');
        }
    }
}

include 'views/adm_header.php';

?>

<?php
include 'views/adm_menu.php';

?>


<!-- Contenido principal -->
<div class="content-wrapper mb-4">

<!-- Main content -->
<section class="content"> 
    <div class="row">
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <div class="col mr-auto">
                            <h3 class="titulo card-title font-weight-bold">LISTADO DE PRODUCTOS</h3>
                        </div>
                          
                        <div class="row d-flex justify-content-end">
                        <div class="row text-nowrap align-items-center">
                           
                            <div class="col">Nuevo Modal :</div>
                            <div class="col"><button class="btn btn-info mr-5 ml-0" data-toggle="modal" data-target="#nuevomodal"><i class="fas fa-image"></i></button>
                            <?php  include 'modals/imgModal.php' ?>
                            </div>
                       
                        </div>

                        <div class="row text-nowrap align-items-center">
                            <div class="col">Nuevo Registro</div>
                            <div class="col"><button class="btn btn-success" data-toggle="modal" data-target="#nuevoproducto"><i class="fas fa-plus-circle"></i></button>
                            <?php  include 'modals/newproducto.php' ?>
                        </div>
                        </div>
                        </div>
                        
                    </div>
                    <hr>

                        <!-- /.card-header -->
            <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>NOMBRE</th>
                                        <th class="text-center">IMAGEN</th>
                                        <th class="text-center">PRECIO</th>
                                        <th class="">CATEGORIA</th>
                                        <th class="text-center">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>

                               <?php while ($productos = mysqli_fetch_assoc($tables3Query)): ?>
                                        <tr>
                                          

                                            <td><?php echo $productos['id']; ?></td>

                                            <td class="text-uppercase" ><?php echo $productos['nombre']; ?></td>

                                            <td class="w-2 text-center"><img src="uploads/product/<?php echo $productos['small_img']; ?>" alt="" height="45px" width="45px"></td>

                                            <td class="text-uppercase text-center" > $ <?php echo number_format($productos['precio'], 2, ',', '.'); ?></td> 

                                        <!--     //datos ucultos de la consulta select avanzada de productos -->
                                          <input type="hidden" name="" value="<?php echo $productos['ingredientes']  ;?>">
                                          <input type="hidden" name="" value="<?php echo $productos['tipo_id']  ;?>">
                                          <input type="hidden" name="" value="<?php echo $productos['creado']  ;?>">
                                          <input type="hidden" name="" value="<?php echo $productos['tipo_nombre']  ;?>">
                                          <input type="hidden" name="" value="<?php echo $productos['id_modal']  ;?>">
                                          <input type="hidden" name="" value="<?php echo $productos['nombre_modal']  ;?>">
                                          <input type="hidden" name="" value="<?php echo $productos['img_modal']  ;?>">
                                          <input type="hidden" name="" value="<?php echo $productos['estado']  ;?>">
                                          <input type="hidden" name="" value="<?php echo $productos['estado_id']  ;?>">
                                        
                                            

                                            
                                            <td class="text-uppercase" ><?php echo $productos['tipo_nombre']; ?></td>

                                            <td>
                                                <div class="row text-center">

                                                    <div class="col">
                                                        <!-- VER DETALLES DEL REGISTRO -->
                                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalficha<?php echo $productos['id']; ?>"><i class="fab fa-wpforms"></i></button>
                                                    </div>

                                                    <div class="col mx-0">
                                                        <!-- EDITAR REGISTRO -->
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#updateproducto<?php echo $productos['id']; ?>"><i class="fas fa-edit"></i></button>                                
                                                    </div>

                                                    <div class="col mx-0">
                                                        <!-- CAMBIAR ESTADO -->
                                                        <form action="updateEstadoProd.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
                                                        <button class="btn btn-secondary"  type="submit"><i class="fas fa-arrow-down"></i></button> 
                                                        </form>                               
                                                    </div>

                                                    <div class="col mx-0">
                                                        <!-- ELIMINAR REGISTRO -->
                                                        <button class="buttondl btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $productos['id']; ?>"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                                                                   
                                             <?php include  'modals/newproducto.php'   ?>
                                           <?php include 'modals/deleteProducto.php' ?>
                                        <?php include 'modals/updateProducto.php' ?>
                                    <?php include 'modals/fichaProducto.php' ?>
                                  
                                </div>
                            <?php endwhile; ?>
                        </tbody>
                    <tfoot>
                        <tr>
                            <th>Item</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                  </table>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
<!-- /.content -->
</div>
<!-- /.container-fluid -->


<!-- /.content -->
</div>

<?php

//CERRAMOS LA CONEXION
mysqli_close($db);
include 'views/adm_footer.php';

?>