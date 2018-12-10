<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


include('php/connect.php'); 
include('classes/class_calendar.php');

if(isset($_GET['month'])) $month = $_GET['month']; else $month = date("m");
if(isset($_GET['year'])) $year = $_GET['year']; else $year = date("Y");
if(isset($_GET['day'])) $day = $_GET['day']; else $day = 0;

// Unix Timestamp of the date a user has clicked on
$selected_date = mktime(0, 0, 0, $month, 01, $year);
setlocale(LC_TIME, 'es_ES.UTF-8'); 



$cadena = "".$year.$month.$day."";




//****Turnos de los peluqueros**** 
//Turno 1 de mañana
//Turno 2 Tarde
//Turno 0 mañana y tarde
$fecha = date('l', strtotime($cadena));

$alex = 1;//Admi
$torero = 2;//Admi

if($fecha=="Friday")
{
	$alex = 0;
	$torero = 0;
}

//**** Array de cierres****

$cierre1 = "2017-02-6";
$cierre2 = "2017-02-20";
$cierre3 = "2017-02-25";
$cierre4 = "2017-03-20";//Admi
$cierres[0] = $cierre1;
$cierres[1] = $cierre2;
$cierres[2] = $cierre3;
$cierres[3] = $cierre4;

//**** Meses actuales para solo poder coger citas en los dos proximos meses****
$mesActual = date("m");
$anoActual = date("Y");
$diaActual = date("d");

$noMes = true;
if($month - $mesActual >=1 && $year >= $anoActual )
	$noMes = false;

$calendar = new booking_diary($link, $noMes,$alex,$torero, $cierres);






// Unix Timestamp of the previous month which is used to give the back arrow the correct month and year 
$back = strtotime("-1 month", $selected_date); 

// Unix Timestamp of the next month which is used to give the forward arrow the correct month and year 
$forward = strtotime("+1 month", $selected_date);



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=0.73, width= 320px" />

<title>Calendario</title>
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/animate.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/styleHeader.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/css/style.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/cita/layout.css">
<!--link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/cita/bootstrap.min.css"-->
<link href="<?php echo base_url() ?>/assets/css/home/simple-line-icons.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>/assets/css/home/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
<link rel="stylesheet" type="text/css" href="http://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css" />
<link href="<?php echo base_url() ?>/assets/css/miperfil/footer-distributed-with-address-and-phones.css" rel="stylesheet" type="text/css"/>



<link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/home/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/js/home/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/js/home/bootstrap.min.js" type="text/javascript"></script>
<script src="vendor/jquery.min.js" type="text/javascript"></script>
<script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css" />

<!-- PAGE LEVEL PLUGINS -->
<script src="vendor/jquery.easing.js" type="text/javascript"></script>
<script src="vendor/jquery.back-to-top.js" type="text/javascript"></script>
<script src="vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
<script src="vendor/jquery.wow.min.js" type="text/javascript"></script>
<script src="vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script src="vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
<script src="vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U&amp;callback=initMap" async defer></script>

<!-- PAGE LEVEL SCRIPTS -->

<script src="js/layout.min.js" type="text/javascript"></script>
<script src="js/components/wow.min.js" type="text/javascript"></script>
<script src="js/components/swiper.min.js" type="text/javascript"></script>
<script src="js/components/maginific-popup.min.js" type="text/javascript"></script>
<script src="js/components/masonry.min.js" type="text/javascript"></script>
<script src="js/components/gmap.min.js" type="text/javascript"></script>




<script type="text/javascript">

var check_array = [];

