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

    public function insertPersonal($data = array()){
        $insert = $this->db->insert_batch('Personal',$data);
        return $insert?true:false;
    }

    public function insertPrecio($data = array()){
        $insert = $this->db->insert('Precio',$data);
        return $insert?true:false;
    }

    public function insertProducto($data = array()){
        $insert = $this->db->insert_batch('Producto',$data);
        return $insert?true:false;
    }
    
}