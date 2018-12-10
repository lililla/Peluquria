<?php
	class Gestion extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Gestion_model');
			$this->load->library('form_validation');
			$this->load->helper("url");
			$this->load->library('session');
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

			$this->load->view('Head',$data);
			$this->load->view('Home',$data);
			$this->load->view('Footer2',$data);
		}

		function Galeria()
		{
            $data = array();
            $data['user'] = $this->session->userdata('usuario');
            $data['active'] = "galeria";
			$this->load->view('Head',$data);
			$this->load->view('Galeria',$data);
			$this->load->view('Footer2',$data);
		}

		function Producto()
		{
            $data = array();
            $data['user'] = $this->session->userdata('usuario');
            $data['active'] = "producto";
			$this->load->view('Head',$data);
			$this->load->view('Producto',$data);
			$this->load->view('Footer2',$data);
		}
		function Perfil()
		{
            $data = array();
            $data['user'] = $this->session->userdata('usuario');
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
			$this->load->view('HeadCita',$data);
			$this->load->view('calendar',$data);
		    $this->load->view('Footer2',$data);
		}

		function Contacto()
		{
			$data = array();
            $data['user'] = $this->session->userdata('usuario');
            $data['active'] = "contacto";
			$this->load->view('Head',$data);
			$this->load->view('Contacto',$data);
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
			$usuarioCita = 24;
			$email = "hola";
			$explode = explode('|', $slots_booked);

			foreach($explode as $slot) {

				if(strlen($slot) > 0 && $email!= null) 
				{
					if($tipo ==1)
					{
						print($booking_date);
						print($slot);
						print($usuarioCita);
						print($tipo);

						$data = array(
					        'fecha' => $booking_date,
					        'hora' => $slot,
					        'usuario' => $usuarioCita,
					        'id_peluquero' => $tipo
					);

					$this->db->insert('cita', $data);

					}

					if($tipo ==2)
					{
						//Aqui se inserta los datos en la tabla al confirmar la cita

						$stmt = $link->prepare("INSERT INTO cita (fecha, hora2, usuario) VALUES (?, ?, ?)");
						//$stmt = $link->prepare("INSERT INTO bookings (date, start, name) VALUES (?, ?, ?)");  
						$stmt->bind_param('sss', $booking_date, $slot, $usuarioCita);
						$stmt->execute();
					}		
				}
			} // Close foreach

				


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
			$q = $this->db->query('SELECT usuario FROM login WHERE id = ?',$usuarioCita);
			$data = $q->result_array();
			$usuario = $data[0]['usuario']; 
			$this->load->view('Confirmacion',$usuario);
		}

        function prueba2()
        {
            return TRUE;
        }

        public function olvidePassword()
		{
			$email = $this->input->post("email");

			$query = $this->db->get_where('login', array('email' => $email));

			if($query->result_array())
            {
            	$configGmail = array(
			         'protocol' => 'smtp',
				     'smtp_host' => 'ssl://smtp.gmail.com',
					 'smtp_port' => 465,
					 'smtp_user' => 'machavesperez@gmail.com',
					 'smtp_pass' => 'super200R9$',
					 'mailtype' => 'html',
					 'charset' => 'utf-8',
					 'newline' => "\r\n",
					 );


            	$body = $this->load->view('forgot_email.html',$data,TRUE);
				$this->email->initialize($configGmail);
				$this->email->from('machavesperez@gmail.com', 'Miguel');
				$this->email->to($email);
				$this->email->subject('Prueba');
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
			
			$this->load->view('newPassword');
		    
		}

		function newPassword2()
		{
			
			$password = $this->input->post("password");
			$password2 = $this->input->post("password2");

			if($password == $password2)
			{
				$hash = md5($password);
				$this->db->set('password',$hash);
				$this->db->where('id',24);
				$this->db->update('login');
				
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
					 'smtp_user' => 'machavesperez@gmail.com',
					 'smtp_pass' => 'super200R9$',
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
			$this->email->from('machavesperez@gmail.com', 'Miguel');
			$this->email->to($email);
			$this->email->subject('Prueba');
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
			            	$jsondata['redirect_url'] = base_url('index.php/Gestion/logueado');
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
					$this->load->view('Footer',$data);
		      	}
		      	else
		      	{
		         	print("no entro");
      			}
   		}


	}
?>
