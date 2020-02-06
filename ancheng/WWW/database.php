<?php
 // header("Content-type:text/html;charset=utf-8");
    class MyDB
    {
        private $db = null;     //
     
        private function getConn()
        {
            if ($this->db === null)
            {
                if (defined('SAE_MYSQL_DB'))//云平台链接 
                {
                    $this->db = new mysqli(SAE_MYSQL_HOST_M,SAE_MYSQL_USER,SAE_MYSQL_PASS, SAE_MYSQL_DB, SAE_MYSQL_PORT)
                                              or die($this->db->error);   //云平台链接
                    $this->db->query("SET NAMES 'utf8'");
                    //echo "<p>SAE_MYSQL_DB</p>";
                }
                else//本地链接
                {
                    $this->db = new mysqli("localhost", "zhku", "123456", "program") or           
                                 die($this->db->error);
                    $this->db->query("SET NAMES 'utf8'");
                }       
            }   
        }
        public function GetData($query) 
        {
            $this->getConn();
            $result = $this->db->query($query) or die ($this->db->error);
            return $result;
        }       
        public function ExecSQL($query) 
        {
            $this->getConn();
            $result = $this->db->query($query) or die ($this->db->error);
            return $result;
        }       
 
         
        public function FreeResult($result)
        {
            $result->free_result();  
        }
        public function __destruct()
        {
            if ($this->db !== null)
            {
                $this->db->close();
                $this->db = null;
            }
        }
         
        public function GetLastInsertId()
        {
            $this->getConn();
            $result = $this->db->insert_id;
            return $result;
        }
         
        public function GetAffectedRows()
        {
            $this->getConn();
            $result = $this->db->affected_rows;
            return $result;
        }
    }
?>