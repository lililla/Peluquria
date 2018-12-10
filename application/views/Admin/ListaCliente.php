
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Admin/estilos.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Admin/estilos1200.css">
      <link href="<?php echo base_url() ?>/assets/css/miperfil/layout.min.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
    .search-form .form-group {
        float: right !important;
        transition: all 0.35s, border-radius 0s;
        width: 32px;
        height: 32px;
        background-color: #fff;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        border-radius: 25px;
        border: 1px solid #ccc;
    }

    .search-form .form-group input.form-control {
        padding-right: 20px;
        border: 0 none;
        background: transparent;
        box-shadow: none;
        display: block;
    }

    .search-form .form-group input.form-control::-webkit-input-placeholder {
        display: none;
    }

    .search-form .form-group input.form-control:-moz-placeholder {
        /* Firefox 18- */
        display: none;
    }

    .search-form .form-group input.form-control::-moz-placeholder {
        /* Firefox 19+ */
        display: none;
    }

    .search-form .form-group input.form-control:-ms-input-placeholder {
        display: none;
    }

    .search-form .form-group:hover,
    .search-form .form-group.hover {
        width: 100%;
        border-radius: 4px 25px 25px 4px;
    }

    .search-form .form-group span.form-control-feedback {
        position: absolute;
        top: -1px;
        right: -2px;
        z-index: 2;
        display: block;
        width: 34px;
        height: 34px;
        line-height: 34px;
        text-align: center;
        color: #3596e0;
        left: initial;
        font-size: 14px;
    }
</style>

<header align="center">
    

<script>
function goBack() {
    window.history.back();
}
</script>

    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">FKOfficial</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo site_url() ?>/Gestion/Admin">Inicio</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mi cuenta</a></li>
     <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Desconectarse </a></li>
   </ul>
  </div>
  </nav>

    <h1 href=''>
    <u>Verificar Cliente</u>
  </h1>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-9">
            <form action="" class="search-form" align='right'>
                <div class="form-group has-feedback">
                    <label for="search" class="sr-only">Buscar</label>
                    <input type="text" class="form-control" name="search_box" id="search_box" placeholder="Buscar...">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">

<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Usuario</th>
      <th scope="col">Email</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="ID">1</td>
      <td data-label="Usuario">Alejandro</td>
      <td data-label="Email">Email</td>
      <td data-label="Eliminar"><a href=#><span class="glyphicon glyphicon-remove" style="color:red"></span></a></td>
    </tr>
    <tr>
      <td data-label="ID">2</td>
      <td data-label="Nombre">Torero</td>
      <td data-label="Email">Email</td>
      <td data-label="Eliminar"><a href=#><span class="glyphicon glyphicon-remove" style="color:red"></span></a></td>
    </tr><tr>
      <td data-label="ID">3</td>
      <td data-label="Nombre">David</td>
      <td data-label="Email">Email</td>
      <td data-label="Eliminar"><a href=#><span class="glyphicon glyphicon-remove" style="color:red"></span></a></td>
    </tr>
  </tbody>
</table>
</div>
<br></br>
<div class="container" align='right'>
    <!-- Hay que añadir enlace a formulario de crear producto -->
    <a href="<?php echo site_url() ?>/Gestion/Cliente" class="btn btn-danger" role="button">Atrás</a>
</div>

<div class="container">
    <footer class="text-center">
        Friking Design S.L. &copy; 2017
    </footer>
</div>

