<?php

class Others extends CI_Model {

    function Others() {
        parent::__construct();
    }

    function get_where_limit($tb, $data, $offset, $size = '15') {
        $this->db->select('*');
        $this->db->from($tb);

        $this->db->where($data);


        $this->db->limit($size, $offset);
        $query = $this->db->get();


        if (!$query) {
            $msg = $this->db->_error_message();

            $data['result'] = $msg;

            echo '<pre>';
            print_r($data);
            exit;
        } else {
            return $query->result_array();
        }
    }
   function all_easy() {
        $sql = "SELECT
   easy.*,
  easy_company.name AS company_name,
  clients.name AS client_name
FROM
  `easy`,
  easy_company,
  clients
WHERE
  easy.company_id = easy_company.id AND easy.civil_id = clients.civil_id";


        $query = $this->db->query($sql);

        return $query->result_array();
    }
function status_easy($status) {
        $sql = "SELECT
   easy.*,
  easy_company.name AS company_name,
  clients.name AS client_name, easy_broker.name as broker_name
FROM
  `easy`,
  easy_company,
  clients, easy_broker
WHERE
  easy.company_id = easy_company.id AND easy.civil_id = clients.civil_id
  and  easy_broker.id = easy.broker_id
  and  easy.status='$status'";


        $query = $this->db->query($sql);

        return $query->result_array();
    }
    function status_easy_company($company_id) {
        $sql = "SELECT
   easy.*,
  easy_company.name AS company_name,
  clients.name AS client_name, easy_broker.name as broker_name
FROM
  `easy`,
  easy_company,
  clients, easy_broker
WHERE
  easy.company_id = easy_company.id AND easy.civil_id = clients.civil_id
  and  easy_broker.id = easy.broker_id
  and  easy.company_id='$company_id'";


        $query = $this->db->query($sql);

        return $query->result_array();
    }
    
    
    
    function one_easy($id) {
        $sql = "SELECT
   easy.*,
  easy_company.name AS company_name,
  clients.name AS client_name, easy_broker.name as broker_name , clients.gender ,clients.nationality, clients.id AS client_id 
FROM
  `easy`,
  easy_company,
  clients, easy_broker
WHERE
  easy.company_id = easy_company.id AND easy.civil_id = clients.civil_id
  and  easy_broker.id = easy.broker_id
  and  easy.id='$id'";


        $query = $this->db->query($sql);

        return $query->row_array();
    }
    
    function update_tb($tb, $id, $data) {
        $this->db->where('id', $id);

        $result = $this->db->update($tb, $data);

        $report = mysql_affected_rows();

        return $report;
    }

    function get_where($tb, $data) {
        $this->db->select('*');
        $this->db->from($tb);

        $this->db->where($data);

        $query = $this->db->get();


        if (!$query) {
            $msg = $this->db->_error_message();

            $data['result'] = $msg;

            echo '<pre>';
            print_r($data);
            exit;
        } else {
            return $query->result_array();
        }
    }
     
   function all_products( ) {
        $sql = "SELECT
  products.*,
  company.name AS company_name,
  marks.name AS mark_name,
  classes.name AS class_name
FROM
  products,
  classes,
  marks,
  company
WHERE
  products.company_id = company.id AND products.mark = marks.id AND products.class = classes.id";


        $query = $this->db->query($sql);

        return $query->result_array();
    }
     
   function print_all_products($id ) {
        $sql = "SELECT
  products.*,
  company.name AS company_name,
  marks.name AS mark_name,
  classes.name AS class_name
FROM
  products,
  classes,
  marks,
  company
WHERE
  products.company_id = company.id AND products.mark = marks.id 
  AND products.class = classes.id and company.id=$id order by class_name desc";


        $query = $this->db->query($sql);

        return $query->result_array();
    }
    
   function print_all_products_active($id ) {
        $sql = "SELECT
  products.*,
  company.name AS company_name,
  marks.name AS mark_name,
  classes.name AS class_name
FROM
  products,
  classes,
  marks,
  company
WHERE
  products.company_id = company.id AND products.mark = marks.id 
  AND products.class = classes.id and products.active=1  and company.id=$id order by class_name desc";


        $query = $this->db->query($sql);

        return $query->result_array();
    } 
   function one_product($id ) {
        $sql = "SELECT
  products.*,
  company.name AS company_name,
  marks.name AS mark_name, marks.img_dir AS mark_img,
  classes.name AS class_name
FROM
  products,
  classes,
  marks,
  company
WHERE
  products.company_id = company.id AND products.mark = marks.id AND products.class = classes.id and products.id = $id";


        $query = $this->db->query($sql);

        return $query->row_array();
    }
    
    
  function ative_products( ) {
        $sql = "SELECT
  products.*,
  company.name AS company_name,
  marks.name AS mark_name,
  classes.name AS class_name
FROM
  products,
  classes,
  marks,
  company
WHERE
  products.company_id = company.id AND products.mark = marks.id AND products.class = classes.id and products.active=1";


        $query = $this->db->query($sql);

        return $query->result_array();
    }
  
    
      function search_products($cond ) {
        $sql = "SELECT
  products.*,
  company.name AS company_name,
  marks.name AS mark_name,
  classes.name AS class_name
FROM
  products,
  classes,
  marks,
  company
WHERE
  products.company_id = company.id AND products.mark = marks.id AND products.class = classes.id  $cond";


        $query = $this->db->query($sql);

        return $query->result_array();
    }
  
    
}

?>
