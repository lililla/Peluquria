<?php

	
class booking_diary 
{
	


// Mysqli connection
function __construct($link, $noMes, $Peluquero1, $Peluquero2, $Peluquero3, $Peluquero4, $cierre, $personal) 
{
    $this->link = $link;
    $this->noMes = $noMes;
    $this->Peluquero1 = $Peluquero1;
    $this->Peluquero2 = $Peluquero2;
    $this->Peluquero3 = $Peluquero3;
    $this->Peluquero4 = $Peluquero4;
    $this->cierre = $cierre;
    
    $i=0;
    foreach ($personal as $row) 
    {
    	$this->personal[$i] = $row->nombre;
    	$i++;

    }
    

}

// Settings you can change:


// Time Related Variables
public $booking_start_time          = "09:00";			// The time of the first slot in 24 hour H:M format  
public $booking_end_time            = "20:00"; 			// The time of the last slot in 24 hour H:M format  
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
public $day, $month, $year, $selected_date, $back, $back_month, $back_year, $forward, $forward_month, $forward_year, $bookings, $count, $days, $is_slot_booked_today,$noMes,$Peluquero1=0,$Peluquero2=0, $cierres;
public static $peluquero=0;




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

	$stmt = $this->link->prepare("SELECT id_login, fecha, hora FROM Cita WHERE fecha LIKE  CONCAT(?, '-', ?, '%')"); 
	$this->is_slot_booked_today = 0; // Defaults to 0

	$stmt->bind_param('ss', $year, $month);	
	$stmt->bind_result($name, $date, $start);	
	$stmt->execute();
	$stmt->store_result();
	
