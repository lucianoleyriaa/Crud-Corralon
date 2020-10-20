
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/productos/store" method="POST">
                            <div class="form-group">
                                <label for="codigo">Codigo:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="peso">Peso:</label>
                                <input type="text" class="form-control" id="peso" name="peso">
                            </div>
                            <div class="form-group">
                                <label for="precioCosto">Precio costo:</label>
                                <input type="text" class="form-control" id="precioCosto" name="precioCosto">
                            </div>
                            <div class="form-group">
                                <label for="precioVenta">Precio venta:</label>
                                <input type="text" class="form-control" id="precioPublico" name="precioVenta">
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php foreach($categorias as $categoria):?>
                                        <option value="<?php echo $categoria->id?>"><?php echo $categoria->nombre;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <select name="marca" id="marca" class="form-control">
                                    <?php foreach($marcas as $marca):?>
                                        <option value="<?php echo $marca->id?>"><?php echo $marca->nombre;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <a href="<?php echo base_url() ?>index.php/mantenimiento/productos" class="btn btn-danger btn-flat">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
