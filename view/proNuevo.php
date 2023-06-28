
<?php
    include_once "head.php";
?>
<h3>Nuevo</h3>

<div class="container-fluid">
    
    <div class="row">

        <div class="col-5">
            <form action="post">
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


            </form>
        </div>

    </div>

</div>

<?php
    include_once "footer.php";
?>