<?php

//-------------------------------------------------------------//
//-------------------  addUpdateUser.php  ---------------------//
//-------------------------------------------------------------//

require 'config/dbconfig.php';

$db = conectarDB();
$id = $_POST['id']; 


/* Esta consulta la ejecutamos para poder rescatar el campo photo de la tabla usuarios 
en caso que emn la actualizacion no selecionemos una nueva imagen */
$SQL = "SELECT *FROM modal_producto WHERE id_modal = ${id}";
  $queryModal = mysqli_query($db, $SQL);
   $modals = mysqli_fetch_assoc($queryModal); 

    echo "<pre>";
    var_dump($modals);
    echo "</pre>";  
    


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   

    echo "<br>"; 

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>"; 

    echo "<br>"; 

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>"; 
    echo "<br>";  
     
    
    

$nombre_modal  = mysqli_real_escape_string($db, $_POST['nombre_modal']);   

/* si selecionamos una nueva imagen para el usuaio
   Asignamos los datos que se recibe por variable global $_FILES a una variable */

$imagen = $_FILES['img_modal'];


var_dump($imagen);

/***********************************************/
/**SESION PARA ACTUALIZAR IMAGEN DEL MODAL****/
/***********************************************/

    //CREAR UNA CARPETA
    $carpetaImagenes = 'uploads/modals/';
    if (!is_dir($carpetaImagenes)) { //si no existe esta carpeta
        mkdir($carpetaImagenes); //crea la carpeta
    }

    $nombreImagen = '';

    if ($imagen['name']) {

        //Eliminamos la imagen actual con los atributos (ruta del archivo y nombre)
        unlink($carpetaImagenes .$modals['img_modal']);

        /**GENERAR UN NOMBRE UNICO y EXTENSION ALEATORIO PARA CADA IMAGEN**/
        $nombreImagen = md5(uniqid(rand(), true)) . ".webp";
       

        //capturamos la imagen temporal y la movemos a su carpeta imagenes*/

        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
    
        //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//

        
        
            }else {
                $nombreImagen = $modals['img_modal']; /* Si no llega una imagen nueva asignarle la que ya tiene en su registro actual */
            }

             /****************************************************/
             //SENTENCIA SQL PARA APLICAR UN UPDATE DATOS A LA DB
            /****************************************************/

           // NOTA: teclear cuidadosamente la sentencia SQL, encerrar los campos tipo string entre '' y los campos tipo numero sin comillas
            $query = "UPDATE modal_producto SET  nombre_modal = '${nombre_modal}',
                                                  img_modal = '${nombreImagen}'
                                                  WHERE id_modal = ${id} ";

            /*echo "<pre>";
            var_dump($query);
            echo "</pre>";  
            exit;   */
          

             //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE
             $resultado_update = mysqli_query($db, $query);

               //APLICAMOS UNA CONDICION POR SI / NO DE LA ACTUALIZACION EJECUTADA

                if ($resultado_update > 0) {
                    header('location: showModal.php?registro=2');
                }else {
                    header('location: showModal.php?error=4');
                }
           
         


}

