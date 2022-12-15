<?php

class Db_get extends CI_Model
{
    function Db_get()
    {
        parent::__construct();
        
    }
    function get_all($tb)
    {
        $this->db->order_by('id desc');
        
        $query=  $this->db->get($tb);
         
        return $query->result_array();
    }
     function get_all_asc($tb)
    {
        $this->db->order_by('id asc');
        
        $query=  $this->db->get($tb);
         
        return $query->result_array();
    }
    function get_all_paging($tb,$col,$offset,$size='15')
    {
        $this->db->order_by("$col desc ");
        $this->db->limit($size,$offset);
        $query=  $this->db->get($tb);
         
        return $query->result_array();
    }
    
    function get_all_where_pagingxx( )
    {
         $this->db->order_by("$col desc ");
         $this->db->where($data_where);
         $this->db->limit($size,$offset);
        $query=  $this->db->get($tb);
         
        return $query->result_array();
    }
    
    function get_all_where_paging($tb,$col,$data_where,$offset,$size='15')
    {
         $this->db->order_by("$col desc ");
         $this->db->where($data_where);
         $this->db->limit($size,$offset);
        $query=  $this->db->get($tb);
         
        return $query->result_array();
    }
    
    function add_tb($tb,$data)
    {
        
         if($this->db->insert($tb,$data))
         {
             return TRUE;
         }
         else{
             return FALSE;
         }
    }
    
    function add_and_get_last_id($tb, $data) {
        $this->db->insert($tb, $data);

        $report = $this->db->insert_id() ;

       
        return $report;
    }
    
    function get_by_id($tb,$id)
    {
        $this->db->select('*');
         $this->db->from($tb);
         $this->db->where('id',$id);
         $query=  $this->db->get();
         return $query->row_array();
    }
    function get_field($tb)
{
$query = $this->db->list_fields($tb);
 $counter= count($query);
          return $counter;
}
    function get_count_tb($tb)
    {
         $this->db->select('count( * ) as counter');
         $this->db->from($tb);
         $query=  $this->db->get();
         $counter= $query->row_array();
         return $counter['counter'];
    }
    
    function get_count_tb_where($tb,$data)
    {
         $this->db->select('count( * ) as counter');
         $this->db->where($data);
         $this->db->from($tb);
         $query=  $this->db->get();
         $counter= $query->row_array();
         return $counter['counter'];
    }
    
     function update_tb($tb,$id,$data)
    {
         $this->db->where('id',$id);
         $result=$this->db->update($tb,$data);
         if(count($result)>0)
         {
             return TRUE;
         }
         else{
             return FALSE;
         }
    }
      function update_where($tb,$col,$id,$data)
    {
         $this->db->where($col,$id);
         $result=$this->db->update($tb,$data);
         if(count($result)>0)
         {
             return TRUE;
         }
         else{
             return FALSE;
         }
    }
     function update_where_cond($tb, $data,$where)
    {
         $this->db->where($where);
         $result=$this->db->update($tb,$data);
         if(count($result)>0)
         {
             return TRUE;
         }
         else{
             return FALSE;
         }
    }
    function get_where($tb,$col,$val)
    {
        $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($col,$val);
         $this->db->order_by('id','desc');
         $query=  $this->db->get();
         return $query->result_array();
    }
    
    function get_where_conditions($tb,$where)
    {
        $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($where);
         $this->db->order_by('id','desc');
         $query=  $this->db->get();
         return $query->result_array();
    }
    function get_where_conditions_r($tb,$where)
    {
        $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($where);
          
         $query=  $this->db->get();
         return $query->row_array();
    }
    
    
    function get_conditions($tb,$where)
    {
        $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($where);
          
         $query=  $this->db->get();
         return $query->result_array();
    }
    
    function get_conditions_order_by($tb,$where,$order_by_col,$order_by_val)
    {
         $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($where);
         $this->db->order_by($order_by_col,$order_by_val);  
         $query=  $this->db->get();
         return $query->result_array();
    }
    
    
    function get_conditions_counter($tb,$where)
    {
        $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($where);
          
         
         $query=  $this->db->get();
         $counter= count($query->result_array());
     
         return $counter;
    }
     function get_conditions_limit($tb,$where,$limit)
    {
            $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($where);
         $this->db->order_by('id','desc');
          $this->db->limit($limit);
         $query=  $this->db->get();
         return $query->result_array();
          
    }
    
    function get_where_2_col($tb,$col1,$val1,$col2,$val2)
    {
         $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($col1,$val1);
         $this->db->where($col2,$val2);
         $query=  $this->db->get();
         return $query->result_array();
    }
     function delete_by_id($tb,$id)
    {
         $this->db->where('id',$id);
         $result=$this->db->delete($tb);
         if(count($result)>0)
         {
             return TRUE;
         }
         else{
             return FALSE;
         }
    }
     function delete_by_col($tb,$col,$val)
    {
         $this->db->where($col,$val);
         $result=$this->db->delete($tb);
         if(count($result)>0)
         {
             return TRUE;
         }
         else{
             return FALSE;
         }
    }
    
     function active_col($tb,$col,$val,$id)
    {
        $sql="update $tb set $col = $val where id= $id";
       // echo $sql;exit;
       
        $this->db->query($sql);
 
    }
    
     function increase_decrease($tb,$operation,$col,$val,$id)
    {
        $sql="UPDATE `$tb` SET $col = $col $operation $val WHERE id=$id;  ";
        $this->db->query($sql);
      // echo $sql;exit;
         
    }
    
    
     function increase_decrease_slug($tb,$col,$operation,$val,$col2,$val2)
    {
        $sql="UPDATE `$tb` SET $col = $col $operation $val WHERE  $col2='$val2' ";
        $this->db->query($sql);
      // echo $sql;exit;
         
    }
    
    function get_last_id($tb)
    {
         $this->db->select('*');
         $this->db->from($tb);
         $this->db->order_by('id','desc');
         $this->db->limit('1');
         $query=  $this->db->get();
         return $query->row_array();
    }
    
    function get_all_order_by($tb,$col,$type)
    {
        $this->db->order_by("$col $type");
        
        $query=  $this->db->get($tb);
         
        return $query->result_array();
    }
     function get_where_r($tb,$col,$val)
    {
        $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($col,$val);
         $query=  $this->db->get();
         return $query->row_array();
    }
   
    
    
    function search($tb,$where)
    {
        $this->db->select('*');
         $this->db->from($tb);
         $this->db->where($where); 
         $query=  $this->db->get();
         return $query->result_array();
    }
}
?>
