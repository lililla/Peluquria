<?php

	
class booking_diary extends CI_Model
{
	


// Mysqli connection
function __construct($link) {
    $this->link = $link;	
}

// Settings you can change:


// Time Related Variables
public $booking_start_time          = "09:30";			// The time of the first slot in 24 hour H:M format  
public $booking_end_time            = "19:00"; 			// The time of the last slot in 24 hour H:M format  
public $booking_frequency           = 30;   			// The slot frequency per hour, expressed in minutes.  	

// Day Related Variables

public $day_format					= 2;				// Day format of the table header.  Possible values (1, 2, 3)   
															// 1 = Show First digit, eg: "M"
															// 2 = Show First 3 letters, eg: "Mon"
															// 3 = Full Day, eg: "Monday"
public $day_closed					= array("domingo"); 	// If you don't want any 'closed' days, remove the day so it becomes: =	
//public $day_closed					= array("Sunday"); 	// If you don't want any 'closed' days, remove the day so it becomes: = array();
public $day_closed_text				= "Cerrado"; 		// If you don't want any any 'closed' remove the text so it becomes: = "";

// Cost Related Variables
public $cost_per_slot				= 8.50;			// The cost per slot
public $cost_currency_tag			= "&euro;";		// The currency tag in HTML such as &euro; &pound; &yen;


//  DO NOT EDIT BELOW THIS LINE

public $day_order	 				= array("lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo");
//public $day_order	 				= array("Lunes", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
public $day, $month, $year, $selected_date, $back, $back_month, $back_year, $forward, $forward_month, $forward_year, $bookings, $count, $days, $is_slot_booked_today;


/*========================================================================================================================================================*/


function make_calendar($selected_date, $back, $forward, $day, $month, $year) {

    // $day, $month and $year are the $_GET variables in the URL
    $this->day = $day;    
    $this->month = $month;
    $this->year = $year;
    
	// $back and $forward are Unix Timestamps of the previous / next month, used to give the back arrow the correct month and year 
    $this->selected_date = $selected_date;       
    $this->back = $back;
    $this->back_month = date("m", $back);
    $this->back_year = date("Y", $back); // Minus one month back arrow
    
    $this->forward = $forward;
    $this->forward_month = date("m", $forward);
    $this->forward_year = date("Y", $forward); // Add one month forward arrow    
    
    // Hacer la reserva
    $this->make_booking_array($year, $month);
    
}


function make_booking_array($year, $month, $j = 0) { 

	$stmt = $this->link->prepare("SELECT usuario, fecha, hora FROM cita WHERE fecha LIKE  CONCAT(?, '-', ?, '%')");
	//$stmt = $this->link->prepare("SELECT name, date, start FROM bookings WHERE date LIKE  CONCAT(?, '-', ?, '%')"); 
	$this->is_slot_booked_today = 0; // Defaults to 0

	$stmt->bind_param('ss', $year, $month);	
	$stmt->bind_result($name, $date, $start);	
	$stmt->execute();
	$stmt->store_result();
	
	while($stmt->fetch()) {    

		$this->bookings_per_day[$date][] = $start;

		/*$this->bookings[] = array(
            "name" => $name, 
            "date" => $date, 
            "start" => $start        
 		);*/
 		$this->bookings[] = array(
            "usuario" => $name, 
            "fecha" => $date, 
            "hora" => $start        
 		); 
	
		// Utilizado por la función 'booking_form' posteriormente para comprobar si hay algún espacio reservado en el día seleccionado		
		if($date == $this->year . '-' . $this->month . '-' . $this->day) {
			$this->is_slot_booked_today = 1;
		} 

	}

	//Calcular cuántas ranuras hay por día
	$this->slots_per_day = 0;//ranuras por dias	
	for($i = strtotime($this->booking_start_time); $i<= strtotime($this->booking_end_time); $i = $i + $this->booking_frequency * 60) {
		$this->slots_per_day ++;
	}	

	$stmt->close();		
    $this->make_days_array($year, $month);    
            
} // Close function

 
function make_days_array($year, $month) { 

    // Calcular el número de días en el mes seleccionado                 
    $num_days_month = cal_days_in_month(CAL_GREGORIAN, $month, $year); 
    
    // Haga que la matriz $this->days contenga el número del día y el número del día en el mes seleccionado	   
	
	for ($i = 1; $i <= $num_days_month; $i++) {	
	
		//Calcule el nombre del día (lunes, martes ...) de las variables $ month y $ year
        $d = mktime(0, 0, 0, $month, $i, $year); 

		$this->days[] = array("daynumber" => $i, "dayname" => strftime("%A", $d));
        //$this->days[] = array("daynumber" => $i, "dayname" => date("l", $d)); 		
    }   

	/*	
	Sample output of the $this->days array:
	
	[0] => Array
        (
            [daynumber] => 1
            [dayname] => Monday
        )

    [1] => Array
        (
            [daynumber] => 2
            [dayname] => Tuesday
        )
	*/
	
	$this->make_blank_start($year, $month);
	$this->make_blank_end($year, $month);	

} // Close function


function make_blank_start($year, $month) {

	/*
	Los meses calendarios comienzan en días diferentes
	Por lo tanto, a menudo hay días "no disponibles" en blanco al principio del mes que se muestran como un bloque gris
	El código siguiente crea los días en blanco al principio del mes
	*/	
	
	// Obtenga el primer registro de la matriz días que será el primer día en el mes (por ejemplo, miércoles)
	$first_day = $this->days[0]['dayname'];	$s = 0;
		
		//Bucle a través de array $ day_order (lunes, martes ...)
		foreach($this->day_order as $i => $r) {
		
			// Compare the $first_day to the Day Order
			if($first_day == $r && $s == 0) {
				
				$s = 1;  // Set flag to 1 stop further processing
				
			} elseif($s == 0) {

				$blank = array(
					"daynumber" => 'blank',
					"dayname" => 'blank'
				);
			
				// Prepend elements to the beginning of the $day array
				array_unshift($this->days, $blank);
			}
			
	} // Close foreach	

} // Close function
	

function make_blank_end($year, $month) {

	/*
		Los meses calendarios comienzan en días diferentes
		Por lo tanto, a menudo hay días "no disponibles" en blanco al final del mes que se muestran como un bloque gris
		El código siguiente crea los días en blanco al final del mes
	*/
	
	// Add blank elements to end of array if required.
    $pad_end = 7 - (count($this->days) % 7);

    if ($pad_end < 7) {
	
		$blank = array(
			"daynumber" => 'blank',
			"dayname" => 'blank'
		);
	
        for ($i = 1; $i <= $pad_end; $i++) {							
			array_push($this->days, $blank);
		}
		
    } // Close if
		
	$this->calendar_top(); 

} // Close function
   
    
function calendar_top() {

	// Esta función crea la parte superior de la tabla que contiene la fecha y las flechas hacia delante y hacia atrás
	
	echo "
    <div id='lhs'><div id='outer_calendar'>
    
	<table border='0' cellpadding='0' cellspacing='0' id='calendar'>
        <tr id='week'>
        <td align='left'><a img src='<?php echo base_url() ?>/css/images/der.png', href='?month=" . date("m", $this->back) . "&amp;year=" . date("Y", $this->back) . "'>&laquo;</a></td>
        <td colspan='5' id='center_date'>" . strftime("%B, %Y",$this->selected_date) . "</td>    
        <td align='right'><a href='?month=" . date("m", $this->forward) . "&amp;year=" . date("Y", $this->forward) . "'>&raquo;</a></td>
    </tr>
    <tr>";
		
	/*
	Make the table header with the appropriate day of the week using the $day_format variable as user defined above
	Definition:
	
		1: Show First digit, eg: "M"
		2: Show First 3 letters, eg: "Mon"
		3: Full Day, eg: "Monday"		
		
	*/
	
	foreach($this->day_order as $r) {
	
		switch($this->day_format) {
		
			case(1): 	
				echo "<th>" . substr($r, 0, 1) . "</th>";					
			break;
			
			case(2):
				echo "<th>" . substr($r, 0, 3) . "</th>";			
			break;
			
			case(3): 	
				echo "<th>" . $r . "</th>";
			break;
			
		} // Close switch
	
	} // Close foreach

			
	echo "</tr>";   

	$this->make_cells();
    
} // Close function


function make_cells($table = '') //Funcion para los dias de Cierre
{

	echo "<tr>";

	foreach($this->days as $i => $r) { //Bucle a través del arreglo de fechas

		$j = $i + 1; $tag = 0;	 		

		// Si el día actual se encuentra en la matriz day_closed, las reservas no se permiten en este día
		if(in_array($r['dayname'], $this->day_closed)) {			
			echo "\r\n<td width='21' valign='top' class='closed'>" . $this->day_closed_text . "</td>";		
			$tag = 1;
		}
		

		//Los días pasados ​​están en gris
		if (mktime(0, 0, 0, $this->month, sprintf("%02s", $r['daynumber']) + 1, $this->year) < strtotime("now") && $tag != 1) {		
			
			echo "\r\n<td width='21' valign='top' class='past'>";			
				// Output day number 
				if($r['daynumber'] != 'blank') echo $r['daynumber']; 

			echo "</td>";		
			$tag = 1;
		}
		
		// Si el elemento se establece como 'blanco', inserte el día en blanco

		if($r['dayname'] == 'blank' && $tag != 1) {		
			echo "\r\n<td width='21' valign='top' class='unavailable'></td>";	
			$tag = 1;
		}
				
				
		// Mensajes antes de seleccionar				
		$current_day = $this->year . '-' . $this->month . '-' . sprintf("%02s", $r['daynumber']);

		if(isset($this->bookings_per_day[$current_day]) && $tag == 0) {
		
			$current_day_slots_booked = count($this->bookings_per_day[$current_day]);

				if($current_day_slots_booked < $this->slots_per_day) {
				
					echo "\r\n<td width='21' valign='top'>
					<a href='calendar.php?month=" .  $this->month . "&amp;year=" .  $this->year . "&amp;day=" . sprintf("%02s", $r['daynumber']) . "' class='part_booked' title='Hay citas en este día'>" . 
					$r['daynumber'] . "</a></td>"; 
					$tag = 1;
				
				} else {
				
					echo "\r\n<td width='21' valign='top'>
					<a href='calendar.php?month=" .  $this->month . "&amp;year=" .  $this->year . "&amp;day=" . sprintf("%02s", $r['daynumber']) . "' class='fully_booked' title='Este día está completamente reservado'>" . 
					$r['daynumber'] . "</a></td>"; 
					$tag = 1;			
				
				} // Close else	
		
		} // Close if

		
		if($tag == 0) {
		
			echo "\r\n<td width='21' valign='top'>
			<a href='calendar.php?month=" .  $this->month . "&amp;year=" .  $this->year . "&amp;day=" . sprintf("%02s", $r['daynumber']) . "' class='green' title='Seleccionar día'>" . 
			$r['daynumber'] . "</a></td>";			
		
		}
		
		// The modulus function below ($j % 7 == 0) adds a <tr> tag to every seventh cell + 1;
			if($j % 7 == 0 && $i >1) {
			echo "\r\n</tr>\r\n<tr>"; // Use modulus to give us a <tr> after every seven <td> cells
		}		
		
	}		
		
	echo "</tr></table></div><!-- Close outer_calendar DIV -->";
	
	if(isset($_GET['year']))
	$this->basket();
		
	echo "</div><!-- Close LHS DIV -->";

	// Compruebe las franjas horarias reservadas para la fecha seleccionada y sólo muestre el formulario de reserva si hay franjas horarias disponibles	
	$current_day = $this->year . '-' . $this->month . '-' . $this->day;	
	$slots_selected_day = 0;
	
	if(isset($this->bookings_per_day[$current_day]))
	$slots_selected_day = count($this->bookings_per_day[$current_day]);
	
	if($this->day != 0 && $slots_selected_day < $this->slots_per_day) { 
		$this->booking_form();
	}
	
	
} // Close function


function booking_form() {

	echo "
	<div id='outer_booking'><h2>Citas disponible</h2>

	<p>
	Citas disponibles para <span> " . $this->day . "-" . $this->month . "-" . $this->year . "</span>
	</p>
	
	<table width='400' border='0' cellpadding='2' cellspacing='0' id='booking'>
		<tr>
			<th width='150' align='left'>Empieza</th>
			<th width='150' align='left'>Termina</th>
			<th width='150' align='left'>Precio</th>
			<th width='20' align='left'>Elegir</th>			
		</tr>
		<tr>
			<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		</tr>";
				

		// Crear $ slots array de los tiempos de reserva

		for($i = strtotime($this->booking_start_time); $i<= strtotime($this->booking_end_time); $i = $i + $this->booking_frequency * 60) {
			$slots[] = date("H:i", $i);  
		}			
				

		// Crear $ slots array de los tiempos de reserva
		
		if($this->is_slot_booked_today == 1) { // $this->is_slot_booked_today created in function 'make_booking_array'
		
			foreach($this->bookings as $i => $b) { 
				
				if($b['fecha'] == $this->year . '-' . $this->month . '-' . $this->day) {
				//if($b['date'] == $this->year . '-' . $this->month . '-' . $this->day) {

					// Elimine las ranuras reservadas de la matriz $ slots
					$slots = array_diff($slots, array($b['hora']));
					//$slots = array_diff($slots, array($b['start']));
					
				} // Close if
				
			} // Close foreach
		
		} // Close if
		
				
		
		// Bucle a través de la matriz $ slots y crear la tabla de reserva
		
		foreach($slots as $i => $start) {			

			// Calculate finish time
			$finish_time = strtotime($start) + $this->booking_frequency * 60;
			//$elimina_segundos=substr($start, 0, -3);
		
			echo "
			<tr>\r\n
				<td>" . $start . "</td>\r\n
				<td>" . date("H:i", $finish_time) . "</td>\r\n
				<td>" . number_format($this->cost_per_slot, 2) . $this->cost_currency_tag. "</td>\r\n
				<td width='110'><input data-val=" . $start . " - " . date("H:i", $finish_time) . "' class='fields' type='checkbox'></td>
			</tr>";
		
		} // Close foreach			
	
		echo "</table></div><!-- Close outer_booking DIV -->";
		

} // Close function


function basket($selected_day = '') {

	if(!isset($_GET['day']))
	$day = '01';
	else
	$day = $_GET['day'];	

	// Validate GET date values
	if(checkdate($_GET['month'], $day, $_GET['year']) !== false) {
		$selected_day = $_GET['year'] . '-' . $_GET['month'] . '-' . $day;	
	} else { 
		echo 'Invalid date!';
		exit();
	}

	/*Dentro del form
					<label>Name</label>
					<input name='name' id='name' type='text' class='text_box'>

					<label>Email</label>
					<input name='email' id='email' type='text' class='text_box'>	

					<label>Phone</label>
					<input name='phone' id='phone' type='text' class='text_box'>*/
	
	echo "<div id='outer_basket'>
	
	<h2>Confirmación de Cita</h2>
		
		<div id='selected_slots'></div>		
	
			<div id='basket_details'>
			
				<form method='post' action='http://localhost/Peluqueria/index.php/Gestion/confirmacion'>		

						<div id='outer_price'>
							<div id='currency'>" . $this->cost_currency_tag . "</div>
							<div id='total'></div>
						</div>									
					
					<input type='hidden' name='slots_booked' id='slots_booked'>
					<input type='hidden' name='cost_per_slot' id='cost_per_slot' value='" . $this->cost_per_slot . "'>
					<input type='hidden' name='booking_date' value='" . $_GET['year'] . '-' . $_GET['month'] . '-' . $day . "'>
					
					<input type='submit' class='classname' value='Confirmar Cita'>

				</form>
			
			</div><!-- Close basket_details DIV -->
		
	</div><!-- Close outer_basket DIV -->";

} // Close function

                 
} // Close Class

?>