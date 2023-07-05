<?php

include_once "../config/conectarDB.php";

function getAllCategoria()
{
  try {
    $sql = "SELECT * FROM tab_categoria
   ORDER BY cat_desc";

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

function getCategoriaById($idbusca)
{
  try {
    $sql = "SELECT cat_desc FROM tab_categoria
          WHERE cat_id=:pcat_id";
    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);
    $stmt->bindparam(":pcat_id", $idbusca);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $registro = $stmt->fetch(PDO::FETCH_ASSOC);
      return $registro['cat_desc'];
    } else {
      return null;
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
    return null;
  }
}



?>