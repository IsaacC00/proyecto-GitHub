<?php

include_once "../config/conectarDB.php";

function getAllMarcas()
{
  try {
    $sql = "SELECT * FROM tab_marcas
   ORDER BY mar_nombre";

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

function getMarcaById($idbusca)
{
  try {
    $sql = "SELECT mar_nombre FROM tab_marcas
          WHERE mar_id=:pmar_id";
    $conexion = conectaBaseDatos();
    $stmt = $conexion->prepare($sql);
    $stmt->bindparam(":pmar_id", $idbusca);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $registro = $stmt->fetch(PDO::FETCH_ASSOC);
      return $registro['mar_nombre'];
    } else {
      return null;
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
    return null;
  }
}

?>