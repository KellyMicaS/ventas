<?php
require 'header.php';
?>

            <!--Contenido principal-->
            <div class="content-wrapper">
                <!--Main Content-->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h1 class="boxtittle">Categoría <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar nuevo</button></h1 >
                                        <div class="box-tools pull-right">

                                    </div>
                                </div>
                                <!--Fin de cabecera BOX-->
                                
                                <!--Centro del box-->
                                <div class="panel-body table-responsive" id="listadoregistro">
                                <table class="table table-striped table-bordered table-responsive table-condensed table-hover" id="listado">
                                    <thead>
                                        <th>Id Categoría</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>
                                        <th>Id Categoría</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tfoot>
                                </table>
                            </div> <!--Fin contenedor table-->
                            <!--Inicio contenedor formulario-->
                            <div class="panel-body" style="height: 400px;" id="formularioregistros">
                                <form action="" name="formulario" id="formulario" method="POST">
                                    <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                                        <label for="nombre">Ingrese el nombre</label>
                                        <input type="hidden" name="idcategoria" id="idcategoria">
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label for="descripcion">Ingrese la descripción</label>
                                        <input type="text" class="form-control" name="descipcion" id="descripcion" required placeholder="Descripcion">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button class="btn btn primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                                        <button class="btn btn-danger" type="button" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

    <?php
    require 'footer.php';
    ?>

    <script src="js/categoria.js" type="text/javascript"></script>
