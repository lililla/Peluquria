<?php
	class Gestion extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Gestion_model');
			$this->load->library('form_validation');
			$this->load->helper("url");
			$this->load->model('File');
			$this->load->library('session');
			$this->load->library('paypal_lib');
        	$this->load->model('product');
		}

		function footer()
		{
			$this->load->view('Footer2');
		}


		function inicio()
		{
			// cargo el helper de url, con funciones para trabajo con URL del sitio
			//$this->load->helper('url');
			$data = array();
            $data['user'] = $this->session->userdata('usuario');
            $data['active'] = "home";

            $this->db->get('Noticia');
			$this->db->from('Noticia');
			$this->db->where('status', '0');
			$query = $this->db-> get();
			$data['noticia'] = $query->result();
			$this->db->get('Personal');
			$this->db->from('Personal');
			$this->db->where('estado', 0);
			$query = $this->db-> get();
			$data['personal'] = $query->result();

			$this->db->get('Precio');
			$this->db->from('Precio');
			$this->db->where('estado', 0);
			$query = $this->db-> get();
			$data['precio'] = $query->result();

			$query = $this->db->get('Cita');
			$data['TotalCita'] = $query->num_rows();

			$query = $this->db->get('login');
			$data['TotalCliente'] = $query->num_rows();

			$query = $this->db->get('Producto');
			$data['TotalProducto'] = $query->num_rows();

			$query = $this->db->get('ProductoUsuario');
			$data['ProductoUsuario'] = $query->num_rows();

			$this->load->view('Head',$data);
			$this->load->view('Home',$data);
			$this->load->view('Footer2',$data);
		}

		function Galeria()
		{
            $data = array();
            $data['user'] = $this->session->userdata('usuario');
            $data['active'] = "galeria";

            $this->db->get('Estilo');
			$this->db->from('Estilo');
			$this->db->where('estado', 0);
			$query = $this->db-> get();
			$data['estilo'] = $query->result();

			$query = $this->db->get('ImagenEstilo');
			$data['ImagenEstilo'] = $query->result();

			$this->load->view('Head',$data);
			$this->load->view('Galeria',$data);
			$this->load->view('Footer2',$data);
		}

		

		function Producto()
		{

            $data = array();
            $data['user'] = $this->session->userdata('usuario');
            $data['active'] = "producto";


            $this->db->get('Producto');
            $this->db->from('Producto');
            $consulta = $this->db->get();
            $this->db->get('ProductoUsuario');
            $this->db->from('ProductoUsuario');
            $consulta2 = $this->db->get();
            foreach($consulta->result() as $row ) 
            {
            	$sum = 0;
            	$this->db->get('ProductoUsuario');
            	$this->db->from('ProductoUsuario');
            	$this->db->where('producto_id', $row->id);
				$query = $this->db->get();
				if($query->num_rows() >0)
				{
					
					foreach($query->result() as $row2) 
	            	{
	            		$sum = $sum + $row2->valoracion;
	            	}

	            	if($sum !=0)
	            	{
	            		$valor = intval($sum/$query->num_rows());
	            		$data2 = array(
			                'valoracion' => $valor             
			            );
			            $this->db->where('id', $row->id);
			            $this->db->update('Producto', $data2);
	            	}

				}
            	
            }

            $this->db->get('Producto');
			$this->db->from('Producto');
			$this->db->where('estado', 0);
			$query = $this->db-> get();
			$data['producto'] = $query->result();
			//$this->load->view('Head',$data);
			$this->load->view('Producto',$data);
			//$this->load->view('Footer2',$data);
		}

		function buy(){
			header("Refresh:0");
        // Set variables for paypal form
        $returnURL = base_url().'paypal/success';
        $cancelURL = base_url().'paypal/cancel';
        $notifyURL = base_url().'paypal/ipn';

        $price = $_GET["priceTotal"];

        $data2 = array();
        $data2['user'] = $this->session->userdata('id');

        $array = $_GET['id-product'];
        $array = explode(",", $array);
        for($i=0;$i<count($array);$i++)
        {
        	$data = array(
					        'producto_id' => intval($array[$i]),
					        'usuario_id' => $data2['user'],
					        'valoracion' => 3
					        
					);

					$this->db->insert('ProductoUsuario', $data);
        }

        // Get product data from the database
        
        
        // Get current user ID from the session
        
        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', "ProductoAlexPiñero");
        $this->paypal_lib->add_field('custom', $data2['user']);
        $this->paypal_lib->add_field('item_number',  "000-023");
        $this->paypal_lib->add_field('amount',  $price);
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();

    }
		function Perfil()
		{
            $data = array();
            $data['id'] = $this->session->userdata('id');
            $data['user'] = $this->session->userdata('usuario');
            //$data['email'] = $this->session->userdata('email');
            $q = $this->db->query('SELECT email FROM login WHERE id = ?',$data['id']);
			$p = $q->result_array();
			$data['email'] = $p[0]['email']; 

            if(isset($_GET['cerrar']))
            {
            	$this->session->sess_destroy();
			    redirect('Gestion/inicio');
            }

            if(isset($_GET['cita1'])) 
            {
            	$this->db->get('Cita');

				$this->db->from('Cita');
				$this->db->where('id_login', $data['id']);
				$query = $this->db->get();
				$data['citaUsuario'] = $query->result();
				$cont = 0;
				foreach ($data['citaUsuario'] as $row) 
				{
					if($cont == 0)
					{
						$this->db->delete('Cita', array('id' => $row->id));
					}
					$cont++;
					
				}
            	
            }

            if(isset($_GET['cita2'])) 
            {
            	$this->db->get('Cita');

				$this->db->from('Cita');
				$this->db->where('id_login', $data['id']);
				$query = $this->db->get();
				$data['citaUsuario'] = $query->result();
				$cont = 0;
				foreach ($data['citaUsuario'] as $row) 
				{
					if($cont == 1)
					{
						$this->db->delete('Cita', array('id' => $row->id));
					}
					$cont++;
					
				}
            	
            }

            if(isset($_GET['cita3'])) 
            {
            	$this->db->get('Cita');

				$this->db->from('Cita');
				$this->db->where('id_login', $data['id']);
				$query = $this->db->get();
				$data['citaUsuario'] = $query->result();
				$cont = 0;
				foreach ($data['citaUsuario'] as $row) 
				{
					if($cont == 2)
					{
						$this->db->delete('Cita', array('id' => $row->id));
					}
					$cont++;
					
				}
            	
            }

            $this->db->get('ProductoUsuario');
            $this->db->from('ProductoUsuario');
            $this->db->where('usuario_id', $data['id']);
            $consulta = $this->db->get();
            foreach ($consulta->result() as $row ) {
            	
            	if(isset($_POST[$row->producto_id]))
            	{
            		
	            		$data2 = array(
		                'usuario_id' => $row->usuario_id,
		                'producto_id' => $row->producto_id,
		                'valoracion' => $_POST[$row->producto_id]               
		            );
		            $this->db->where('id', $row->id);
		            $this->db->update('ProductoUsuario', $data2);
	            }
            }

           	
            $this->db->get('ProductoUsuario');
			$this->db->from('ProductoUsuario');
			$this->db->where('usuario_id', $data['id']);
			$this->db->distinct('producto_id');
			$query = $this->db->get();
			$data['productoUsuario'] = $query->result();

			$this->db->get('Producto');
			$this->db->from('Producto');
			$query = $this->db-> get();
			$data['producto'] = $query->result();

			$query = $this->db->get('Personal');
            $data['personal'] = $query->result();

           	$this->db->get('Cita');
			$this->db->from('Cita');
			$this->db->where('id_login', $data['id']);
			$query = $this->db->get();
			$data['cita'] = $query->result();


            $data['active'] = "perfil";
			$this->load->view('Head',$data);
			$this->load->view('Perfil',$data);
			$this->load->view('Footer2',$data);
		}

		function index()
		{
			$this->load->view('inicio');
		}

		function Prueba()
		{
			$this->load->view('Prueba');
		}
		

		function productos()
		{
			$this->load->view('productos');
		}
		function cita()
		{

			$data = array();
            $data['user'] = $this->session->userdata('usuario');
            $data['active'] = "cita";

            $this->db->get('Personal');
			$this->db->select('*');
			$this->db->from('Personal');
			$this->db->where('estado', 0);
			$query = $this->db-> get();
            $data['personal'] = $query->result();
            $query = $this->db->get('Horario');
            $data['horario'] = $query->result();

            $query = $this->db->get('Cierre');
            $data['cierres'] = $query->result();
			$this->load->view('HeadCita',$data);
			$this->load->view('calendar',$data);
		    $this->load->view('Footer',$data);
		}

		function Contacto()
		{
			$data = array();
            $data['user'] = $this->session->userdata('usuario');
            $data['id'] = $this->session->userdata('id');
            $data['active'] = "contacto";

            if(isset($_POST['submit']))
            {
            	$asunto = $this->input->post('asunto');
            	$email = $this->input->post('email');
            	$mensaje = $this->input->post('mensaje');
            	$email = $this->input->post('email');
            	$nombre = $this->input->post('nombre');

            	$datos['asunto'] = $asunto;
            	$datos['comentario'] = $mensaje;
            	$datos['fecha'] = date("Y-m-d");
            	$datos['email'] = $email;
            	$datos['nombre'] = $nombre;

            	$insert = $this->File->insertContacto($datos);

            	$statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);

            }
			$this->load->view('Head',$data);
			$this->load->view('Contacto',$data);
			$this->load->view('Footer2',$data);
		}

		function Red()
		{
			$data = array();
            $data['user'] = $this->session->userdata('usuario');
            $data['active'] = "red";

            $this->db->get('login');
			$this->db->select('id');
			$this->db->from('login');
			$this->db->where('usuario', $data['user']);
			$query = $this->db-> get();
			foreach ($query->result() as $value) {
					$data['id'] = $value->id;
				}




            if(isset($_POST['fileSubmit1']) && !empty($_FILES['files']['name']))
	        {

	            $filesCount = count($_FILES['files']['name']);

	            for($i = 0; $i < $filesCount; $i++){
	                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

	                
	                // File upload configuration
	                $uploadPath = 'uploads';
	                $config['upload_path'] = $uploadPath;
	                $config['max_size'] = '30720';
	                $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4';
	                
	                // Load and initialize upload library
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                
	                // Upload file to server
	                if($this->upload->do_upload('file')){
	                    // Uploaded file data
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['file'] = $fileData['file_name'];
	                    $uploadData[$i]['fecha'] = date("Y-m-d|H-i-s");
	                    $uploadData[$i]['asunto'] = $this->input->post('asunto');
	                    $uploadData[$i]['texto'] = $this->input->post('comentario');
	                    $uploadData[$i]['id_login'] = $this->session->userdata('id');
	                    $uploadData[$i]['tipo'] = 1;
	                }
	            }
	            
	            if(!empty($uploadData)){
	                // Insert files data into the database
	                $insert = $this->File->insertPublicacion($uploadData);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	            }
	            redirect($this->uri->uri_string()); 
	        }

	        if(isset($_POST['fileSubmit2']) && !empty($_FILES['files']['name']))
	        {

	            $filesCount = count($_FILES['files']['name']);

	            for($i = 0; $i < $filesCount; $i++){
	                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

	                
	                // File upload configuration
	                $uploadPath = 'uploads';
	                $config['upload_path'] = $uploadPath;
	                $config['max_size'] = '30720';
	                $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4';
	                
	                // Load and initialize upload library
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                
	                // Upload file to server
	                if($this->upload->do_upload('file')){
	                    // Uploaded file data
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['file'] = $fileData['file_name'];
	                    $uploadData[$i]['fecha'] = date("Y-m-d|H-i-s");
	                    $uploadData[$i]['asunto'] = $this->input->post('asunto');
	                    $uploadData[$i]['texto'] = $this->input->post('comentario');
	                    $uploadData[$i]['id_login'] = $this->session->userdata('id');
	                    $uploadData[$i]['tipo'] = 2;
	                }
	            }
	            
	            if(!empty($uploadData)){
	                // Insert files data into the database
	                $insert = $this->File->insertPublicacion($uploadData);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	            }
	            redirect($this->uri->uri_string()); 
	        }

	        if($this->input->post('fileSubmit3'))
	        {

	            $uploadData['asunto'] = $this->input->post('asunto');
	            $uploadData['texto'] = $this->input->post('comentario');
	            $uploadData['fecha'] = date("Y-m-d|H-i-s");
				$uploadData['id_login'] = $this->session->userdata('id');
	            $uploadData['tipo'] = 3;

	            if(!empty($uploadData)){
	                // Insert files data into the database
	                $insert = $this->File->insertPublicacion3($uploadData);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	            }
	  
	        	redirect($this->uri->uri_string());
	    	}

	    	if($this->input->post('fileSubmit0'))
	        {

	            $uploadData['id_publicaciones'] = $this->input->get('pu');
	            print($uploadData['id_publicaciones']);
	            $uploadData['comentario'] = $this->input->post('comentario');
	            $uploadData['fecha'] = date("Y-m-d|H-i-s");
				$uploadData['id_login'] = $this->session->userdata('id');
	            

	            if(!empty($uploadData)){
	                // Insert files data into the database
	                $insert = $this->File->insertPublicacion0($uploadData);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	            }
	  
	        	redirect($this->uri->uri_string());
	    	}

	    	if($this->input->post('fileSubmit4'))
	        {

	            $uploadData['comentario'] = $this->input->post('comentario');
	            $uploadData['fecha'] = date("Y-m-d|H-i-s");
				$uploadData['id_login'] = $this->session->userdata('id');
	            

	            if(!empty($uploadData)){
	                // Insert files data into the database
	                $insert = $this->File->insertPublicacion4($uploadData);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	            }
	  
	        	redirect($this->uri->uri_string());
	    	}

	        
			$query = $this->db->get('login');
			$data['login'] = $query->result();
			$query = $this->db->get('Comentario');
			$data['comentario'] = $query->result();


			$this->db->get('Publicaciones');
			$this->db->select('*');
			$this->db->from('Publicaciones');
			$this->db->order_by("id", "desc");
			$query = $this->db-> get();
			$data['publicaciones'] = $query->result();

			$this->load->view('Head',$data);
			$this->load->view('RedSocial',$data);
			$this->load->view('Footer2',$data);
		}
		function miperfil()
		{
			$usuario = array();
			$usuario['usuario'] = $this->session->userdata('usuario');
			$data= array();
			$q = $this->db->query('SELECT * FROM cita WHERE usuario = ?',$usuario['usuario']);
			$data['all'] = $q->result_array();
			
				
	   
			$this->load->view('miperfil',$data);
		}


		function listaPeluquero()
		{
			$this->load->view('listaPeluquero');
		}

		function nav()
		{
			        
			$this->load->view('nav');
		   
		}
		function Peluquero()
		{
			$this->load->view('Peluquero');
		}

		function addPeluquero()
		{
			$this->load->view("addPeluquero");
		}

		function Admin()
		{
			$this->load->view('Admin');
		}

		function Cliente()
		{
			$this->load->view('Admin/Cliente');
		}

		function listaCliente()
		{
			$this->load->view('Admin/ListaCliente');
		}

		function verificar()
		{
			$this->load->view("Admin/Verificar");
		}


		function Horario()
		{
			$this->load->view('Admin/Horario');
		}

		function Cierres()
		{
			$this->load->view('Admin/Cierres');
		}

		function ListarCierres()
		{
			$this->load->view('Admin/ListarCierres');
		}

		function ListarHorario()
		{
			$this->load->view('Admin/ListarHorario');
		}

		function horarioPeluquero()
		{
			$this->load->view("Admin/AñadirHorario");
		}


		function passqr()
		{
			$this->load->view('passqr');
		}
		function finishCita()
		{

			if($this->input->get())
			{
				$id = $this->input->get('id');
			
			}
			$q = $this->db->query('SELECT citas FROM login WHERE id = ?',$id);
			$data = $q->result_array();
			$citas = $data[0]['citas'];
			$citas = $citas + 1;

			$data = array(
                  'citas' => $citas,
              );
              $this->db->where('id', $id);
              $this->db->update('login', $data);

			$this->home();
		}
	
		function qr()
		{
			$data = array();
			$data['usuario'] = $this->session->userdata('usuario');
			$q = $this->db->query('SELECT id FROM login WHERE usuario = ?',$data['usuario']);
			$data = $q->result_array();
			$id = $data[0]['id'];
			$id = base64_encode($id);
			

	

			/*$q = $this->db->query('SELECT id FROM login WHERE usuario = ?',$usuario);
					$data = $q->result_array();
					$id = $data[0]['id'];

			print($id);*/
	
			require 'qrcode/qrlib.php';

			$dir = 'temp/';

			if(!file_exists($dir))
				mkdir($dir);



			$filename = 'temp/test.png';
			$tamano = 10;
			$level = 'M';
			$frameSize = 3;
			$contenido = $this->db->set('id_peluquero', 2); $this->db->where('id',2); $this->db->update('cita');'hola';

			$boolean = true;

					
			QRcode::png('http://localhost/Peluqueria/index.php/Gestion/passqr?id=' . $id. '', $filename,$level,$tamano,$frameSize);


			$this->load->view('qr');



		}
		function gallery()
		{
			$data = array();
			$data['usuario'] = $this->session->userdata('usuario');
			$this->load->view('gallery',$data);
		   
		}
		function login()
		{
			$this->load->view('cssLogin');
		}

		function session()
		{
			$this->load->view('session');
		}
		function home()
		{
			$data = array();
			$data['usuario'] = $this->session->userdata('usuario');
			$this->load->view('cssHome',$data);
		}


		function Confirmacion()
		{



			if(isset($_POST['tipo'])) $tipo = $_POST['tipo'];
			if(isset($_POST['slots_booked'])) $slots_booked = $_POST['slots_booked'];
			//if(isset($_POST['name'])) $name = mysqli_real_escape_string($link, $_POST['name']);
			//if(isset($_POST['email'])) $email = mysqli_real_escape_string($link, $_POST['email']);
			//if(isset($_POST['phone'])) $phone = mysqli_real_escape_string($link, $_POST['phone']);
			if(isset($_POST['booking_date'])) $booking_date = $_POST['booking_date'];
			if(isset($_POST['cost_per_slot'])) $cost_per_slot = $_POST['cost_per_slot'];

			$booking_array = array(
				"slots_booked" => $slots_booked,	
				"booking_date" => $booking_date
				//"cost_per_slot" => number_format($cost_per_slot, 2),
				//"name" => $name,
				//"email" => $email,
				//"phone" => $phone
			);

			/////Aqui guardar el usuario y email de la persona iniciada seccion/////
			$usuarioCita = $this->session->userdata('id');

			$fechaActual = date('Y-m-d');
			$q = 'SELECT id FROM Cita WHERE id_login = ? and fecha > ?';
			$query=$this->db->query($q, array($usuarioCita,$fechaActual));
			$citas = $query->result_array();
			$i=0;
			foreach ($citas as $row) 
			{
			 	$i++;
			}

			if($i<3)
			{

				



				$q = $this->db->query('SELECT email FROM login WHERE id = ?',$usuarioCita);
				$data = $q->result_array();
				$email = $data[0]['email'];  
				$datosBody['usuario'] = $this->session->userdata('usuario');
				//$email = "alexpinerotfg@gmail.com";
				//print($email);
				

				$explode = explode('|', $slots_booked);
				$num = count($explode) -2;

				$q = 'SELECT id FROM Cita WHERE hora = ? and fecha = ?';
				$query=$this->db->query($q, array($explode[$num],$booking_date));
				$numCitas = $query->num_rows();

				if($numCitas>0)
				{
					$data['user'] = $this->session->userdata('usuario'); 
					$this->load->view('NoConfirmacionFree',$data);
				}
				else
				{
					if(strlen($slots_booked) > 0) 
					{
						if($tipo ==1)
						{
							$data = array(
						        'fecha' => $booking_date,
						        'hora' => $explode[$num],
						        'id_login' => $usuarioCita,
						        'id_personal' => $tipo
						);

						$this->db->insert('Cita', $data);

						}

						if($tipo ==2)
						{
				
							$data = array(
						        'fecha' => $booking_date,
						        'hora' => $explode[$num],
						        'id_login' => $usuarioCita,
						        'id_personal' => $tipo
						);

						$this->db->insert('Cita', $data);

						}

						if($tipo ==3)
						{
							
							

							$data = array(
						        'fecha' => $booking_date,
						        'hora' => $explode[$num],
						        'id_login' => $usuarioCita,
						        'id_personal' => $tipo
						);

						$this->db->insert('Cita', $data);

						}	

						if($tipo ==4)
						{
							
							

							$data = array(
						        'fecha' => $booking_date,
						        'hora' => $explode[$num],
						        'id_login' => $usuarioCita,
						        'id_personal' => $tipo
						);

						$this->db->insert('Cita', $data);

						}		
					}

					$configGmail = array(
				         'protocol' => 'smtp',
					     'smtp_host' => 'ssl://smtp.gmail.com',
						 'smtp_port' => 465,
						 'smtp_user' => 'alexpinerotfg@gmail.com',
						 'smtp_pass' => '123456a$',
						 'mailtype' => 'html',
						 'charset' => 'utf-8',
						 'newline' => "\r\n",
						 );

					$datosBody['fecha'] = $booking_date;
					$datosBody['hora'] = $explode[$num];


	            	$body = $this->load->view('confirmationCita.html',$datosBody,TRUE);
					$this->email->initialize($configGmail);
					$this->email->from('alexpinerotfg@gmail.com', 'AlexPiñero');
					$this->email->to($email);
					$this->email->subject('Cita confirmada');
					$this->email->message($body);
					$this->email->send();


				 // Close foreach

					


				/*if($this->session->userdata('logueado'))
				{
					
				}
				else
				{
					$citaPendiente = TRUE;
					$data = array();
					$data['citaPendiente'] = $citaPendiente;
					$this->load->view('inicioSesion',$data);
				}*/
				sleep(5);
				
				$data['user'] = $this->session->userdata('usuario'); 
				$this->load->view('Confirmacion',$data);

				}

				

					

			}
			else
			{
				$data['user'] = $this->session->userdata('usuario'); 
				$this->load->view('NoConfirmacion',$data);
			}
			
		}

        function prueba2()
        {
            return TRUE;
        }

        public function olvidePassword()
		{
			$email = $this->input->post("email");
			$data = array();
			$data['email'] = $email;

			$query = $this->db->get_where('login', array('email' => $email));

			if($query->result_array())
            {
            	$configGmail = array(
			         'protocol' => 'smtp',
				     'smtp_host' => 'ssl://smtp.gmail.com',
					 'smtp_port' => 465,
					 'smtp_user' => 'alexpinerotfg@gmail.com',
					 'smtp_pass' => '123456a$',
					 'mailtype' => 'html',
					 'charset' => 'utf-8',
					 'newline' => "\r\n",
					 );


            	$body = $this->load->view('forgot_email.html',$data,TRUE);
				$this->email->initialize($configGmail);
				$this->email->from('alexpinerotfg@gmail.com', 'AlexPiñero');
				$this->email->to($email);
				$this->email->subject('Recuperar Password');
				$this->email->message($body);
				$this->email->send();

            }
			$jsondata = array();
			$jsondata['redirect_url'] = base_url('index.php/Gestion/inicio');
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);		 
		
			exit();
			
		}

		function newPassword()
		{

			$email = $this->input->get('email');
			$data = array();
			$data['email'] = $email;
			
			$this->load->view('newPassword',$data);
		    
		}

		function newPassword2()
		{
			$email = $this->input->post('email');
			$password = $this->input->post("password");
			$password2 = $this->input->post("password2");

			if($password == $password2)
			{

				$hash = md5($password);
				$this->db->set('password',$hash);
				$this->db->where('email',$email);
				$this->db->update('login');
				$jsondata = array();
				$jsondata['redirect_url'] = base_url('/Gestion/inicio');
				$jsondata['status'] = "success";
				echo json_encode($jsondata);
                exit();
				
				
			}
			else
			{
				$jsondata = array();
				$jsondata['status'] = "error";
                $jsondata['message'] = "Las contraseña no son identicas";      
                echo json_encode($jsondata);
                exit();
			}
		    
		}

		function registro()
		{


            $usuario = $this->input->post("user");
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $password2 = $this->input->post("password2");
            $tipo = 1;

            $jsondata = array();
            

            $this->form_validation->set_rules('nusuario', 'usuario', 'required|trim|is_unique[login.usuario]');
            $this->form_validation->set_rules('ncontraseña', 'contraseña', 'required|trim');
            $this->form_validation->set_rules('ncontraseña2', 'contraseña', 'required|trim|matches[ncontraseña]');
            //$this->form_validation->set_rules('ntelefono', 'telefono', 'required');
            $this->form_validation->set_rules('nemail', 'email', 'required|valid_email|is_unique[login.email]');

                
            if($password != $password2)
            {
                $jsondata['status'] = "error";
                $jsondata['message'] = "Las contraseña no son identicas";      
                echo json_encode($jsondata);
                exit();
            }

            

            #$q = $this->db->query('SELECT id FROM login WHERE email = ?',$email);
            #$data = $q->result_array();
            #$id = $data[0]['id'];
            $query = $this->db->get_where('login', array('email' => $email));
            
            if($query->result_array())
            {
                $id = $data[0]['id'];
                $jsondata['status'] = "error";
                $jsondata['message'] = "Email ya se encuentra disponible";      
                echo json_encode($jsondata);
                exit();
            }

            

            $query = $this->db->get_where('login', array('usuario' => $usuario));
            
            if($query->result_array())
            {
                $id = $data[0]['id'];
                $jsondata['status'] = "error";
                $jsondata['message'] = "Usuario ya se encuentra disponible";     
                echo json_encode($jsondata);
                exit();
            }

            

            

			$configGmail = array(
			         'protocol' => 'smtp',
				     'smtp_host' => 'ssl://smtp.gmail.com',
					 'smtp_port' => 465,
					 'smtp_user' => 'alexpinerotfg@gmail.com',
					 'smtp_pass' => '123456a$',
					 'mailtype' => 'html',
					 'charset' => 'utf-8',
					 'newline' => "\r\n",
					 );

			$hash = md5($password);
			$cliente = $this->Gestion_model->insertarUsuario($usuario, $hash, $email, $tipo);

			$q = $this->db->query('SELECT id FROM login WHERE usuario = ?',$usuario);
			$data = $q->result_array();
			$id = $data[0]['id'];                        
			$uidd = base64_encode($id);

			$data = array(

    			'usuario'=> $usuario,
    			'uidd' => $uidd,
    			'password' => $hash,

				);


            

			$body = $this->load->view('confirmacion_email.html',$data,TRUE);


					

			$this->email->initialize($configGmail);
			$this->email->from('alexpinerotfg@gmail.com', 'AlexPiñero');
			$this->email->to($email);
			$this->email->subject('Confirmación de Cuenta');
			$this->email->message($body);
			$this->email->send();

            
            $jsondata['redirect_url'] = base_url('index.php/Gestion/confirmation');                 
            $jsondata['status'] = "success";    
            echo json_encode($jsondata);
            exit();

            


	
		}

        function confirmation()
        {
            $this->load->view('revisarEmail');
        }


		function activacion()
		{
			print("entro en activacion");
			$uidd = $this->input->get('var2');
			$id = base64_decode($uidd);
			$this->db->where('id',$id);
			$date= date("Y-m-d H:i:s");
			$data = array('activacion' => $date,);
   			$this->db->update('login',$data);
   			$this->session->set_flashdata('activacion', 'Ya estas registrado correctamente');
   			redirect('Gestion/inicio');
 			
		}

		function iniciarSesion()
		{
			$this->load->view('inicioSesion');
		}

		function verificarUsuario()
		{


				//$this->form_validation->set_rules('user', 'usuario', 'required');
				//$this->form_validation->set_rules('password', 'contraseña', 'required');

				//if ($this->form_validation->run() == FALSE)
				//{
					//print("entro en validation");
					//redirect('Gestion/inicio#modal');
				//}
				
				
					$email = $this->input->post("email");
			        $password = $this->input->post("password");

					$this->load->model('Login_model');
					$usuario = $this->Login_model->validarUsuario($email, $password);


						
         			if($usuario)
					{
						
						$this->load->model('Login_model');
						$activacion = $this->Login_model->comprobarActivacion($usuario->usuario);
						if($activacion != NULL)
						{
							
							$usuario_data = array(
			               'id' => $usuario->id,
			               'usuario' => $usuario->usuario,
			               'logueado' => TRUE
			            	);
			            	$this->session->set_userdata($usuario_data);
			            	
			            	$jsondata = array();
			            	$jsondata['redirect_url'] = base_url('index.php/Gestion/inicio');
							$jsondata['status'] = "success";			 
				        	echo json_encode($jsondata);
				    		exit();

            				
			            	//$this->load->view('home');
						}
						else
						{
							$jsondata = array();
							$jsondata['status'] = "error";
				        	$jsondata['message'] = "Porfavor confirme su correo para acceder.";
				        	echo json_encode($jsondata);
				    		exit();
						}					
					}
					else
					{
						$jsondata = array();
						$jsondata['status'] = "error";
			        	$jsondata['message'] = "Usuario o contraseña incorrecta";
			        	echo json_encode($jsondata);
			    		exit();
						
						
					}
				
			
		}
		public function logueado() 
		{
		      	if($this->session->userdata('logueado'))
		      	{
			        $data = array();
			        $data['user'] = $this->session->userdata('usuario');
			        $data['active'] = "home";
			        $this->load->view('Head',$data);
					$this->load->view('Home',$data);
					$this->load->view('Footer2',$data);
		      	}
		      	else
		      	{
		         	print("no entro");
      			}
   		}


	}
?>
