<?php
    
    include_once "head.php";
    
?>

<?php
 include_once "../funciones/funcionesMarca.php";
 include_once "../funciones/funcionesCategoria.php";
 include_once "../funciones/funcionesProducto.php";
 
 if(isset($_GET['id_prod'])){
    $id_prod=$_GET['id_prod'];
    echo "recibido ".$id_prod;
    $datosPro=getProductoById($id_prod);
}
   
    if(isset($_POST['btnUpdate'])){
        
             $id_prod=$_POST['txtCodigo'];
             $prod_desc=$_POST['txtDesc'];
             $prod_precio_c=$_POST['txtPrecio'];
             $prod_precio_v=$_POST['txtPrecioV'];
             $prod_stock=$_POST['txtStock'];
             $prod_fecha_elab=$_POST['txtFechaElab'];
             $prod_nivel_azucar=$_POST['cboNivelAzucar'];
             
             $prod_aplica_iva=0;
             
            if(isset($_POST['chkPagaIva'])){
                $prod_aplica_iva=1;
            }

             $prod_especificacion=$_POST['txtEspecifi'];
             


            /***************** GUARDAR IMAGEN ************************* */

    $fotoanterior = $_POST['txtFotoAnterior'];

    $imgFile = $_FILES['imguser']['name'];
    $tmp_dir = $_FILES['imguser']['tmp_name'];
    $imgSize = $_FILES['imguser']['size'];
    $upload_dir = '../img/';


    if ($imgFile) {
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $nombrearchivo = "foto_" . $id_prod;

        $prod_imagen = $nombrearchivo . "." . $imgExt;

        $max_ancho = 400;
        $max_alto = 300;

        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '1MB'
         
                if ($fotoanterior != 'sinImagen.jpg') {
                    unlink($upload_dir . $fotoanterior);
                }
                move_uploaded_file($tmp_dir, $upload_dir . $prod_imagen);
           
        } else {
            $imgerror = "Lo siento, JPG, JPEG, PNG & GIF formatos de archivo permitidos";
        }
    } else {
        $prod_imagen = $fotoanterior; //antigua imagen 
    }

            /*************** GUARDAR IMAGEN ***************** */
             $mar_id=$_POST['cboMarcas'];
             $cat_id=$_POST['cboCategoria'];

             if(updateProducto(
            $id_prod,
             $prod_desc,
             $prod_precio_c,
             $prod_precio_v,
             $prod_stock,
             $prod_fecha_elab,
             $prod_nivel_azucar,
             $prod_aplica_iva,
             $prod_especificacion,
             $prod_imagen,
             $mar_id,
             $cat_id )==true ){
                header('Location: crudProductos.php');
            ?>
                 
                 
                 
                 <script>
                    
                    Swal.fire({
                    icon: 'success',
                    title: 'Datos Guardados con exito',
                    showConfirmButton: false,
                    timer: 1500
                    })

                 </script>
                    
                 <?php echo '';}else{  echo ''; ?>
                
                   <script>

                     Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al guardar los datos',
                    
                    })
                   </script>
                
                <?php 
             }
    }
?>


