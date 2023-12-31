<?php

  include_once "../funciones/funcionesProducto.php";
  $datos=getAllProductos();

?>

<?php
    include_once "head.php";

?>
       
<div class="card m-2 p-1">
    <div class="card-header" >
    <a href="proNuevo.php" type="button" class="btn btn-primary">Nuevo Producto</a>
      
    </div>
    <div class="card-body">
        
          <table id="example" class="table table-bordered table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">DESCRIPCION</th>
                      <th scope="col">P. COSTO</th>
                      <th scope="col">MARCA</th>
                      <th scope="col">CATEGORIA</th>
                      <th scope="col">AZUCAR</th>
                      <th scope="col">IVA</th>
                      <th scope="col">FOTO</th>
                      <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                  
                      <?php 
                      
                        if($datos != null){
                          foreach ($datos as $indice => $row) {
                          
                        
                      ?>  
                    
                    <tr>
                        <th scope="row"><?php echo $row['id_prod']; ?></th>
                        <td> <?php echo $row['prod_desc']; ?> </td>
                        <td> <?php echo $row['prod_precio_c']; ?> </td>
                        <td> <?php echo $row['mar_nombre']; ?> </td>
                        <td> <?php echo $row['cat_desc']; ?> </td>
                        <td> <?php 
                          
                            switch( $row['prod_nivel_azucar'] ){

                              case "M": echo "Medio"; break;
                              case "B": echo "Bajo"; break;
                              case "A": echo "Alto"; break;
                              case "N": echo "No tiene"; break;
                            }
                            
                            
                            ?> </td>
                              <td> <?php 
                                
                                if($row['prod_aplica_iva']==1) 
                                      echo "Si";
                                      else
                                      echo "No";
                              
                              ?> </td>

                              <td> 
                                  <img src="../img/<?php echo $row['prod_imagen']; ?>" width="80px" alt="">
                                  </td>
                              <td>
                                <a href="#" type="button" class="btn btn-primary" >Ver</a>
                                <!--  hacemos click en el boton editar y le mando el codigo del producto que quiero editar --->
                                <a href="proEditar.php?id_prod=<?php echo  $row['id_prod']; ?>" type="button" class="btn btn-warning" >Edit</a>
                                <a href="proEliminar.php?id_prod=<?php echo  $row['id_prod']; ?>" type="button" class="btn btn-danger" >Delete</a>
                              </td>
                            </tr>
                    
                      <?php 

                              }//foreach
                              }//if

                      ?>

                </tbody>

          </table>

    </div>
</div>

<?php
    include_once "footer.php";

?>