var cont=1;
var cont2=1;
var tamAlex;
var tamTorero;
var clickAlex = false;
var clickTorero = false;
$(document).ready(function()
{
	$(".fields").click(function()
	{

		/*w2popup.open({
	        title: 'Popup Title',
	        body: '<div class="w2ui-centered">This is text inside the popup</div>'
	    });*/

		cont++;
   	
		var tipo = 1;
		$("#tipo").val(tipo);

		obj2 = document.getElementById($(this).val())
		tamAlex = obj2.getAttribute('name');
		tamTorero = $("#tamTorero").val();
		

		if(cont%2==0)
		{
			clickAlex=true;
			for(i=0;i<tamAlex;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=true;
				obj2 = document.getElementById($(this).val())
				id = obj2.getAttribute('id');
				if(i == id)
					obj.disabled=false;

			}
		}
		else
		{
			clickAlex=false;
			for(i=0;i<tamAlex;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;

			}
		}

		if(clickAlex)
		{

			for(i=23;i<tamTorero;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=true;
			}
		}
		else
		{
			for(i=23;i<tamTorero;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;
			}
		}

		

		
		dataval = $(this).data('val');
	
		// Mostrar el cuadro Ranuras seleccionadas si alguien selecciona una ranura
		
		if($("#modal2").css("display") == 'none') 
		{ 
			$("#modal2").css("display", "block");
		}

		
		$("#closePopup").click(function()
		{
			$("#modal2").css("display", "none");
			var x = document.getElementById(id);
			x.checked = false;
			check_array.splice($.inArray(dataval, check_array) ,1);//Aqui elimina la hora seleccionada

			for(i=23;i<tamTorero;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;
				obj.checked = false;
			}
				for(i=0;i<tamAlex;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;
				obj.checked = false;

			}
			

		})
		
		if(jQuery.inArray(dataval, check_array) == -1) 
		{
			check_array.push(dataval);
		} else 
		{
			check_array.splice($.inArray(dataval, check_array) ,1);
			// Elimina el valor seleccionado de la matriz
				
		}
		
		slots=''; hidden=''; basket = 0;
		
		cost_per_slot = $("#cost_per_slot").val();
		//cost_per_slot = parseFloat(cost_per_slot).toFixed(2)

		for (i=0; i< check_array.length; i++) 
		{
			slots += check_array[i] + '\r\n';
			hidden += check_array[i].substring(0, 8) + '|';

			basket = (basket + parseFloat(cost_per_slot));
		}
				
		// Rellene la sección de ranuras seleccionadas
		$("#selected_slots").html(slots);
		
		// Actualizar el elemento de formulario slots_booked oculto con ranuras reservadas
		$("#slots_booked").val(hidden);
		// Actualizar cesta caja total
		basket = basket.toFixed(2);
		$("#total").html(basket);

		// Ocultar la sección de la cesta si un usuario desmarca todas las ranuras
		if(check_array.length == 0)
		$("#outer_basket").css("display", "none");
		
	});

	$(".fields2").click(function()
	{
		tipo = 2;
		$("#tipo").val(tipo);

		obj2 = document.getElementById($(this).val())
		tamTorero = obj2.getAttribute('name');
		tamAlex = $("#tamAlex").val();
		

		cont2++;

		if(cont2%2==0)
		{
			clickTorero = true;
			for(i=23;i<tamTorero;i++)
			{

				obj = document.getElementById(i);
				obj.disabled=true;
				obj2 = document.getElementById($(this).val())
				id = obj2.getAttribute('id');
				if(i == id)
					obj.disabled=false;
			}
		}
		else
		{
			
			clickTorero = false;
			for(i=23;i<tamTorero;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;

			}
		}

		if(clickTorero)
		{

			for(i=0;i<tamAlex;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=true;
			}
		}
		else
		{
			for(i=0;i<tamAlex;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;
			}
		}
	
		dataval = $(this).data('val');
	
		// Mostrar el cuadro Ranuras seleccionadas si alguien selecciona una ranura
		if($("#modal2").css("display") == 'none') 
		{ 
			$("#modal2").css("display", "block");
		}

		$("#closePopup").click(function()
		{
			$("#modal").css("display", "none");
			var x = document.getElementById(id);
			x.checked = false;
			check_array.splice($.inArray(dataval, check_array) ,1);//Aqui elimina la hora seleccionada

			for(i=23;i<tamTorero;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;
				obj.checked = false;
			}
				for(i=0;i<tamAlex;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;
				obj.checked = false;

			}
			

		})

		if(jQuery.inArray(dataval, check_array) == -1) 
		{
			check_array.push(dataval);
		} else 
		{
			// Elimina el valor seleccionado de la matriz
			check_array.splice($.inArray(dataval, check_array) ,1);	
		}
		
		slots=''; hidden=''; basket = 0;
		
		cost_per_slot = $("#cost_per_slot").val();
		//cost_per_slot = parseFloat(cost_per_slot).toFixed(2)

		for (i=0; i< check_array.length; i++) 
		{
			slots += check_array[i] + '\r\n';
			hidden += check_array[i].substring(0, 8) + '|';

			basket = (basket + parseFloat(cost_per_slot));
		}
				
		// Rellene la sección de ranuras seleccionadas
		$("#selected_slots").html(slots);
		
		// Actualizar el elemento de formulario slots_booked oculto con ranuras reservadas
		$("#slots_booked").val(hidden);
		// Actualizar cesta caja total
		basket = basket.toFixed(2);
		$("#total").html(basket);

		// Ocultar la sección de la cesta si un usuario desmarca todas las ranuras
		if(check_array.length == 0)
		$("#outer_basket").css("display", "none");
		
	});

	
	
	
	$(".classname").click(function()
	{
	
		msg = '';
	
		if($("#name").val() == '')
		msg += 'Please enter a Name\r\n';

		if($("#email").val() == '')
		msg += 'Please enter an Email address\r\n';

		if($("#phone").val() == '')
		msg += 'Please enter a Phone number\r\n';	

		if(msg != '') 
		{
			alert(msg);
			return false;
		}

	});

	// Firefox caches the checkbox state.  This resets all checkboxes on each page load 
	$('input:checkbox').removeAttr('checked');
	
});




</script>

</head>
<body style="background-color:black;">


<?php 


    /*if($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
    	$calendar->after_post($month, $day, $year);  
	}*/   

// Call calendar function


$calendar->make_calendar($selected_date, $back, $forward, $day, $month, $year);   


?>


</body>
</html>
