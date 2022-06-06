<?php

//-------------------------------------------------------------//
//-------SESION LISTADO DE MODALES - > showModal.php----------//
//-------------------------------------------------------------//

require './functions/function.php';


$auth = onlineUser();

//verificamos que exista usuario autenticado de no ser asi redirigir al sitio web

if (!$auth) {
    header('Location: ../index.php');
}


//conexion DB

require 'config/dbconfig.php';

$db = conectarDB();

//-------------------------------------------------------------//
//------SENTENCIA SQL CONSULTAR REGISTROS DE MODALES: ---------//
//-------------------------------------------------------------//

$SQLconsul = " SELECT *FROM modal_producto WHERE estado = 1";
$SQLquery = mysqli_query($db, $SQLconsul);



/******************************************/
/*======== ELIMINAR UN REGSITRO===========*/
/******************************************/

//COMPROBANDO LO QUE VIAJA POR EL POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_modal'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if ($id) {
        //Eliminamos la imagen relacionada con nuestro id recibido por POST
        $queryModal = "SELECT img_modal FROM modal_producto WHERE id_modal = ${id}";
        $resultadoModal = mysqli_query($db, $queryModal);
        $DelModal = mysqli_fetch_assoc($resultadoModal);

        var_dump($DelModal);


        unlink('uploads/modals/' . $DelModal['img_modal']);


        //eliminamos el registro relacionado con el id que recibimos por POST
        $query = "DELETE FROM modal_producto WHERE id_modal = ${id}";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('location: showModal.php?registro=3');
            
        }
    }
}


//incluimos las vistas header y menu de nuestros template admin
include 'views/adm_header.php';
include 'views/adm_menu.php';

?>


<!---------------------INICIAMOS EL CONTENIDO DE LA SESION----------------->


<div class="content-wrapper mb-4">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
    </div>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card">

                <div class="card-header">
                                <div class="col mr-auto">
                                    <h3 class="titulo card-title font-weight-bold">LISTADO DE MODALES</h3>
                                       </div>
                                        <div class="row d-flex justify-content-end"> 
                                        <div class="row text-nowrap align-items-center">
                                        <div class="col">Nuevo Registro :</div>
                                    <div class="col"><button class="btn btn-success" data-toggle="modal" data-target="#nuevoregistro"><i class="fas fa-plus-circle"></i></button></div>
                                    <?php  include 'modals/newModal.php'?>
                            </div>          
                        </div>       
                    </div>      

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">IMAGEN</th>
                                    <th>NOMBRE</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                          <tbody>

                            <?php while ($modal = mysqli_fetch_assoc($SQLquery)): ?>
                                    <tr>
                                        <td class="text-center" ><?php echo $modal['id_modal']; ?></td>

                                        <td class="w-2 text-center"><img class="imgsmall" src="uploads/modals/<?php echo $modal['img_modal']; ?>"></td>

                                        <td class="text-uppercase" ><?php echo $modal['nombre_modal']; ?></td>

                                        <td>
                                            <div class="row text-center">
                                                             <div class="col mx-0">
                                                                <!-- EDITAR REGISTRO -->
                                                                <button class="btn btn-warning" data-toggle="modal" data-target="#updateModal<?php echo $modal['id_modal']; ?>"><i class="fas fa-edit"></i></button>                           
                                                              </div>

                                                              <div class="col mx-0">
                                                                    <!-- CAMBIAR ESTADO -->
                                                                    <form action="updateEstadoModal.php" method="POST">
                                                                        <input type="hidden" name="id" value="<?php echo $modal['id_modal']; ?>">
                                                                    <button class="btn btn-secondary"  type="submit"><i class="fas fa-arrow-down"></i></button> 
                                                                    </form>                               
                                                              </div>

                                                                <div class="col mx-0">
                                                                  <!-- ELIMINAR REGISTRO -->
                                                                  <button class="buttondl btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $modal['id_modal']; ?>"><i class="fas fa-trash"></i></button>
                                                               </div>
                                                           </div>
                                                       </div>   
                                                  <?php  include 'modals/newModal.php'?>
                                               <?php  include 'modals/deleteModal.php'?>
                                             <?php  include 'modals/updateModal.php'?>
                                         </div> <!-- End Card Body -->
                                     <?php endwhile; ?>
                                </tbody>
                             <tfoot>
                          <tr>
                        <th>Item</th>
                             <th class="text-center">Imagen</th>
                                 <th>Nombre</th>
                               <th>Acciones</th>
                            </tr>
                         </tfoot>
                      </table>
                   </div> <!-- /.card-body -->
                </div> <!-- /.col --> 
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content -->

<?php

//CERRAMOS LA CONEXION
mysqli_close($db);
include 'views/adm_footer.php';

?>


