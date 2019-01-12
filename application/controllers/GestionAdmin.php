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

			if(isset($_POST['fileSubmit']) && !empty($_FILES['files']['name']))
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
	            redirect($this->uri->uri_string()); 
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
			
			
			
			
		}

		function show_Noticia()
		{

			$data = $this->db->get('Noticia');
			$result = $data->result();
			

			echo json_encode($result);
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

	            $query = $this->db->get('Personal');
	        $i = 1;
			foreach ($query->result() as $row) 
			{
				$this->db->set('tipo', $i, TRUE);
				$this->db->where('id', $row->id);
				$this->db->update('Personal');
				$i++;
				
			}


	            redirect($this->uri->uri_string()); 
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
	  
	        	redirect($this->uri->uri_string());
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

	        
	    }

	    function Comentario()
		{
			if(isset($_GET))
			{
				$id = $_GET['publicacion'];
			}

			$this->db->get('Comentario');
			$this->db->from('Comentario');
			$this->db->where('id_publicaciones',$id);
			$query = $this->db->get();
			$data['comentario'] = $query->result();
			foreach ($data['comentario'] as $row) {
				$data['comentario'] = $row;
			}
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Comentario',$data);
		}

		function EliminarComentario()
		{

			$id = $this->input->post('id');
			$this->db->delete('Comentario', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Comentario();
			
			
			
		}

		function show_Comentario()
		{

			$id = $this->input->post("id");


			$this->db->get('Comentario');
			$this->db->from('Comentario');
			$this->db->where('id_publicaciones',$id);
			$query = $this->db->get();
			$result = $query->result();
			
			
			

			echo json_encode($result);
		}

		function setComentario(){
	        $data = array();


	        // If file upload form submitted

	        
	    }





	    //REDSOCIAL


	    function RedSocial()
		{
			$this->output->delete_cache();
				

			$query = $this->db->get('Publicaciones');
			$data['precio'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Publicaciones',$data);
		}

		

		
		
		function EliminarRedSocial()
		{

			$id = $this->input->post('id');
			$this->db->delete('Publicaciones', array('id' => $id));
			$this->db->delete('Comentario', array('id_publicaciones' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_RedSocial();
			
			
			
		}

		function show_RedSocial()
		{

			$data = $this->db->get('Publicaciones');
			$result = $data->result();
			

			echo json_encode($result);
		}

		function setImageRedSocial(){
	        $data = array();


	        // If file upload form submitted

	        
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
	             		$uploadData[$i]['stock'] = $this->input->post('stock');
	                    $uploadData[$i]['nombre'] = $this->input->post('asunto');
	                    $uploadData[$i]['valoracion'] = 3;
	                }
	            }
	            
	            if(!empty($uploadData)){
	                // Insert files data into the database
	                $insert = $this->File->insertProducto($uploadData);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	            }
	            redirect($this->uri->uri_string());
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
             		$uploadData[$i]['stock'] = $this->input->post('stock');
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

    //ESTILO

		function Estilo()
		{
			$this->output->delete_cache();
			
			if(isset($_POST['visible'])) 
			{
				$id = $this->input->post('visible');
				$this->db->get('Estilo');
				$this->db->select('estado');
				$this->db->from('Estilo');
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
					$this->db->update('Estilo');
				}
				else
				{
					$this->db->set('estado', 0, TRUE);
					$this->db->where('id', $id);
					$this->db->update('Estilo');
				}
				

				/*$this->db->set('status', '0', TRUE);
				$this->db->where('id', $id);
				$this->db->update('Noticia'); // gives UPDATE mytable SET field = field+1 WHERE id = 2*/
			}

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
	                    $uploadData2[$i]['imagen'] = $fileData['file_name'];
	                    
	                    $uploadData['fecha'] = date("Y-m-d");
	                    $uploadData['asunto'] = $this->input->post('asunto');
	                    $uploadData['descripcion'] = $this->input->post('informacion');
	                    $uploadData['imagen'] = $uploadData2[0]['imagen'];
	                }
	            }
	            
	            if(!empty($uploadData)){
	                // Insert files data into the database
	                $insert = $this->File->insertEstilo($uploadData);
	                $insertId = $this->db->insert_id();
	                for($i = 0; $i < $filesCount; $i++){
	                	$uploadData2[$i]['idEstilo'] = $insertId;
	                }
	                
	                $insert = $this->db->insert_batch('ImagenEstilo',$uploadData2);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	            }
	            redirect($this->uri->uri_string());
	        }

			

			$query = $this->db->get('Estilo');
			$data['estilo'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Estilo',$data);
		}

		function NuevoEstilo()
		{
			$data['estilo'] = null;
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevoEstilo', $data);
		}

		function NuevoEstiloo()
		{
			$data['estilo'] = null;
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevoEstilooo', $data);
		}

		function UpdateEstilo()
		{
			if(isset($_GET))
			{
				$asunto = $_GET['asunto'];
			}
			$this->db->get('Estilo');
			$this->db->from('Estilo');
			$this->db->where('asunto', $asunto);
			$query = $this->db-> get();
			$data['estilo'] = $query->result();
			foreach ($data['estilo'] as $row) {
				$data['estilo'] = $row;
			}
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/ModificarEstilo',$data);
		}
		
		function EliminarEstilo()
		{

			$id = $this->input->post('id');
			$this->db->delete('Estilo', array('id' => $id));
			$this->db->delete('ImagenEstilo', array('idEstilo' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Estilo();
			
			
			
		}

		function show_Estilo()
		{

			$data = $this->db->get('Estilo');
			$result = $data->result();
			

			echo json_encode($result);
		}

		function setImageEstilo(){
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
                    $uploadData2[$i]['imagen'] = $fileData['file_name'];
                    
                    $uploadData['fecha'] = date("Y-m-d");
                    $uploadData['asunto'] = $this->input->post('asunto');
                    $uploadData['descripcion'] = $this->input->post('informacion');
                    
                }
            }
            
            if(!empty($uploadData)){

                // Insert files data into the database
                $insert = $this->File->insertEstilo($uploadData);
                $insertId = $this->db->insert_id();
                for($i = 0; $i < $filesCount; $i++){
                	$uploadData2[$i]['idEstilo'] = $insertId;
                }
                
                $insert = $this->db->insert_batch('ImagenEstilo',$uploadData2);
                
                // Upload status message
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        
        // Get files data from the database
        //$data['files'] = $this->File->getRows();
        
        // Pass the files data to view
        $this->Estilo();
        
    }


    ///CITA

    function Cita()
		{
			$this->output->delete_cache();

			$query = $this->db->get('Cita');
			$data['cita'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Cita',$data);
		}

		function EliminarCita()
		{

			$id = $this->input->post('id');
			$this->db->delete('Cita', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Cita();
			
			
			
		}

		function show_Cita()
		{

			$data = $this->db->get('Cita');

			$result = $data->result();
			

			echo json_encode($result);
		}


	///CONTACTO

		function Contacto()
		{
			$this->output->delete_cache();

			$query = $this->db->get('Contacto');
			$data['contacto'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Contacto',$data);
		}

		function EliminarContacto()
		{

			$id = $this->input->post('id');
			$this->db->delete('Contacto', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Contacto();
			
			
			
		}

		function show_Contacto()
		{

			$data = $this->db->get('Contacto');

			$result = $data->result();
			

			echo json_encode($result);
		}


	///CIERRE

		function Cierre()
		{
			$this->output->delete_cache();

			if($this->input->post('fileSubmit'))
	        {
	        	if($this->input->post('dia1') != "")
	        	{
	        		$uploadData1['fecha'] = $this->input->post('dia1');
	        		$insert = $this->File->insertCierre($uploadData1);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	        	}
	        	if($this->input->post('dia2') != "")
	        	{
	        		$uploadData2['fecha'] = $this->input->post('dia2');
	        		$insert = $this->File->insertCierre($uploadData2);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	        		
	        	}
	        	if($this->input->post('dia3') != "")
	        	{
	        		$uploadData3['fecha'] = $this->input->post('dia3');
	        		$insert = $this->File->insertCierre($uploadData3);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	        	}
	        	if($this->input->post('dia4') != "")
	        	{
	        		$uploadData4['fecha'] = $this->input->post('dia4');
	        		$insert = $this->File->insertCierre($uploadData4);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	        	}
	        	if($this->input->post('dia5') != "")
	        	{
	        		$uploadData5['fecha'] = $this->input->post('dia5');
	        		$insert = $this->File->insertCierre($uploadData5);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	        	}
	        	if($this->input->post('semana') != "")
	        	{
	        		$uploadData6['fecha2'] = $this->input->post('semana');
	        		$insert = $this->File->insertCierre($uploadData6);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	        	}
	        	/*if($this->input->post('mes') != "")
	        	{
	        		$uploadData7['fecha2'] = $this->input->post('mes');
	        		$insert = $this->File->insertCierre($uploadData7);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	        	}*/
	        	redirect($this->uri->uri_string());
	        }
			
			$query = $this->db->get('Cierre');
			$data['cierre'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Cierre',$data);
		}

		function NuevoCierre()
		{
			$data['precio'] = null;
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevoCierre', $data);
		}

		function show_Cierre()
		{

			$data = $this->db->get('Cierre');
			$result = $data->result();
			

			echo json_encode($result);
		}

		function EliminarCierre()
		{

			$id = $this->input->post('id');
			$this->db->delete('Cierre', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Cierre();
	
		}

	///HORARIO

		function Horario()
		{
			$this->output->delete_cache();

			if($this->input->post('fileSubmit'))
	        {

	            $uploadData['tipo'] = $this->input->post('tipo');
	                
	            
	            
	            if(!empty($uploadData)){
	                // Insert files data into the database
	                $insert = $this->File->insertHorario($uploadData);
	                
	                // Upload status message
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('statusMsg',$statusMsg);
	            }
	  
	        	redirect($this->uri->uri_string());
	    	}
			
			$query = $this->db->get('Horario');
			$data['horario'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Horario',$data);
		}

		function NuevoHorario()
		{
			$data['cierre'] = null;
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/NuevoHorario', $data);
		}

		function show_Horario()
		{

			$data = $this->db->get('Horario');
			$result = $data->result();
			

			echo json_encode($result);
		}

		function EliminarHorario()
		{

			$id = $this->input->post('id');
			$this->db->delete('Horario', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Horario();
	
		}


		///CLIENTE

		function Cliente()
		{
			$this->output->delete_cache();

			$query = $this->db->get('login');
			print($query->num_rows());
			$data['login'] = $query->result();
			
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/Cliente',$data);
		}

		function EliminarCliente()
		{

			$id = $this->input->post('id');
			$this->db->delete('Cliente', array('id' => $id));
			
			$jsondata = array();
			$jsondata['status'] = "success";			 
			echo json_encode($jsondata);
			show_Cliente();
			
			
			
		}

		function show_Cliente()
		{

			$data = $this->db->get('login');

			$result = $data->result();
			

			echo json_encode($result);
		}




















		function Horarios()
		{
			$this->load->view('Administrador/Head');
		}
		
		function ListaClientes()
		{
			$this->load->view('Administrador/Head');
			$this->load->view('Administrador/ListaCliente');
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
