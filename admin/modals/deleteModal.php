
<!------------------------------------------------->
<!---------- Modal DeleteModal.php ------------->
<!------------------------------------------------->


<!-- Modal -->
<div class="modal fade" id="eliminar<?php echo $modal['id_modal']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="text-center modal-header bg-danger shadow-sm p-2 mb-2">
        <h5 class="modal-title" id="exampleModalLabel">¿Confima de Eliminar el Registro..?</h5>
      </div>
      <div class="modal-body">
       
        <form method="POST">

      <div class="row">
        <div class="col col-6">
            <div class="from-group text-center">
               <img class="mb-2 bg-white rounded" src="uploads/modals/<?php echo $modal['img_modal'];?>" width="200px" height="250px">
                  </div>
                    </div>

                       <div class="col col-6 border-left d-flex justify-content-center row align-items-center">
                         <div class="from-group">
                           <h4 class="font-weight-bold titulo">Nombre :</h4>
                              <input type="hidden"  name="id_modal" id="id_modal" value="<?php echo $modal['id_modal'];?>">
                                <label class="font-weight-light label" for="nombre"><?= $modal['nombre_modal'];?></label>                        
                                  </div>
                                </div>
                              </div>
                          <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-danger">Eliminar</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>