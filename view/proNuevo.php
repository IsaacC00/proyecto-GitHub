<?php
    
    include_once "head.php";
    
?>

<?php
    include_once "../funciones/funcionesMarca.php";
    include_once "../funciones/funcionesCategoria.php";
    include_once "../funciones/funcionesProducto.php";
    

    if(isset($_POST['btnGrabar'])){
        
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
             


            /****************************************** */

            $imgFile = $_FILES['imguser']['name'];
            $tmp_dir = $_FILES['imguser']['tmp_name'];
            $imgSize = $_FILES['imguser']['size'];
            $upload_dir = '../img';
        
            if (empty($imgFile)) {
                $prod_imagen= "sinImagen.jpg";
                move_uploaded_file($tmp_dir, $upload_dir . $prod_imagen);
            } else {
                $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
                $valid_extensions = array('jpeg', 'jpg', 'gif');
                /**$nombrearchivo = substr($apellidos, 0, 4) . '_' . substr($nombres, 0, 4) . $cedula;*/
                $numero = rand(1000, 9999);
                $prod_imagen = $numero . "." . $imgExt;
        
                if (in_array($imgExt, $valid_extensions)) {
                    // Check file size '1MB'
                    if ($imgSize < 1000000) {
                        move_uploaded_file($tmp_dir, $upload_dir . $prod_imagen);
                    } else {
                        $error[] = "Atención, su archivo es muy grande, debe ser menor a 100 KB";
                    }
                } else {
                    $error[] = "Lo siento, JPG, JPEG, PNG & GIF formatos de archivo permitidos";
                }
        
            }

            /****************************************** */
             $mar_id=$_POST['cboMarcas'];
             $cat_id=$_POST['cboCategoria'];

             if(insertProducto(
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
             $cat_id )==true){
            
            ?>
                 
                 
                 
                 <script>
                    
                    Swal.fire({
                    icon: 'success',
                    title: 'Datos Guardados con exito',
                    showConfirmButton: false,
                    timer: 1500
                    })
                 </script>
                    
                 <?php echo 'sip';}else{  echo 'nop';?>
                
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


<h3>Nuevo</h3>

<div class="container-fluid">


    <form method="post" enctype="multipart/form-data">

        <div class="row">

            <div class="col-6">
                   <div class="card card-primary">

                    <div class="card-body">

                        <label for="">Codigo :</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">#</span>
                        <input type="text"  name="txtCodigo" class="form-control" aria-describedby="basic-addon1">
                        </div>

                        <label for="">Descripcion:</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">#</span>
                        <input type="text"  name="txtDesc" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        
                        <label for="">  <p>Precio Costo :</p> </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">$</span>
                        <input type="number"  name="txtPrecio" class="form-control" aria-describedby="basic-addon1">
                        </div>

                        <label for="">  <p>Precio Venta:</p> </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">$</span>
                        <input type="number"  name="txtPrecioV" class="form-control" aria-describedby="basic-addon1">
                        </div>

                        <label for="">  <p>Stock:</p> </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">#</span>
                        <input type="number"  name="txtStock" class="form-control" aria-describedby="basic-addon1">
                        </div>

                        <label for="">  <p>Fecha Elaboracion:</p> </label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">#</span>
                        <input type="date"  name="txtFechaElab" class="form-control" aria-describedby="basic-addon1">
                        </div>

                        <label for=""><p>Nivel de Azucar:</p> </label>
                        <div class="input-group mb-3">

                        <select name="cboNivelAzucar" class="form-select" require>
                            <option value="A">Alto</option>
                            <option value="M">Medio</option>
                            <option value="B">Bajo</option>
                            <option value="N" selected>Ninguno</option>
                        </select>

                        </div>

                        

                        </div>
                </div> 

            </div>

            <div class="col-6">
                <div class="card card-primary">

                    <div class="card card-body">

                        <h3>lado derecho</h3>

                        <label for=""><p>Iva:</p> </label>
                        <div class="input-group mb-3">
                        <input type="checkbox" name="chkPagaIva" class="form-check-input">
                        <label class="form-check-label"><strong>Paga IVA</strong></label>
                        </div>
                        
                        <label for="">Especificaciones:</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">#</span>
                        <textarea name="txtEspecifi" class="form-control" id="" cols="8" rows="1"></textarea>
                        </div>
                        <!---In Imagen---->

                        <input type="hidden" name="txtCedulaPersonaFoto"
                               value="">
                        <input type="hidden" name="txtFotoAnterior"
                               value="">
                        <div class="input-group">
                            <p>

                                <img src="fotos/alumnos/user.png" id="imguserId"
                                     class="img-circle"
                                     height="150"
                                     width="150"/>


                                <input class="input-group" type="file" name="imguser" id="fotoId"
                                       onchange="previewFoto()"
                                       accept="image/*">
                                <label for="ejemplo_archivo_1">Foto (Tam. máximo archivo
                                    1 MB)</label>

                            </p>

                        </div>

                        <!---Fin Imagen---->
                        
                        <?php
                        
                            $marcas=getAllMarcas();
                            $catego=getAllCategoria();
                        ?>
                        <!--cboMarcas Inicio--->
                        <label for="">Marca:</label>
                        <select class="form-select" name="cboMarcas" id="" require>
                            <option value="">Seleccione Marca</option>
                            <?php
                                if($marcas != null){
                                        
                                    foreach ($marcas as $indice => $rowM) {
                            ?>
                                <option value="<?php  echo $rowM['mar_id'];  ?>"> <?php  echo $rowM['mar_nombre'];  ?> </option>
                            <?php 
                                    }
                            
                                }
                            ?>
                        </select>
                        <!--cboMarcas Fin--->
                        <!--cboCategorias Inicio--->
                        <br>
                        <label for="">Categoria:</label>
                        <select class="form-select" name="cboCategoria" id="" require>
                            
                            <option value="">Seleccione Categoria</option>
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
                        
                        <!--BOTON INICIO--->          
                        
                         <button type="submit" class="btn btn-primary btn-sm mt-3" name="btnGrabar">Guardar</button>       
                        
                         <!--BOTON FINAL--->          
                        
                         
                    </div>

                 </div>
            
            </div>

        </div>
        
    </form>

</div>




<?php
    include_once "footer.php";
?>