<?php
	
	class Gestion_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function insertarUsuario($usuario, $contraseña, $email, $tipo)
		{
			$data = array ( 
				'usuario' => $usuario,
				'password' => $contraseña,
				'email' => $email,
				'tipo' => '1'
				);

				$this->db->insert('login', $data);
		}
	}
?>