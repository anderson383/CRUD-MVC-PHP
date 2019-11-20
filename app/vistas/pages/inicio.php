<?php require 'app/vistas/Includes/Header.php'; ?>

<h1 class="text-center my-5">Añada una nueva persona</h1>

            <div class="container">
            <form  id="frmFormulario" class="mt-3">
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <label for="txtNombre">Digite el nombre del estudiante</label>
                        <input type="text" name="" id="txtNombre"  class="form-control" value="">
                        <label for="txtNombre">Digite el apellido del estudiante</label>
                        <input type="text" name="" id="txtApellido" class="form-control" value="">
                        <label for="txtNombre">Digite el correo del estudiante</label>
                        <input type="email" name="" id="txtCorreo" class="form-control" value="">
                        
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="">Define que scope tendrá el estudiante</label>
                        <select name="" id="txtIdScope" class="form-control">
                            <option value="0" >Scope</option>
                            <option value="1">Instructor</option>
                            <option value="2">Vocero</option>
                            <option value="3">Aprendiz</option>
                        </select>
                        <label for="txtTelefono">Digite el telefono</label>
                        <input type="number" name="" id="txtTelefono" class="form-control" value="">
                        <label for="" class="d-block">Envia tus datos</label>
                        <input type="hidden" name="" id="accion" value="">
                        <input type="hidden" id="id" value="">
                        <input type="submit" value="Guardar" id="btnEnviar" class="btn btn-outline-danger btn-md btn-block">
                    </div>
                </div>
        </form>
        <div class="row mt-5">
            <div class="col">
                <div class="table-responsive-xl">
                    <table class="table table-dark table-striped table-bordered table-hover ">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Scope</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="table-content">
                        
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <div class="modal fade" id="fm-modal-grid" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal con Grid</h5>
                        <button class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmModificar" >
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <label for="txtNombre">Digite el nombre del estudiante</label>
                                        <input type="text" name="txtNombreMo" id="txtNombreMo"  class="form-control" value="">
                                        <label for="txtNombre">Digite el apellido del estudiante</label>
                                        <input type="text" name="txtApellidoMo" id="txtApellidoMo" class="form-control" value="">
                                        <label for="txtNombre">Digite el correo del estudiante</label>
                                        <input type="email" name="txtCorreoMo" id="txtCorreoMo" class="form-control" value="">
                                    </div>
                                    <div class="col-12">
                                    <label for="">Define que scope tendrá el estudiante</label>
                                        <select name="txtIdScopeMo" id="txtIdScopeMo" class="form-control">
                                            <option  value="0" selected="selected">Seleccione</option>
                                            <option id="opti1"  value="1" >Instructor</option>
                                            <option id="opti2" value="2" >Vocero</option>
                                            <option id="opti3" value="3" >Aprendiz</option>
                                        </select>
                                        <label for="txtTelefono">Digite el telefono</label>
                                        <input type="text" name="txtTelefonoMo" id="txtTelefonoMo" class="form-control" value="">
                                        <label for="" class="d-block">Envia tus datos</label>
                                        <input type="hidden"  name="" id="hidenMo" value="">
                                        <input type="submit" value="Modificar" id="btnModificar" class="btn btn-outline-danger btn-md btn-block">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Eliminar usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p>¿Seguro de eliminar?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idUsuElimi" value="" id="idUsuElimi">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="btnEliminarr" class="btn btn-primary">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    <input type="button" value="">
<?php require 'app/vistas/Includes/Footer.php'; ?>