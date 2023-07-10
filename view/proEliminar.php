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

if( isset($_POST['btnEliminar']) ){
   $id_prod=$_GET['txtCodigo'];
   deleteProducto($id_prod);
}

?>

<h3>Eliminar</h3>

<form action="" method="post">

<label for="">Codigo :</label>
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
      <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
      </svg>
      </span>
      <input type="text"  name="txtCodigo" value="<?php echo $datosPro['id_prod']; ?>" readonly class="form-control" aria-describedby="basic-addon1">
      </div>

   <label for="">Producto Eliminar:..... </label><?php echo $datosPro['prod_desc'] ?>
   
   <hr>

   <img src="../img/<?php echo $datosPro['prod_imagen'];?>" id="imguserId" class="img-circle" height="150" width="150"/>
   <br>
   
   <button type="submit" class=" btn btn-danger btn-sm mt-3" name="btnEliminar">Eliminar</button>       
                                        
</form>   

<?php
    include_once "footer.php";
?>