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



<style type="text/css">

body, html {
  
  font-size: ~'calc(1rem + 1vw)';
}

    .label__checkbox {
  display: none;
}

.label__check {
  display: inline-block;
  border-radius: 50%;
  border: 5px solid rgba(47,187,36,1);
  background: white;
  
  
  width: 2.5em;
  height: 2.5em;
  cursor: pointer;
  
  justify-content: center;
  transition: border .3s ease;

  
  
  &:hover {
    border: 6px solid rgba(0,178,0,1);
  }
}

.label__checkbox:checked + .label__text .label__check {
  animation: check .5s cubic-bezier(0.895, 0.030, 0.685, 0.220) forwards;
  
  .icon {
    opacity: 1;
    transform: scale(0);
    color: white;
    -webkit-text-stroke: 0;
    animation: icon .3s cubic-bezier(0,178,0,1) .10s 1 forwards;
  }
}



@keyframes icon {
  from {
    opacity: 0;
    transform: scale(0.3);
  }
  to {
    opacity: 1;
    transform: scale(1)
  }
}

@keyframes check {
  0% {
    width: 2.5em;
    height: 2.5em;
    background: #3AC12F;
    
  }
  10% {
    width: 2.5em;
    height: 2.5em;
    
    background: #3AC12F;
    
  }
  12% {
    width: 2.5em;
    height: 2.5em;
    
    background: #3AC12F;
    
  }
  50% {
    width: 2.5em;
    height: 2.5em;
    background: #3AC12F;
    
    
  }
  100% {
    width: 2.5em;
    height: 2.5em;
    background: #2FBB24;
    
    
  }

  
}
</style>

<style type="text/css">
    td img
    {
        width: 35px;
        height: 35px;
        border-radius: 5px;
        
        transition: 0.3s;
        
    }
</style>

<script>
    $(document).ready(function() {
        
        foo();
        function foo() 
        {

            if( typeof foo.counter == 'undefined' ) {
                foo.counter = 0;
            }
            
            
        }
        show_product();
        if(foo.counter == 0)
            {
                var idioma= {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                $('#dataTables-example').DataTable({
                    responsive: true,
                    "language": idioma
                });
                foo.counter++;

            }

        
    
        function show_product(){

            $.ajax({
                type  : 'ajax',
                url : "<?php echo base_url('index.php/GestionAdmin/show_Cliente');?>",
                async : false,
                cache: true,
                dataType : 'json',
                success : function(data){

                    var html = '';
                    var i;
                    for(i=0;i<data.length;i++)
                    {
                        
                            html += '<tr>'+
                                '<td style="border-color:#393e46;" align="center">'+ data[i].usuario +'</td>'+
                                '<td style="border-color:#393e46;" align="center">'+ data[i].email +'</td>'+
                                '<td style="border-color:#393e46;" align="center">'+ data[i].citas +'</td>'+
                                '<td style="border-color:#393e46;" align="center">'+ data[i].activacion +'</td>'+
                                '<td style="border-color:#393e46;" align="center"><button type="button" id="'+ data[i].id +'" class="removebutton"><i style="color:red;" class="fa fa-times fa-2x"></i></button></td>'+
                                '</tr>';
                        
                        
                        
                    }

                    $('#show_data').html(html);
                }

            });
        }

    
        $(document).on('click', 'button.removebutton', function () {
            var id = this.id;
            if(confirm("¿Estás seguro de eliminar el cliente?"))
            {
                $(this).closest('tr').remove();
     
                    event.preventDefault();
                    
                   //document.write(id);
                $.ajax({
                    url : "<?php echo base_url('index.php/GestionAdmin/EliminarCliente');?>",
                    type: 'POST',
                    dataType: "json",
                    data: {'id':id},
                    success: function(respuesta) 
                    {
                        if(respuesta.status == "success")
                            show_product();
                        else
                            $('#error-msg').html('<div class="alert alert-danger">' + respuesta.message + '</div>').fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-dismissible").alert('close');
            document.getElementById("prueba").contentWindow.location.reload(true);
            show_product();
                            
                            
                });
                    },
                    error: function(respuesta)
                    {
                        $('#error-msg').html('<div class="alert alert-danger">' + "Error del Sistema, intentelo mas tarde" + '</div>');
                        show_product();
                    }
                });

                
                    window.location.reload();
                   $('#dataTables-example').DataTable();
            }
            
            });    
    });
    </script>


<body>







    <div id="wrapper">

        <!-- Navigation -->
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cliente</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
           

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="border-color:#393e46;">
                        <div class="panel-heading" style="background-color:#393e46; color:#FFF; border-color:#393e46;" >
                            Cliente
                            
                            <!--<a style='position: absolute; left: 85%;' href="#"><i class="fa fa-undo fa-2x "></i></a>-->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="background-color:#eeeeee; border-color:#393e46;">
                            <div div="error-msg"></div> 
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="border-color:#393e46;">
                                <thead >
                                    <tr>
                                        <th style="background-color:#393e46;color:#FFF; border-color:#393e46;" align="center">Usuario</th>
                                        <th style="background-color:#393e46; color:#FFF; border-color:#393e46;" align="center">Email</th>
                                        <th style="background-color:#393e46; color:#FFF; border-color:#393e46;" align="center">Citas</th>
                                        <th style="background-color:#393e46; color:#FFF; border-color:#393e46;" align="center">Activacion</th>
                                        <th style="background-color:#393e46; color:#FFF; border-color:#393e46;" align="center">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        </div>
        <!-- /#page-wrapper -->
  

</body>

</html>
