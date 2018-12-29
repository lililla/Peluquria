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
                    <h1 class="page-header">Nuevo Horario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="border-color:#393e46;">
                        <div class="panel-heading" style="background-color:#393e46; color:#FFF; border-color:#393e46;">
                            Basic Form Elements
                        </div>
                        <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" role="form" action="<?php echo base_url()?>GestionAdmin/Horario" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <select class="form-control" name="tipo">
                                                <option value="1">Horario1(2 Peluquero)</option>
                                                <option value="2">Horario2(3 Peluquero)</option>
                                            </select>
                                        </div>
                                
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        
                                        <input type="submit" class="btn btn-primary" name="fileSubmit" value="Aceptar"></input>
                                        
                                    </form>
                                    <a type="reset" class="btn btn-primary" href="<?php echo site_url() ?>GestionAdmin/Horario">Cancelar</a>
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


