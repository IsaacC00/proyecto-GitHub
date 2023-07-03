
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

                        <label for=""><p>Nivel de Azucar:</p> </label>
                        <div class="input-group mb-3">
                        <input type="checkbox" name="chkPagaIva" class="form-check-input">
                        <label class="form-check-label"><strong>Paga IVA</strong></label>
                        </div>

                        <label for="">Especificaciones:</label>
                        <br>
                        <br>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">#</span>
                        <textarea name="txtEspecifi" class="form-control" id="" cols="10" rows="5"></textarea>
                        </div>
                        </div>
                </div> 

            </div>

            <div class="col-6">
            <h3>lado derecho</h3>
            </div>

              
        </div>

        
    </form>

</div>




<?php
    include_once "footer.php";
?>