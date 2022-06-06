<?php

//-------------------------------------------------------------//
//-----------------  Modal UpdateModal.php  --------------------//
//-------------------------------------------------------------//
?>

<div class="modal fade" id="updateModal<?php echo $modal['id_modal']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                     <div class="modal-header bg-warning">
                        <h5 class="modal-title mx-auto" id="exampleModalLabel">Editar datos del Modal</h5>
                          </div>
                             <img class="card-img-top w-100"  style="height: 300px;" src="uploads/modals/<?php echo $modal['img_modal']; ?>">
                             <div class="modal-body">                         
                               <form action="addUpdateModal.php" method="POST" enctype="multipart/form-data">                      
                                  <div class="row">
                                        <div class="col col-12">
                                            <div class="form-group">
                                                <label for="nombre">Nombre :</label>
                                                <input type="hidden" name="id" value="<?php echo $modal['id_modal'];?>">
                                                <input type="text" class="form-control" name="nombre_modal" value="<?php echo $modal['nombre_modal']; ?>">                                
                                            </div> 
                                        </div> 
                                  </div>
                              <hr>

                         <div class="row">
                             <div class="col-12">
                             <div class="form-group">
                                <label for="logo_data"> Imagen del Modal:</label>
                                     <input type="file" style="border: none;" class="form-control border-0" id="img_modal" name="img_modal" placeholder="" accept="image/jpeg, image/png, image/webp" >
                                </div>
                               
                         </div>
                         <hr>
                         <div class="modal-footer bg-light">
                           <div class="row text-center">
                               <div class="col col-6">
                                  <a href=""><button type="submit" class="btn btn-success">Actualizar</button></a>
                               </div>
                               <div class="col col-6">
                                  <a href=""><button type="submit" class="btn btn-danger" data-dismiss="modal">Cerrar</button></a>
                               </div>
                           </div>
                         </div>

                     </form><!-- END FORMULARIO -->

                    </div> <!-- END MODAL BODY -->

                </div> <!-- END MODAL-CONTENT -->

           </div> <!-- END MODAL DIALOG -->
 </div><!--  End modal -->
