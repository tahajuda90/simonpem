<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MY_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    protected $table = null;
    protected $primary = null;
    protected $order = 'ASC';
            
    function get_all()
    {
        $this->db->order_by($this->primary, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    function get_cond($cond,$arr = false){
        //$cond is array condition
        $this->db->where($cond);
        $this->db->order_by($this->primary, $this->order);
        if ($arr) {
            return $this->db->get($this->table)->result_array();
        } else {
            return $this->db->get($this->table)->result();
        }
    }
    
    function get_by_id($id)
    {
        $this->db->where($this->table.'.'.$this->primary, $id);
        return $this->db->get($this->table)->row();
    }
    
    
    function insert($data,$exist=null)
    {
        //$cond is array condition
        if($exist!=null){
            if($this->count($exist) > 0){
                return false;
            }else{
                return $this->db->insert($this->table, $data);
            }
        }else{
            return $this->db->insert($this->table, $data);
        }        
    }
    
    function insert_id($data,$exist=null){
        
        if($exist!=null){
            if($this->count($exist) > 0){
                return $this->get_cond($exist,true)[0][$this->primary];
            }else{
                $this->db->insert($this->table, $data);
                return $this->db->insert_id();
            }
        }else{
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }       
    }
    
    function update($id, $data)
    {
        $this->db->where($this->primary, $id);
        return $this->db->update($this->table, $data);
    }
    
    function delete($id)
    {
        $this->db->where($this->primary,$id);
        return $this->db->delete($this->table);
    }
    
    function delete_by($cond){
        $this->db->where($cond);
        return $this->db->delete($this->table);
    }
    
    private function count($cond){
        //$cond is array condition
        $this->db->where($cond);
        return $this->db->get($this->table)->num_rows();
    }
    
    function child($table1,$table2,$key){
        $this->db->select($table1.".*,COUNT(".$table2.".".$key.") as child");
        $this->db->join($table2,$table1.'.'.$key.' = '.$table2.'.'.$key,'LEFT');
        $this->db->group_by($table1.'.'.$key);
    }
}