	while($stmt->fetch()) {    

		$this->bookings_per_day[$date][] = $start;
 		$this->bookings[] = array(
            "usuario" => $name, 
            "fecha" => $date, 
            "hora" => $start
                    
 		); 
	
		// Utilizado por la función 'booking_form' posteriormente para comprobar si hay algún espacio reservado en el día seleccionado		
		if($date == $this->year . '-' . $this->month . '-' . $this->day) 
		{
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
   
    
function calendar_top() 
{

	

	// Esta función crea la parte superior de la tabla que contiene la fecha y las flechas hacia delante y hacia atrás
	
	echo "
    <div id='lhs'><div id='outer_calendar'>
    
	<table border='0' cellpadding='0' cellspacing='0' id='calendar'>
        <tr id='week'>
        <td align='left'><a href='?month=" . date("m", $this->back) . "&amp;year=" . date("Y", $this->back) . "'>&laquo;</a></td>
        <td colspan='5' id='center_date'>" . strftime("%B, %Y",$this->selected_date) . "</td>"; 
        if($this->noMes)
        {
        	echo "<td align='right'><a href='?month=" . date("m", $this->forward) . "&amp;year=" . date("Y", $this->forward) . "'>&raquo;</a></td>";
        	
    						
        }

        echo "</tr>";


        /*
   
		
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

	foreach($this->days as $i => $r) 
	{ //Bucle a través del arreglo de fechas

		$j = $i + 1; $tag = 0;	 

		$cadena = "".$this->year."-".$this->month."-".$r['daynumber']."";

    	$fecha = date("Y-m-d",strtotime($cadena));		

		// Si el día actual se encuentra en la matriz day_closed, las reservas no se permiten en este día
		if(in_array($r['dayname'], $this->day_closed)) 
		{			
			echo "\r\n<td width='21' valign='top' class='closed'>" . $this->day_closed_text . "</td>";		
			$tag = 1;

			

		}

		if($fecha == $this->cierre[0])
		{

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
					<a href='?month=" .  $this->month . "&amp;year=" .  $this->year . "&amp;day=" . sprintf("%02s", $r['daynumber']) . "' class='part_booked' title='Hay citas en este día'>" . 
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
			<a href='?month=" .  $this->month . "&amp;year=" .  $this->year . "&amp;day=" . sprintf("%02s", $r['daynumber']) . "' class='green' title='Seleccionar día'>" . 
			$r['daynumber'] . "</a></td>";			
		
		}
		
		// The modulus function below ($j % 7 == 0) adds a <tr> tag to every seventh cell + 1;
			if($j % 7 == 0 && $i >1) {
			echo "\r\n</tr>\r\n<tr>"; // Use modulus to give us a <tr> after every seven <td> cells
		}		
		
	}		
		
	echo "</tr></table></div></div><!-- Close outer_calendar DIV -->";
	
	if(isset($_GET['year']))
	$this->basket();
		
	

	// Compruebe las franjas horarias reservadas para la fecha seleccionada y sólo muestre el formulario de reserva si hay franjas horarias disponibles	
	$current_day = $this->year . '-' . $this->month . '-' . $this->day;	
	$slots_selected_day = 0;
	
	if(isset($this->bookings_per_day[$current_day]))
		$slots_selected_day = count($this->bookings_per_day[$current_day]);
	
	//Aqui tengo que añadirle una nueva condiccion
	if($this->day != 0 && $slots_selected_day < $this->slots_per_day) 
	{ 
		$this->booking_form();
	}
	
	
} // Close function


function booking_form() 
{

	// Crear $ slots array de los tiempos de reserva


		for($i = strtotime($this->booking_start_time); $i<= strtotime($this->booking_end_time); $i = $i + $this->booking_frequency * 60) 
		{
			$slots[] = date("H:i:s", $i); 
			$slots2[] = date("H:i:s", $i);
			

		}			
				

		// Crear $ slots array de los tiempos de reserva
		
		/*if($this->is_slot_booked_today == 1) 
		{
			foreach($this->bookings as $i => $b) 
			{			
				if($b['fecha'] == $this->year . '-' . $this->month . '-' . $this->day) 
				{
					// Elimine las ranuras reservadas de la matriz $ slots
					$slots = array_diff($slots, array($b['hora']));

					//$slots = array_diff($slots, array($b['start']));
					
				} // Close if
				
			} // Close foreach
		
		} // Close if*/

	$stmt1 = $this->link->prepare("SELECT hora FROM Cita WHERE id_personal = '1' AND fecha LIKE  CONCAT(?, '-',?, '-', ?, '%')"); 

	$stmt1->bind_param('sss', $this->year, $this->month, $this->day);	
	$stmt1->bind_result($hPeluquero1);	
	$stmt1->execute();
	$stmt1->store_result();

	$stmt2 = $this->link->prepare("SELECT hora FROM Cita WHERE id_personal = '2' AND fecha LIKE  CONCAT(?, '-',?, '-', ?, '%')"); 

	$stmt2->bind_param('sss', $this->year, $this->month, $this->day);	
	$stmt2->bind_result($hPeluquero2);	
	$stmt2->execute();
	$stmt2->store_result();

	$stmt3 = $this->link->prepare("SELECT hora FROM Cita WHERE id_personal = '3' AND fecha LIKE  CONCAT(?, '-',?, '-', ?, '%')"); 

	$stmt3->bind_param('sss', $this->year, $this->month, $this->day);	
	$stmt3->bind_result($hPeluquero3);	
	$stmt3->execute();
	$stmt3->store_result();

	$stmt4 = $this->link->prepare("SELECT hora FROM Cita WHERE id_personal = '4' AND fecha LIKE  CONCAT(?, '-',?, '-', ?, '%')"); 

	$stmt4->bind_param('sss', $this->year, $this->month, $this->day);	
	$stmt4->bind_result($hPeluquero4);	
	$stmt4->execute();
	$stmt4->store_result();
	
	echo "
	<div id='lhs'><div id='outer_booking'><h2>Citas disponible</h2>

	<p>
	Citas disponibles para <span> " . $this->day . "-" . $this->month . "-" . $this->year . "</span>
	</p>
	
	<table id='booking'>
		<tr>
			<th style='width:20%' align='center'>Horario</th>";
			$numsRowPersonal = count($this->personal);
			$numsRowPersonal--;
			for ($i=0; $i < 4; $i++) 
			{

				if($i <= $numsRowPersonal)
				{
					echo "<th style='width:20%' align='center'>".$this->personal[$i]."</th>";
				}
				else
				{
					echo "<th style='width:20%' align='center'>No disponible</th>";
				}
			};
						
		echo"</tr>
		<tr>
			
		</tr>";		
		
		// Bucle a través de la matriz $ slots y crear la tabla de reserva
		//$idPeluquero1= 0; //estos datos lo proporciona la DB
		//$idPeluquero2=23; //estos datos lo proporciona la DB

		//$tamPeluquero1= 12; //estos datos lo proporciona la DB
		//$tamPeluquero2=34; //estos datos lo proporciona la DB
		//if($this->Peluquero1 == 0)
			//$tamPeluquero1 = $tamPeluquero1+11;
		//if($this->Peluquero2 == 0)
			//$tamPeluquero2 = $tamPeluquero2+12;	

		/*foreach($slots as $i => $hora)
		{
			while($ite=$stmt1->fetch()) 
			{    
 				//$this->bookings[] = array("hora" => $hPeluquero1, "hora2" => $hPeluquero2);

 				if($hPeluquero1 == $hora)
 				{
 					$tamPeluquero1--;				
 				}
 			}
 			$stmt1->data_seek($ite);
 			while($ite=$stmt2->fetch()) 
			{    
 				//$this->bookings[] = array("hora" => $hPeluquero1, "hora2" => $hPeluquero2);

 				if($hPeluquero2 == $hora)
 				{
 					$tamPeluquero2--;
 				}
 			}
 			$stmt2->data_seek($ite);
		}*/

		foreach($slots as $i => $hora) 
		{		
			$LibrePeluquero1=true;
			$LibrePeluquero2=true;
			$LibrePeluquero3=true;
			$LibrePeluquero4=true;

			while($ite=$stmt1->fetch()) 
			{    
 				//$this->bookings[] = array("hora" => $hPeluquero1, "hora2" => $hPeluquero2);

 				if($hPeluquero1 == $hora)
 				{
 					$LibrePeluquero1 = false;										
 				}

            }
            $stmt1->data_seek($ite);
            while($ite=$stmt2->fetch()) 
			{    
 				//$this->bookings[] = array("hora" => $hPeluquero1, "hora2" => $hPeluquero2);

 				if($hPeluquero2 == $hora)
 				{
 					$LibrePeluquero2 = false;
 				}

            }
            $stmt2->data_seek($ite);
            while($ite=$stmt3->fetch()) 
			{    
 				//$this->bookings[] = array("hora" => $hPeluquero1, "hora2" => $hPeluquero2);

 				if($hPeluquero3 == $hora)
 				{
 					$LibrePeluquero3 = false;
 				}

            }
            $stmt3->data_seek($ite);
            while($ite=$stmt4->fetch()) 
			{    
 				//$this->bookings[] = array("hora" => $hPeluquero1, "hora2" => $hPeluquero2);

 				if($hPeluquero4 == $hora)
 				{
 					$LibrePeluquero4 = false;
 				}

            }
            $stmt4->data_seek($ite);

           
			// Calculate finish time
			$finish_time = strtotime($hora) + $this->booking_frequency * 60;
			$elimina_segundos=substr($hora, 0, -3);
			//print($elimina_segundos);
			//<td bgcolor='#2E2E2E'>" . $elimina_segundos . "/". date("H:i", $finish_time) . " </td>\r\n";
		
			echo "
			<tr>\r\n
				<td bgcolor='#F2F2F2'>" . $elimina_segundos . " </td>\r\n";

				switch($this->Peluquero1)
				{
					case 1:
					{
						if($LibrePeluquero1 && $hora < "15:00:00")
						{					
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "'  type='image' src='". base_url() ."/free.png' width=70% height = auto class='fields' ></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto;/></td>\r\n";
						}
					}
					break;
					case 2:
					{
						if($LibrePeluquero1 && $hora >= "15:00:00")
						{					
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto;/></td>\r\n";
						}
					}
					break;
					case 3:
					{
						if($LibrePeluquero1)
						{					
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto;/></td>\r\n";
						}
					}
					break;
					case 0:
					{
						echo
							"<td bgcolor='#F2F2F2'>No disponible</td>";
					}
				}
				
				switch($this->Peluquero2)
				{
					case 1:
					{
						if($LibrePeluquero2 && $hora < "15:00:00")
						{				
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields2' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto/></td>\r\n";
						}
					}
					break;
					case 2:
					{
						if($LibrePeluquero2 && $hora >= "15:00:00")
						{					
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields2' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto/></td>\r\n";
						}
					}
					break;
					case 3:
					{
						if($LibrePeluquero2)
						{					
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields2' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto/></td>\r\n";
						}
					}
					break;
					case 0:
					{
						echo
							"<td bgcolor='#F2F2F2'>No disponible</td>";
					}
				}
				switch($this->Peluquero3)
				{
					case 1:
					{
						if($LibrePeluquero3 && $hora < "15:00:00")
						{				
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields3' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto/></td>\r\n";
						}
					}
					break;
					case 2:
					{
						if($LibrePeluquero3 && $hora >= "15:00:00")
						{					
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields3' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto/></td>\r\n";
						}
					}
					break;
					case 3:
					{
						if($LibrePeluquero3)
						{					
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields3' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto/></td>\r\n";
						}
					}
					break;
					case 0:
					{
						echo
							"<td bgcolor='#F2F2F2'>No disponible</td>";
					}
				}
				switch($this->Peluquero4)
				{
					case 1:
					{
						if($LibrePeluquero4 && $hora < "15:00:00")
						{				
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields4' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto/></td>\r\n";
						}
					}
					break;
					case 2:
					{
						if($LibrePeluquero4 && $hora >= "15:00:00")
						{					
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields4' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto/></td>\r\n";
						}
					}
					break;
					case 3:
					{
						if($LibrePeluquero4)
						{					
							echo "
							<td bgcolor='#F2F2F2'><input  data-val=" . $hora . " - " . date("H:i", $finish_time) . "' class='fields4' type='image' src='". base_url() ."/free.png' width=70% height = auto></td>\r\n";
							echo "
							<input type='hidden'>";
						}
						else
						{
							
							echo "<td bgcolor='#F2F2F2'><img src='". base_url() ."/no.png' width=65% height = auto/></td>\r\n";
						}
					}
					break;
					case 0:
					{
						echo
							"<td bgcolor='#F2F2F2'>No disponible</td>";
					}
				}
			"</tr>";
			
		
		} // Close foreach		
			
	
		echo "</table></div></div><!-- Close outer_booking DIV -->";
		echo "</div><!-- Close LHS DIV -->";
		

} // Close function


function basket($selected_day = '') 
{

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
	
/*
	echo "<div id='outer_basket'>
	
	<h2>Confirmación de Cita</h2>

		<div id='selected_slots'></div>		
	
			<div id='basket_details'>
			
				<form method='post' action='Confirmacion.php' name=formulario>		

						<div id='outer_price'>
							<div id='currency'>" . $this->cost_currency_tag . "</div>
							<div id='total'></div>
						</div>									
					
					<input type='hidden' name='slots_booked' id='slots_booked'>
					<input type='hidden' name='cost_per_slot' id='cost_per_slot' value='" . $this->cost_per_slot . "'>
					<input type='hidden' name='booking_date' value='" . $_GET['year'] . '-' . $_GET['month'] . '-' . $day . "'>
					<input type='hidden' name='tipo' id='tipo'>



					<input type='submit' class='classname' value='Confirmar Cita'>

				</form>
			
			</div><!-- Close basket_details DIV -->
		
	</div><!-- Close outer_basket DIV -->";*/

	?>

	<div id="modal2" class="popupContainer">
                <header class="popupHeader">
                        <span class="header_title">Confirmación de Cita</span>
                        <span class="modal_close" id='closePopup'><i class="fas fa-times"></i></span>
                </header>

                <section class="popupBody">
                        <!-- Social Login -->
                        <div class="social_login">

                                <div class="centeredText">
                                	<?php echo"
                                        <span>Confirmar la cita para el día ".$day."/".$_GET['month']."/".$_GET['year']." con el coste de: " . $this->cost_per_slot . "</span>";?>
                                </div>

                                <form method='post' name = 'Confirmar' action="<?php echo base_url('index.php/Gestion/Confirmacion');?>" name=formulario>

                                	<input type='hidden' name='slots_booked' id='slots_booked'>
									<input type='hidden' name='cost_per_slot' id='cost_per_slot' value='" . $this->cost_per_slot . "'>
									<?php echo"<input type='hidden' name='booking_date' id='booking_date' value='" . $_GET['year'] . '-' . $_GET['month'] . '-' . $day . "'>";?>
									<input type='hidden' name='tipo' id='tipo'>

	                                <div class="action_btns">
	                                        <div class="one_half"><button type='submit' name = 'login' value='ConfirmarCita' id="ConfirmarCita" class="btn">Confirmar</button></div>
	                                        <div class="one_half last"><button name = 'Cancelar' value='cancelar' id='closePopup' class="btn">Cancelar</button></div>
	                                </div>
	                            </form>
                        </div>

                        <!-- Username & Password Login form -->
                        
                </section>
    </div>
   

    <style>
		.loader {
		  border: 16px solid #f3f3f3;
		  border-radius: 50%;
		  border-top: 16px solid #3498db;
		  width: 120px;
		  height: 120px;
		  -webkit-animation: spin 2s linear infinite; /* Safari */
		  animation: spin 2s linear infinite;
		}

		/* Safari */
		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}
</style>

    <?php

	echo "<div id='popup' style='display: none;
    position: fixed; 
    z-index: 1; 
    padding-top: 130px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    '>

  	<div class='confirm'>
  		<h1 >Confirmación de Cita</h1>
  		<h3 align='center'>Confirmar la cita para el día ".$day."/".$_GET['month']."/".$_GET['year']." con el coste de: " . $this->cost_per_slot . "<div id='selected_slots'></div>		
			
				<form method='post' name = 'Confirmar' action='http://localhost/Peluqueria/index.php/Gestion/confirmacion' name=formulario>
																
					<input type='hidden' name='slots_booked' id='slots_booked'>
					<input type='hidden' name='cost_per_slot' id='cost_per_slot' value='" . $this->cost_per_slot . "'>
					<input type='hidden' name='booking_date'  value='" . $_GET['year'] . '-' . $_GET['month'] . '-' . $day . "'>
					<input type='hidden' name='tipo' id='tipo'>



					<button type='submit' class='classname' name = 'Confirmar' value='Confirmar Cita'>Confirmar Cita
					<button type='submit' class='classname' name = 'Cancelar' value='cancelar' id='closePopup'>Cancelar
				</form>
	</div>

	

		

				
		
	</div><!-- Close outer_basket DIV -->";

} // Close function

                 
} // Close Class

?>