<?php

//-------------------------------------------------------------//
//-----------------  UpdatePublisher.php  --------------------//
//-------------------------------------------------------------//


//Conectando a la DB
require 'config/dbconfig.php';
$db = conectarDB();

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    echo "<br>";


//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $consulModal = "SELECT *FROM modal_producto WHERE id_modal = ${id}";
       $queryModal = mysqli_query($db, $consulModal);
          $consulta = mysqli_fetch_assoc($queryModal); 

         /*  echo "<pre>";
          var_dump($publisher);
          echo "</pre>";
          exit; */
      

    if ($consulta['estado']==1) {

        $query = "UPDATE `modal_producto` SET `estado` = '2' WHERE `modal_producto`.`id_modal` =  ${id}";

    }elseif ($consulta['estado']=2) {

        $query = "UPDATE `modal_producto` SET `estado` = '1' WHERE `modal_producto`.`id_modal` =  ${id}";
    }
/* 
       echo "<pre>";
          var_dump($query);
          echo "</pre>";
          exit; */ 

    

        /* UPDATE `productos` SET `id`= 1,`nombre`='perro bulldog',`small_img`='imagen.jpg',`precio`= 1500,`ingredientes`='ingredientea, ingredienteB, ingredienteC,',`modal_img_id`= , NULL,`tipo_id`= 2,`estado`= 1 WHERE id = 1; */

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

            $resultado_update = mysqli_query($db, $query);


            if ($resultado_update > 0) {
                header('location: showModal.php?registro=1');
            }else {
                header('location: showModal.php?error=4');
            }

        



}


    
