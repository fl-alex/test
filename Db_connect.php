<?php

class Db_connect
{

        public  $con;
        
        public function MakeConnection() {
            $cfg = parse_ini_file("config.ini",true);
            $this->con = new mysqli($cfg['database']['server'], 
                    $cfg['database']['user'],
                    $cfg['database']['password'],
                    $cfg['database']['dbname']);
            if(mysqli_connect_error()) {
             trigger_error("Error connection--->" . mysqli_connect_error());
            }else{
            return $this->con;
            }
        }
        
}
    
    