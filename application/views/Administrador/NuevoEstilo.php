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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){

                {
                    $('.Karim').click(function(){

                        var el = document.getElementById(this.id);
                        el.remove();
                        //$(num).remove();
                    });
                }

        });
        
    </script>

    <style type="text/css">

    .img-container img
    {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        
    }
    .img-container img:hover {opacity: 0.7;}
    
        
    </style>

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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo site_url() ?>GestionAdmin/Estilo">
                                        <div class="form-group">
                                            <label>título</label>
                                            <input class="form-control">
                                            <p class="help-block">Ejemplo Peinado Noviembre 2018</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Imagen</label>
                                            <input type="file">
                                        </div>
                                        </div>
                                    
                                
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <div class="img-container">
                                                <?php
                                                for($i=0;$i < 10;$i++)
                                                {
                                                    echo "<img class='Karim' id='".$i."' value='".$i."' src='".base_url()."/assets/img/Galeria/gallery-".$i.".jpg' >&nbsp;";
                                                }?>
                                                <!--<img class="Karim" src='<?php echo base_url() ?>/assets/img/Galeria/gallery-1.jpg'>
                                                <img src='<?php echo base_url() ?>/assets/img/Galeria/gallery-2.jpg'>
                                                <img src='<?php echo base_url() ?>/assets/img/Galeria/gallery-1.jpg'>
                                                <img src='<?php echo base_url() ?>/assets/img/Galeria/gallery-2.jpg'>
                                                <img src='<?php echo base_url() ?>/assets/img/Galeria/gallery-1.jpg'>
                                                <img src='<?php echo base_url() ?>/assets/img/Galeria/gallery-2.jpg'>
                                                <img src='<?php echo base_url() ?>/assets/img/Galeria/gallery-1.jpg'>
                                                <img src='<?php echo base_url() ?>/assets/img/Galeria/gallery-2.jpg'>
                                                <img src='<?php echo base_url() ?>/assets/img/Galeria/gallery-1.jpg'>
                                                <img src='<?php echo base_url() ?>/assets/img/Galeria/gallery-2.jpg'> -->

                                                
    
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-default">Aceptar</button>
                                        <button type="reset" class="btn btn-default" href="<?php echo site_url() ?>GestionAdmin/Noticia">Cancelar</button>
                                    
                                </div>
                                
                            </form>
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
