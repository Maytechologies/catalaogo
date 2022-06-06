
<!----------------------------------->
<!------ Modal PARA PRODUCTOS-------->
<!----------------------------------->
 <div class="modal fade" id="nuevomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                     <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="exampleModalLabel">Modal De Producto :</h5>
                    </div>
                        <div class="modal-body">
                                                         
                          <form action="createNewModal.php" method="POST" enctype="multipart/form-data">

                       
                         <div class="form-group">
                             <div class="col col-md-12">
                                <label for="precio">Nombre :</label>
                                    <input type="text" class="form-control w-100" id="nombre_modal" name="nombre_modal" placeholder="Nombre" required>
                                </div>
                                                           
                         </div>
                    
                         <hr>


                         <div class="form-group">
                            <div class="row">
                                <div class="form-group">
                                <label for="logo_data">Imagen del Modal :</label>
                                    <input type="file" style="border: none;" class="form-control border-0" id="img_modal" name="img_modal" placeholder="" accept="image/jpeg, image/png, image/webp">
                                </div>
                            </div>

                         </div>



                         <div class="modal-footer bg-light">
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

                          <!-- Inicio Table Categorias -->
                          

                          <div class="" style="overflow-y: auto; height: 150px">
                            <table class="table table-hover" >
                                <thead>
                                    <tr>
                                    <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                            

                            <?php while ($datamodal = mysqli_fetch_assoc($modallist)): ?>    
                            <tr>
                                    <td><img src="/admin/uploads/modals/<?php echo $datamodal['img_modal'] ?>" style="height: 50px; width: 50px;"></td>
                                      <td><?php echo $datamodal['nombre_modal'] ?></td>
                                   
                                </tr>
                            <?php endwhile ?>
                                 
                                </tbody>
                                </table>


                          </div>

                        

                    </div> <!-- END MODAL BODY -->

                </div>

        </div>
 </div><!--  End modal -->
                     
                     
                     
                     
                     
        