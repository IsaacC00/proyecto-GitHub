<?php
    include_once "view/head.php"; //incluya lo que esta en el head.php 

?>

<body class="">


<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="img/proyecto.png" alt="Supermercado Logo" class="img-fluid">
        </div>
        <div class="col-md-8">
            <h1 class="mb-4">Proyecto CRUD de un Supermercado</h1>
            <p> Sistema de gestión de productos de un supermercado. Aquí puedes realizar las operaciones de crear, leer, actualizar y eliminar productos.</p>
            <div class="mt-4">
                <a href="crear_producto.php" class="btn btn-primary me-2">Crear Producto</a>
                <a href="lista_productos.php" class="btn btn-success me-2">Lista de Productos</a>
                <a href="reportes.php" class="btn btn-info">Reportes</a>
            </div>
        </div>
    </div>
</div>
  
    </body>

<?php
    include_once "view/footer.php";

?>