<div class="container-fluid" style=" background-color: #cfced0 ">


            
            <section class="content-header">
                <div class="container-fluid">
                    <h1 class="text-center mb-3 mt-3">Editar Producto</h1>
                </div>
            </section>

            <section class="content"> 
                <div class="container-fluid">


                    <form method="post" enctype="multipart/form-data">

                        <input type="hidden" name="txtFotoAnterior" value="<?php echo $datosPro['prod_imagen'];?>">

                        <div class="row">

                            <div class="col-6">
                                <div class="card card-primary">

                                    <div class="card-body">

                                        <!-- los id´s jamas se modifican -->
                                        <label for="">Codigo :</label>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                        </svg>
                                        </span>
                                        <input type="text"  name="txtCodigo" value="<?php echo $datosPro['id_prod']; ?>" readonly class="form-control" aria-describedby="basic-addon1">
                                        </div>

                                        <label for="">Descripcion:</label>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                        </svg>                  
                                        </span>
                                        <input type="text"  name="txtDesc" value="<?php echo $datosPro['prod_desc']; ?>" class="form-control" aria-describedby="basic-addon1">
                                        </div>
                                        
                                        <label for="">Precio Costo:</label>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                                        </svg>
                                        </span>
                                        <input type="number"  name="txtPrecio" value="<?php echo $datosPro['prod_precio_c']; ?>" class="form-control" aria-describedby="basic-addon1">
                                        </div>

                                        <label for="">Precio Venta: </label>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                        <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                        <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                                        </svg>
                                        </span>
                                        <input type="number"  name="txtPrecioV" value="<?php echo $datosPro['prod_precio_v']; ?>" class="form-control" aria-describedby="basic-addon1">
                                        </div>

                                        <label for=""> Stock: </label>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
                                        </svg>
                                        </span>
                                        <input type="number"  name="txtStock" value="<?php echo $datosPro['prod_stock']; ?>" class="form-control" aria-describedby="basic-addon1">
                                        </div>

                                        <label for="">  Fecha Elaboracion: </label>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                        <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg>
                                        </span>
                                        <input type="date"  name="txtFechaElab" value="<?php echo $datosPro['prod_fecha_elab']; ?>" class="form-control" aria-describedby="basic-addon1">
                                        </div>

                                        <label for="">Nivel de Azucar:</label>
                                        <div class="input-group mb-3"  >

                                        <span class="input-group-text" >
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-bar-graph-fill" viewBox="0 0 16 16">
                                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-2 11.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                                        </svg>


                                        </span> 
                                        
                                        <select name="cboNivelAzucar" class="form-select" require>
                                            <option value="A" <?php if($datosPro['prod_nivel_azucar']=="A") echo "selected"; ?> >Alto</option>
                                            <option value="M" <?php if($datosPro['prod_nivel_azucar']=="M") echo "selected"; ?> >Medio</option>
                                            <option value="B" <?php if($datosPro['prod_nivel_azucar']=="B") echo "selected"; ?> >Bajo</option>
                                            <option value="N" <?php if($datosPro['prod_nivel_azucar']=="N") echo "selected"; ?> >Ninguno</option>
                                        </select>
                                        
                                         </div>    
                                      
                                    </div>
                                
                                </div> 

                            </div>

                            <div class="col-6">
                                <div class="card card-primary">

                                    <div class=" card-body">

                                        <label for="" class="">Iva: </label>
                                        <div class="input-group mb-3">
                                        
                                        <span class="input-group-text" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-percent m-1" viewBox="0 0 16 16">
                                        <path d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                        </svg>
                                        </span>

                                        <input class="m-2" type="checkbox" name="chkPagaIva"  <?php if($datosPro['prod_aplica_iva']==1) echo "checked"; ?> class="form-check-input">
                                        <br>
                                        <label class="form-check-label  mt-1"><strong>Paga IVA</strong></label>
                                        </div>
                                        
                                        <label for="">Especificaciones:</label>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-body-text" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 0 .5Zm0 2A.5.5 0 0 1 .5 2h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm9 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-9 2A.5.5 0 0 1 .5 4h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm5 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm-12 2A.5.5 0 0 1 .5 6h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm8 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-8 2A.5.5 0 0 1 .5 8h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm-7 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
                                        </svg>
                                        
                                        </span>
                                        <textarea name="txtEspecifi" class="form-control" id=""   cols="5" rows="3"><?php echo $datosPro['prod_especificacion']; ?></textarea>
                                        </div>

                                        <div class="m-2"></div>
                                        
                                        <!---In Imagen---->

                                        <input type="hidden" name="txtCedulaPersonaFoto"
                                            value="">
                                        <input type="hidden" name="txtFotoAnterior"
                                            value="">
                                        <div class="input-group">
                                            <p>

                                                <img src="../img/<?php echo $datosPro['prod_imagen'];?>" id="imguserId"
                                                    class="img-circle"
                                                    height="150"
                                                    width="150"/>
                                                    
                                                <hr>
                                                <input class="input-group" type="file" name="imguser" id="fotoId"
                                                    onchange="previewFoto()"
                                                    accept="image/*">
                                                    <hr>
                                                <label for="ejemplo_archivo_1">Foto (Tam. máximo archivo
                                                    1 MB)</label>
                                                
                                            </p>

                                        </div>

                                        <!---Fin Imagen---->
                                        <div class="m-3"></div>
                                        <?php
                                        
                                            $marcas=getAllMarcas();
                                            $catego=getAllCategoria();
                                        ?>
                                        <!--cboMarcas Inicio--->
                                        <label for="">Marca:</label>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
                                        <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
                                        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                                        </svg>
                                        </span>
                                        <select class="form-select" name="cboMarcas" id="" required>
                                            <option value=" <?php echo $datosPro['mar_id'];  ?> "> <?php echo getMarcaById($datosPro['mar_id']); ?> </option>
                                            <?php
                                                if($marcas != null){
                                                        
                                                    foreach ($marcas as $indice => $rowM) { 
                                            ?>
                                                <option value="<?php  echo $rowM['mar_id'];  ?>"> <?php  echo $rowM['mar_nombre'];  ?>  </option>
                                            <?php 
                                                    }
                                            
                                                }
                                            ?>
                                        </select>
                                        <!--cboMarcas Fin--->
                                        </div>
                                        <!--cboCategorias Inicio--->
                                        
                                        <label for="">Categoria: </label>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                                        <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                                        </svg>
                                        </span>
                                        <select class="form-select" name="cboCategoria" id="" required>
                                            
                                            <option value="<?php echo $datosPro['cat_id'];  ?>" > <?php echo getCategoriaById($datosPro['cat_id']); ?> </option>
                                            <?php
                                                if($marcas != null){
                                                        
                                                    foreach ($catego as $indice => $rowC) {
                                            ?>
                                                <option value="<?php  echo $rowC['cat_id'];  ?>"> <?php  echo $rowC['cat_desc'];  ?> </option>
                                            <?php 
                                                    }
                                            
                                                }
                                            ?>
                                        </select>

                                        <!--cboCategorias Fin--->          
                                        </div>
                                        <!--BOTON INICIO--->          
                                        
                                        <button type="submit" class="btn btn-primary btn-sm mt-3" name="btnUpdate">Guardar Cambios</button>       
                                        
                                        <!--BOTON FINAL--->          
                                        
                                            <!--JS IMAGEN--->   
                                            <script>
                                            
                                                function previewFoto() {
                                                    var input = document.getElementById("fotoId");
                                                    var fReader = new FileReader();
                                                    fReader.readAsDataURL(input.files[0]);
                                                    fReader.onloadend = function (event) {
                                                        var img = document.getElementById("imguserId");
                                                        img.src = event.target.result;

                                                    }
                                                }
                                                
                                            </script>
                                            <!--JS IMAGEN--->

                                    </div>

                                </div>
                            
                            </div>

                        </div>
                        
                    </form>

                </div>
            </section>
</div>



<?php
    include_once "footer.php";
?>