






var check_array = [];

var cont=1;
var cont2=1;
var tamPeluquero1;
var tamPeluquero2;
var clickAlex = false;
var clickTorero = false;
$(document).ready(function()
{
	$(".fields").click(function()
	{	


		cont++;
   	
		var tipo = 1;
		$("#tipo").val(tipo);

		obj2 = document.getElementById($(this).val())
		tamPeluquero1 = obj2.getAttribute('name');
		tamPeluquero2 = $("#tamPeluquero2").val();
		

		if(cont%2==0)
		{
			clickAlex=true;
			for(i=0;i<tamPeluquero1;i++)
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
			for(i=0;i<tamPeluquero1;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;

			}
		}

		if(clickAlex)
		{

			for(i=23;i<tamPeluquero2;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=true;
			}
		}
		else
		{
			for(i=23;i<tamPeluquero2;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;
			}
		}

		

		dataval = $(this).data('val');
	
		// Mostrar el cuadro Ranuras seleccionadas si alguien selecciona una ranura
		if($("#outer_basket").css("display") == 'none') 
		{ 
			$("#outer_basket").css("display", "block");
		}

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

	$(".fields2").click(function()
	{
		tipo = 2;
		$("#tipo").val(tipo);

		obj2 = document.getElementById($(this).val())
		tamPeluquero2 = obj2.getAttribute('name');
		tamPeluquero1 = $("#tamPeluquero1").val();
		

		cont2++;

		if(cont2%2==0)
		{
			clickTorero = true;
			for(i=23;i<tamPeluquero2;i++)
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
			for(i=23;i<tamPeluquero2;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;

			}
		}

		if(clickTorero)
		{

			for(i=0;i<tamPeluquero1;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=true;
			}
		}
		else
		{
			for(i=0;i<tamPeluquero1;i++)
			{
				obj = document.getElementById(i);
				obj.disabled=false;
			}
		}
	
		dataval = $(this).data('val');
	
		// Mostrar el cuadro Ranuras seleccionadas si alguien selecciona una ranura
		if($("#outer_basket").css("display") == 'none') 
		{ 
			$("#outer_basket").css("display", "block");
		}

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