<?php

class Articles
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
            $query = "SELECT a.id, a.titul, a.opis, a.status, c.name as category, 
                        a.body 
                        FROM `articles` as a, `categories` as c	 
                        WHERE a.category = c.id";
            
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
        // ============== Adding new data to table==================
        // ==========================================================
        public function insert_rec()
        {
            $titul = $this->db_connection->real_escape_string($_POST['titul']);
            $status = $this->db_connection->real_escape_string($_POST['status']);
            $category = $this->db_connection->real_escape_string($_POST['category']);
            $opis = $this->db_connection->real_escape_string($_POST['opis']);
            $body = $this->db_connection->real_escape_string($_POST['body']);
            $query="INSERT INTO articles(titul, opis, status, category, body) "
                    . "VALUES('$titul','$opis',$status,$category, '$body')";
            $sql = $this->db_connection->query($query);
            if ($sql==true) {
                header("Location:index.php?msg=insert");//make related ok message
            }else{
                echo "Inserting error!";
            }
        }
        
        // ==========================================================
        // ============== Get data from table by id =================
        // ==========================================================
        public function displyaRecordById($id)
        {
            $query = "SELECT * FROM articles WHERE id = '$id'";
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
            $titul = $this->db_connection->real_escape_string($_POST['titul']);
            $opis = $this->db_connection->real_escape_string($_POST['opis']);
            $status = $this->db_connection->real_escape_string($_POST['status']);
            $category = $this->db_connection->real_escape_string($_POST['category']);
            $body = $this->db_connection->real_escape_string($_POST['body']);
            $id = $this->db_connection->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE articles "
                    . "SET titul = '$titul', opis = '$opis', status = '$status', "
                    . "category ='$category', body = '$body' "
                    . "WHERE id = '$id'";
            $sql = $this->db_connection->query($query);
            if ($sql==true) {
                header("Location:index.php?msg=update");
            }else{
                echo "Update error!";
            }
            }
            
        }
        // ==========================================================
        // ============== Delete data by id =========================
        // ==========================================================
        public function deleteRecord($id)
        {
            $query = "DELETE FROM articles WHERE id = '$id'";
            $sql = $this->db_connection->query($query);
        if ($sql==true) {
            header("Location:index.php?msg=delete");
        }else{
            echo "Delete error";
            }
        }
    }
    
    