<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File extends CI_Model{
    function __construct() {
        $this->tableName = 'Noticia';
    }
    
    /*
     * Fetch files data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = ''){
        $this->db->select('id,file_name,uploaded_on');
        $this->db->from('files');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('uploaded_on','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    public function insertNoticia($data = array()){
        $insert = $this->db->insert_batch('Noticia',$data);
        return $insert?true:false;
    }

    public function insertPublicacion($data = array()){
        $insert = $this->db->insert_batch('Publicaciones',$data);
        return $insert?true:false;
    }

    public function insertPublicacion3($data = array()){
        $insert = $this->db->insert('Publicaciones',$data);
        return $insert?true:false;
    }

    public function insertPublicacion0($data = array()){
        $insert = $this->db->insert('Comentario',$data);
        return $insert?true:false;
    }

    public function insertContacto($data = array()){
        $insert = $this->db->insert('Contacto',$data);
        return $insert?true:false;
    }

    public function insertPersonal($data = array()){
        $insert = $this->db->insert_batch('Personal',$data);
        return $insert?true:false;
    }

    public function insertPrecio($data = array()){
        $insert = $this->db->insert('Precio',$data);
        return $insert?true:false;
    }

    public function insertHorario($data = array()){
        $insert = $this->db->insert('Horario',$data);
        return $insert?true:false;
    }

    public function insertCierre($data = array()){
        $insert = $this->db->insert('Cierre',$data);
        return $insert?true:false;
    }

    public function insertProducto($data = array()){
        $insert = $this->db->insert_batch('Producto',$data);
        return $insert?true:false;
    }

    public function insertEstilo($data = array(), $data2 = array()){
        $insert = $this->db->insert('Estilo',$data);
        $insertId = $this->db->insert_id();
        
        //$data2['idEstilo'] = $insertId;
        //$insert = $this->db->insert_batch('ImagenEstilo',$data2);
        return $insert?true:false;
    }

    
}