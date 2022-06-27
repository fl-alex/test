<?php

class Category
{
        public $db_ob;
        public  $db_connection;
        
        public function __construct()
        {
            include_once './Db_connect.php';
            $this->db_ob = New Db_connect();
            $this->db_connection = $this->db_ob->MakeConnection();

        }
        
        // ==========================================================
        // ============== Get ALL data from table ===================
        // ==========================================================
        
        public function display_rec()
        {
            $query = "SELECT * FROM categories";
            $result = $this->db_connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                   $data[] = $row;
            }
             return $data;// return array to client
            }else{
             echo "No records";
            }
        }
        
        
        public function get_data_for_select()
        {
            $query = "SELECT id, name FROM categories";
            $result = $this->db_connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                   $data[] = $row;
            }
             return $data;// return array to client
            }else{
             echo "No records";
            }
        }
        
        // ==========================================================
        // ============== Adding new data to table ==================
        // ==========================================================
        public function insert_rec()
        {
            $name = $this->db_connection->real_escape_string($_POST['name']);
            $full_name = $this->db_connection->real_escape_string($_POST['full_name']);
            $descript = $this->db_connection->real_escape_string($_POST['descript']);
            
            $query="INSERT INTO categories(name, full_name, descript) "
                    . "VALUES('$name','$full_name','$descript')";
            $sql = $this->db_connection->query($query);
            if ($sql==true) {
                header("Location:v_category.php?msg=insert");//make related ok message
            }else{
                echo "Inserting error!";
            }
        }
        
        // ==========================================================
        // ============== Get data from table by id =================
        // ==========================================================
        public function displyaRecordById($id)
        {
            $query = "SELECT * FROM categories WHERE id = '$id'";
            $result = $this->db_connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
            }else{
            echo "No records";
            }
        }
        
        // ==========================================================
        // ============== Update (edit) current data ================
        // ==========================================================
        
        public function updateRecord($postData)
        {
            $name = $this->db_connection->real_escape_string($_POST['name']);
            $full_name = $this->db_connection->real_escape_string($_POST['full_name']);
            $descript = $this->db_connection->real_escape_string($_POST['descript']);         
            $id = $this->db_connection->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE categories "
                    . "SET name = '$name', full_name = '$full_name', "
                    . "descript = '$descript' WHERE id = '$id'";
            $sql = $this->db_connection->query($query);
            if ($sql==true) {
                header("Location:v_category.php?msg=update");
            }else{
                echo "Updated filed!";
            }
            }
            
        }
        // ==========================================================
        // ============== Delete data by id =========================
        // ==========================================================
        public function deleteRecord($id)
        {
            $query = "DELETE FROM categories WHERE id = '$id'";
            $sql = $this->db_connection->query($query);
        if ($sql==true) {
            header("Location:v_category.php?msg=delete");
        }else{
            echo "Delete error";
            }
        }
    }
    
    