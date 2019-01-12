<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nuevo Estilo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="border-color:#393e46;">
                        <div class="panel-heading" style="background-color:#393e46; color:#FFF; border-color:#393e46;">
                            Formulario de estilo
                        </div>
                        <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" role="form" action="<?php echo base_url()?>GestionAdmin/Estilo" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Asunto</label>
                                            <input class="form-control" type="text" name="asunto" maxlength="21" required>
                                            <p class="help-block">Ejemplo Cerrado día festivo</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Imagen</label>
                                            <!--<input type="file" name="files[]" multiple>-->
                                            <input type="file" name="files[]" multiple>
                                        </div>
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Información</label>
                                            <textarea class="form-control" rows="3" type="text" name="informacion" required ></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="fileSubmit" value="Aceptar"></input>
                                        
                                    </form>
                                    <a type="reset" class="btn btn-primary" href="<?php echo site_url() ?>GestionAdmin/Estilo">Cancelar</a>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    

</body>

</html>
