
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Admin/estilos.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Admin/estilos1200.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/Admin/Horario/select2.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/Admin/Horario/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/Admin/Horario/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/Admin/Horario/DatePickerX.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<header align="center">
    

<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
  window.addEventListener('DOMContentLoaded', function()
        {
            var $min = document.querySelector('.real [name="realDPX-min"]'),
                $max = document.querySelector('.real [name="realDPX-max"]');

            $min.DatePickerX.init({
                mondayFirst: true,
                minDate    : new Date(2017, 8, 13),
                
            });

        

        });
  
</script>

    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">FKOfficial</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Inicio</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mi cuenta</a></li>
     <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Desconectarse </a></li>
   </ul>
  </div>
  </nav>

  <h1 href=''>
    <u>Cierres</u>
  </h1>
</header>

  <div class="bg-contact3" style="background-image: url('images/bg-01.jpg');">
    <div class="container-contact3">
      <div class="wrap-contact3">
        <form class="contact3-form validate-form">
          <span class="contact3-form-title">
            Agenda
          </span>

          <div class="wrap-contact3-form-radio">
            <div class="contact3-form-radio m-r-42">
              <input class="input-radio3" id="radio1" type="radio" name="choice" value="say-hi" checked="checked">
              <label class="label-radio3" for="radio1">
                1 Día
              </label>


            </div>

            <div class="contact3-form-radio">
              <input class="input-radio3" id="radio2" type="radio" name="choice" value="get-quote">
              <label class="label-radio3" for="radio2">
                Durante la Semana
              </label>
            </div>
          </div>

          <div class="wrap-input3 validate-input" data-validate="Name is required">
            <input class="input3" type="text" name="name" placeholder="Motivo">
            <br></br>
            Calendario
            <div class="tran">
                <label class="real">
                      <input type="text" name="realDPX-min" placeholder="Choice start date">
                  </label>
            </div>
            <span class="focus-input3"></span>
          </div>

          <div class="wrap-input3 input3-select">
            <div>
              <select class="selection-2" name="service">
                <option>Ninguna</option>
                <option>Lunes</option>
                <option>Martes</option>
                <option>Miercoles</option>
                <option>Jueves</option>
                <option>Viernes</option>
                <option>Sabado</option>
                <option>Domingo</option>
              </select>
            </div>
            <span class="focus-input3"></span>
          </div>

          <div class="wrap-input3 input3-select">
            <div>
              <select class="selection-2" name="budget">
                <option>Ninguna</option>
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
            </div>
            <span class="focus-input3"></span>
          </div>

          <div class="container-contact3-form-btn">
            <button class="contact3-form-btn">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container" align='right'>
    <!-- Hay que añadir enlace a formulario de crear producto -->
    <a href="<?php echo site_url() ?>/Gestion/Horario" class="btn btn-danger" role="button">Atrás</a>
</div>


  <div id="dropDownSelect1"></div>

<script type="text/javascript">
  
  $(".selection-2").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
</script>

<script type="text/javascript">
  

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

  <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Admin/Horario/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Admin/Horario/popper.js"></script>
  <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Admin/Horario/select2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Admin/Horario/main.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Admin/Horario/DatePickerX.min.js"></script>

<!--===============================================================================================-->
  


<div class="container">
    <footer class="text-center">
        Friking Design S.L. &copy; 2017
    </footer>
</div>

