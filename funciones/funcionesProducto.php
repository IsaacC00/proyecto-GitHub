<?php

//RETORNA UNA LISTA (VARIOS REGISTROS)

include_once "../config/conectarDB.php";
function getAllProductos()
{
  try {
    $sql = "SELECT * FROM tab_productos p, tab_marcas m, tab_categoria c
    WHERE p.cat_id=c.cat_id
    AND p.mar_id=m.mar_id
   ORDER BY prod_desc";

    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $lista;
    } else
      return null;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return null;
  }
}

// RETORNA UN REGISTRO
function getProductoById($idbusca)
{
  try {
    $sql = "SELECT * FROM tproductos
          WHERE codigo=:pidbusca";
    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);
    $stmt->bindparam(":pidbusca", $idbusca);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $registro = $stmt->fetch(PDO::FETCH_ASSOC);
      return $registro;
    } else {
      return null;
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
    return null;
  }
}

//EJECUTA COMANDOS SQL
function insertProducto( $id_prod,
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
$cat_id)
{ //INSERT, UPDATE, DELETE
  try {
            $sql = "INSERT INTO tab_productos
            (id_prod,
            prod_desc,
            prod_precio_c,
            prod_precio_v,
            prod_stock,
            prod_fecha_elab,
            prod_nivel_azucar,
            prod_aplica_iva,
            prod_especificacion,
            prod_imagen,
            mar_id,
            cat_id)
        VALUES ( :pid_prod,
                :pprod_desc,
                :pprod_precio_c,
                :pprod_precio_v,
                :pprod_stock,
                :pprod_fecha_elab,
                :pprod_nivel_azucar,
                :pprod_aplica_iva,
                :pprod_especificacion,
                :pprod_imagen,
                :pmar_id,
                :pcat_id)";
    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);
    
    $stmt->bindparam(":pid_prod", $id_prod);
    $stmt->bindparam(":pprod_desc",$prod_desc);
    $stmt->bindparam(":pprod_precio_c",$prod_precio_c);
    $stmt->bindparam(":pprod_precio_v",$prod_precio_v);
    $stmt->bindparam(":pprod_stock",$prod_stock);
    $stmt->bindparam(":pprod_fecha_elab",$prod_fecha_elab);
    $stmt->bindparam(":pprod_nivel_azucar",$prod_nivel_azucar);
    $stmt->bindparam(":pprod_aplica_iva",$prod_aplica_iva);
    $stmt->bindparam(":pprod_especificacion",$prod_especificacion);
    $stmt->bindparam(":pprod_imagen",$prod_imagen);
    $stmt->bindparam(":pmar_id",$mar_id);
    $stmt->bindparam(":pcat_id",$cat_id);
    $stmt->execute();
    return true; //OPCIONAL
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false; //OPCIONAL
  }
}
?>