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
                    <h1 class="page-header">Nuevo Cierre</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulario de cierre
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" role="form" action="<?php echo base_url()?>GestionAdmin/Cierre" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Día de cierre 1</label>
                                            <input id="date" type="date" name="dia1">
                                            <p class="help-block" name="dia1">8/02/2019</p>
                                            <label>Día de cierre 2</label>
                                            <input id="date" type="date" name="dia2">
                                            <p class="help-block">8/02/2019</p>
                                            <label>Día de cierre 3</label>
                                            <input id="date" type="date" name="dia3">
                                            <p class="help-block">8/02/2019</p>
                                            <label>Día de cierre 4</label>
                                            <input id="date" type="date" name="dia4">
                                            <p class="help-block">8/02/2019</p>
                                            <label>Día de cierre 5</label>
                                            <input id="date" type="date" name="dia5">
                                            <p class="help-block">8/02/2019</p>
                                        </div>
                                
                                <!-- /.col-lg-6 (nested) -->
                                <!--<div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Día de la semana</label>
                                            <select class="form-control" name="semana">
                                                <option>Lunes</option>
                                                <option>Martes</option>
                                                <option>Miercoles</option>
                                                <option>Jueves</option>
                                                <option>Viernes</option>
                                                <option>Sabado</option>
                                                <option>Domingo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mes Cerrado</label>
                                            <select class="form-control" name="mes">
                                                <option>Enero</option>
                                                <option>Febrero</option>
                                                <option>Marzo</option>
                                                <option>Abril</option>
                                                <option>Mayo</option>
                                                <option>Junio</option>
                                                <option>Julio</option>
                                                <option>Agosto</option>
                                                <option>Septiembre</option>
                                                <option>Octubre</option>
                                                <option>Noviembre</option>
                                                <option>Diciembre</option>
                                            </select>
                                        </div>-->
                                        <input type="submit" class="btn btn-primary" name="fileSubmit" value="Aceptar"></input>
                                    </form>
                                        <a type="reset" class="btn btn-primary" href="<?php echo site_url() ?>GestionAdmin/Cierre">Cancelar</a>
                                    </form>
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
