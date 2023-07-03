
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
             $prod_imagen= "sinImagen.jpg";
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
                 echo "datos del productos guardados exitosamente";
             }else{
                echo "******* ERROR *******";
                 
             }
    }
?>

<?php
    
    include_once "head.php";
    
?>
<h3>Nuevo</h3>

<div class="container-fluid">


    <form method="post">

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
                        <br>
                        
                        <!--BOTON INICIO--->          
                        
                         <button type="submit" class="btn btn-primary btn-sm" name="btnGrabar">Guardar</button>       
                        
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