<?php  
	class Login_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function validarUsuario($usuario, $contraseña)
		{
			//$q = $this->db->query('SELECT password FROM login WHERE usuario = ?',$usuario);
			//$data = $q->result_array();
			//$password = $data[0]['password'];
			$this->db->select('id, usuario');
      		$this->db->from('login');
      		$this->db->where('usuario', $usuario);
      		$password = md5($contraseña);
      		$this->db->where('password', $password);
      		$consulta = $this->db->get();
      		$resultado = $consulta->row();
      		return $resultado;
      		/*
			if($password === md5($contraseña))
			{
				return true;
			}
			else
			{
				return false;
			}
			

			$instruccion = $this->db->get('login');

			return $instruccion->row();
			*/
		}


		function comprobarTipo($usuario)
		{
			$instruccion = $this->db->where('usuario', $usuario);
			$instruccion = $this->db->get('login');

			foreach ($instruccion->result() as $row)
				return $row->tipo;
		}
		public function comprobarActivacion($usuario)
		{
			$q = $this->db->query('SELECT activacion FROM login WHERE usuario = ?',$usuario);
			$data = $q->result_array();
			$activacion = $data[0]['activacion'];
			return $activacion;
		}

		public function verifica_username($username) 
		{
        	$this->db->where('username',$username);
        	$consulta = $this->db->get('users');
 			if($consulta->num_rows() == 1)
 			{
         		//$row = $consulta->row();
         		return True;
 			}
 			else
 				return False;
    	}
	}
?>