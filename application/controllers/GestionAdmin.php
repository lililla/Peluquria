<?php
	class GestionAdmin extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Gestion_model');
			$this->load->model('Upload_model');
			$this->load->model('File');
			$this->load->library('form_validation');
			$this->load->helper("url");
			$this->load->library('session');
		}

		function Admin()
		{
			$this->output->delete_cache();
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Admin');
		}

		//NOTICIA

		function Noticia()
		{
			$this->output->delete_cache();
			
			if(isset($_POST['visible'])) 
			{
				$id = $this->input->post('visible');
				$this->db->get('Noticia');
				$this->db->select('status');
				$this->db->from('Noticia');
				$this->db->where('id', $id);
				$query = $this->db-> get();
				$status = null;
				foreach ($query->result() as $value) {
					$status = $value->status;
				}
				if($status == '0')
				{
					$this->db->set('status', '1', TRUE);
					$this->db->where('id', $id);
					$this->db->update('Noticia');
				}
				else
				{
					$this->db->set('status', '0', TRUE);
					$this->db->where('id', $id);
					$this->db->update('Noticia');
				}
				

				/*$this->db->set('status', '0', TRUE);
				$this->db->where('id', $id);
				$this->db->update('Noticia'); // gives UPDATE mytable SET field = field+1 WHERE id = 2*/
			}
			

			$query = $this->db->get('Noticia');
			$data['noticia'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Noticia',$data);
		}

		function NuevaNoticia()
		{
			$data['noticia'] = null;
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevaNoticia', $data);
		}

		function UpdateNoticia()
		{
			if(isset($_GET))
			{
				$asunto = $_GET['asunto'];
			}
			$this->db->get('Noticia');
			$this->db->from('Noticia');
			$this->db->where('asunto', $asunto);
			$query = $this->db-> get();
			$data['noticia'] = $query->result();
			foreach ($data['noticia'] as $row) {
				$data['noticia'] = $row;
			}
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/ModificarNoticia',$data);
		}
		
		function EliminarNoticia()
		{

			$id = $this->input->post('id');
			$this->db->delete('Noticia', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Noticia();
			
			
			
		}

		function show_Noticia()
		{

			$data = $this->db->get('Noticia');
			$result = $data->result();
			

			echo json_encode($result);
		}

		function setImageNoticia(){
        $data = array();


        // If file upload form submitted

        if($this->input->post('fileSubmit') && !empty($_FILES['files']['name']))
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
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['imagen'] = $fileData['file_name'];
                    $uploadData[$i]['fecha'] = date("Y-m-d");
                    $uploadData[$i]['asunto'] = $this->input->post('asunto');
                    $uploadData[$i]['informacion'] = $this->input->post('informacion');
                }
            }
            
            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->File->insertNoticia($uploadData);
                
                // Upload status message
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        
        // Get files data from the database
        //$data['files'] = $this->File->getRows();
        
        // Pass the files data to view
        $this->Noticia();
        
    }


    //PERSONAL


    function Personal()
		{
			$this->output->delete_cache();
			
			if(isset($_POST['visible'])) 
			{
				$id = $this->input->post('visible');
				$this->db->get('Personal');
				$this->db->select('estado');
				$this->db->from('Personal');
				$this->db->where('id', $id);
				$query = $this->db-> get();
				$status = null;
				foreach ($query->result() as $value) {
					$status = $value->estado;
				}
				if($status == 0)
				{
					$this->db->set('estado', 1, TRUE);
					$this->db->where('id', $id);
					$this->db->update('Personal');
				}
				else
				{
					$this->db->set('estado', 0, TRUE);
					$this->db->where('id', $id);
					$this->db->update('Personal');
				}
				

				/*$this->db->set('status', '0', TRUE);
				$this->db->where('id', $id);
				$this->db->update('Noticia'); // gives UPDATE mytable SET field = field+1 WHERE id = 2*/
			}
			

			$query = $this->db->get('Personal');
			$data['personal'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Personal',$data);
		}

		function NuevoPersonal()
		{
			$data['personal'] = null;
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevoPersonal', $data);
		}

		function UpdatePersonal()
		{
			if(isset($_GET))
			{
				$asunto = $_GET['nombre'];
			}
			$this->db->get('Personal');
			$this->db->from('Personal');
			$this->db->where('nombre', $asunto);
			$query = $this->db-> get();
			$data['personal'] = $query->result();
			foreach ($data['personal'] as $row) {
				$data['personal'] = $row;
			}
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/ModificarPersonal',$data);
		}
		
		function EliminarPersonal()
		{

			$id = $this->input->post('id');
			$this->db->delete('Personal', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Personal();
			
			
			
		}

		function show_Personal()
		{

			$data = $this->db->get('Personal');
			$result = $data->result();
			

			echo json_encode($result);
		}

		function setImagePersonal(){
        $data = array();


        // If file upload form submitted

        if($this->input->post('fileSubmit') && !empty($_FILES['files']['name']))
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
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['imagen'] = $fileData['file_name'];
                    $uploadData[$i]['nombre'] = $this->input->post('asunto');
                    $uploadData[$i]['informacion'] = $this->input->post('informacion');
                }
            }
            
            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->File->insertPersonal($uploadData);
                
                // Upload status message
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        
        // Get files data from the database
        //$data['files'] = $this->File->getRows();
        
        // Pass the files data to view
        $this->Personal();
        
    }



    //PRECIO


    function Precio()
		{
			$this->output->delete_cache();
			
			if(isset($_POST['visible'])) 
			{
				$id = $this->input->post('visible');
				$this->db->get('Precio');
				$this->db->select('estado');
				$this->db->from('Precio');
				$this->db->where('id', $id);
				$query = $this->db-> get();
				$status = null;
				foreach ($query->result() as $value) {
					$status = $value->estado;
				}
				if($status == 0)
				{
					$this->db->set('estado', 1, TRUE);
					$this->db->where('id', $id);
					$this->db->update('Precio');
				}
				else
				{
					$this->db->set('estado', 0, TRUE);
					$this->db->where('id', $id);
					$this->db->update('Precio');
				}
				

				/*$this->db->set('status', '0', TRUE);
				$this->db->where('id', $id);
				$this->db->update('Noticia'); // gives UPDATE mytable SET field = field+1 WHERE id = 2*/
			}
			

			$query = $this->db->get('Precio');
			$data['precio'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Precio',$data);
		}

		function NuevoPrecio()
		{
			$data['precio'] = null;
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevoPrecio', $data);
		}

		function UpdatePrecio()
		{
			if(isset($_GET))
			{
				$asunto = $_GET['nombre'];
			}
			$this->db->get('Precio');
			$this->db->from('Precio');
			$this->db->where('nombre', $asunto);
			$query = $this->db-> get();
			$data['precio'] = $query->result();
			foreach ($data['precio'] as $row) {
				$data['precio'] = $row;
			}
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/ModificarPrecio',$data);
		}
		
		function EliminarPrecio()
		{

			$id = $this->input->post('id');
			$this->db->delete('Precio', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Precio();
			
			
			
		}

		function show_Precio()
		{

			$data = $this->db->get('Precio');
			$result = $data->result();
			

			echo json_encode($result);
		}

		function setImagePrecio(){
	        $data = array();


	        // If file upload form submitted

	        if($this->input->post('fileSubmit'))
	        {
	     
	          
	            
	            $uploadData['nombre'] = $this->input->post('asunto');
	            $uploadData['precio'] = $this->input->post('precio');
	            $uploadData['informacion'] = $this->input->post('informacion');
	                
	            
	            
	            if(!empty($uploadData)){
	                // Insert files data into the database
	                $insert = $this->File->insertPrecio($uploadData);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	            }
	  
	        		$this->Precio();
	    	}
	    }





	    //PRODCUTO

		function Producto()
		{
			$this->output->delete_cache();
			
			if(isset($_POST['visible'])) 
			{

				$id = $this->input->post('visible');
				$this->db->get('Producto');
				$this->db->select('estado');
				$this->db->from('Producto');
				$this->db->where('id', $id);
				$query = $this->db-> get();
				$status = null;
				foreach ($query->result() as $value) {
					$status = $value->estado;
				}
				if($status == 0)
				{

					$this->db->set('estado', 1, TRUE);
					$this->db->where('id', $id);
					$this->db->update('Producto');
				}
				else
				{
					$this->db->set('estado', 0, TRUE);
					$this->db->where('id', $id);
					$this->db->update('Producto');
				}
				

				/*$this->db->set('status', '0', TRUE);
				$this->db->where('id', $id);
				$this->db->update('Noticia'); // gives UPDATE mytable SET field = field+1 WHERE id = 2*/
			}
			

			$query = $this->db->get('Producto');
			$data['producto'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Producto',$data);
		}

		function NuevoProducto()
		{
			$data['noticia'] = null;
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevoProducto', $data);
		}

		function UpdateProducto()
		{
			if(isset($_GET))
			{
				$asunto = $_GET['asunto'];
			}
			$this->db->get('Producto');
			$this->db->from('Producto');
			$this->db->where('nombre', $asunto);
			$query = $this->db-> get();
			$data['producto'] = $query->result();
			foreach ($data['producto'] as $row) {
				$data['producto'] = $row;
			}
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/ModificarProducto',$data);
		}
		
		function EliminarProducto()
		{

			$id = $this->input->post('id');
			$this->db->delete('Producto', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Noticia();
			
			
			
		}

		function show_Producto()
		{

			$data = $this->db->get('Producto');
			$result = $data->result();
			

			echo json_encode($result);
		}

		function setImageProducto(){
        $data = array();


        // If file upload form submitted

        if($this->input->post('fileSubmit') && !empty($_FILES['files']['name']))
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
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['imagen'] = $fileData['file_name'];
             		$uploadData[$i]['precio'] = $this->input->post('precio');
                    $uploadData[$i]['nombre'] = $this->input->post('asunto');
                }
            }
            
            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->File->insertProducto($uploadData);
                
                // Upload status message
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        
        // Get files data from the database
        //$data['files'] = $this->File->getRows();
        
        // Pass the files data to view
        $this->Producto();
        
    }










































		

		

		
		

		function Estilo()
		{
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Estilo');
		}

		function NuevoEstilo()
		{
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevoEstilo');
		}
		function ListaCita()
		{
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/ListaCita');
		}
		function Horarios()
		{
			$this->load->view('Administrador/Head');
		}
		function Cierres()
		{
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/ListaCierre');
		}
		function NuevoCierre()
		{
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevoCierre');
		}
		function ListaClientes()
		{
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/ListaCliente');
		}
		function Cliente()
		{
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Cliente');
		}
		
		/*function do_upload() 
		{
	        //$this->form_validation->set_rules('titulo', 'titulo', 'required|min_length[5]|max_length[10]|trim|xss_clean');
	        //$this->form_validation->set_message('required', 'El campo no puede ir vacío!');
	        //$this->form_validation->set_message('min_length', 'El campo debe tener al menos %s carácteres');
	        //$this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');
	        //SI EL FORMULARIO PASA LA VALIDACIÓN HACEMOS TODO LO QUE SIGUE
	        if (TRUE) 
	        {
	        //$config['upload_path'] = './uploads/';
	        	$config['upload_path'] = './uploads/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = '2000';
	        $config['max_width'] = '2024';
	        $config['max_height'] = '2008';
	 
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
	        //$this->load->library('upload', $config);
	        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
	        if (!$this->upload->do_upload()) {
	            $error = array('error' => $this->upload->display_errors());
	            $this->load->view('Administrador/NuevaNoticia', $error);
	        } else {
	        //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
	        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
	            $file_info = $this->upload->data();
	            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
	            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
	            $this->_create_thumbnail($file_info['file_name']);
	            $data = array('upload_data' => $this->upload->data());
	            $titulo = $this->input->post('titulo');
	            $imagen = $file_info['file_name'];
	            $subir = $this->Upload_model->subir($titulo,$imagen);      
	            $data['titulo'] = $titulo;
	            $data['imagen'] = $imagen;
	            $this->load->view('imagen_subida_view', $data);
	        }
	        }else{
	        //SI EL FORMULARIO NO SE VÁLIDA LO MOSTRAMOS DE NUEVO CON LOS ERRORES
	            //$this->NuevaNoticia();
	        }
    	}
    //FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'uploads/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='uploads/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }*/



    
		


	}
?>
