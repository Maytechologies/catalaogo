 

<!--------------------------->
<!------ Nuevo Modal -------->
<!--------------------------->
<div class="modal fade" id="nuevoregistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                     <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro (Modal) </h5>
                    </div>
                        <div class="modal-body">

                          
                          <form action="createNewModal.php" method="POST" enctype="multipart/form-data">
                            
                          <div class="row">
                                <div class="col col-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre :</label>
                                            <input type="text" class="form-control" name="nombre_modal" placeholder="Nombre del Modal" required="">                                
                                    </div> 
                                </div>    
                          </div>

                         <hr>

                         <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <label for="logo_data">Imagen :</label>
                                    <input type="file" style="border: none;" class="form-control border-0" id="small_img" name="img_modal" accept="image/jpeg, image/png, image/webp" required="">
                                </div>
                            </div>
                         </div>


                         <div class="modal-footer">
                           <div class="row text-center">
                               <div class="col col-6">
                                  <a href=""><button type="submit" class="btn btn-success">Registrar</button></a>
                                    </div>
                                    <div class="col col-6">
                                  <a href=""><button type="submit" class="btn btn-danger" data-dismiss="modal">Cerrar</button></a>
                               </div>
                            </div>
                         </div>

                     </form>

                    </div> <!-- END MODAL BODY -->

                </div>

        </div>
 </div><!--  End modal -->