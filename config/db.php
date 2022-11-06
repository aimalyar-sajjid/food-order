<?php 
    class db
    {
        // CONNECTION PROPERTIES
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $db_name = "food_order";

        // OTHER PROPERTIES
        public $mysql = "";
        private $conn = false;
        private $result = array();

        // CONSTRUCTOR FUNCTION, CONNECTION
        public function __construct()
        {
           $this->mysql = new mysqli($this->host, $this->user, $this->password, $this->db_name);

           if($this->mysql->connect_error)
           {
               die("Connection Faild " . $this->mysql->connect_error);
           }

           $this->conn = true;
        }

        
        // INSERSTION FUNCTION
        public function insert($table, $params = array())
        {
            if($this->tableExist($table))
            {
                $columns = implode(",", array_keys($params));
                $values = implode("','", $params);
                $sql = "INSERT INTO $table($columns)VALUES('$values')";
    
                
                if($this->mysql->query($sql))
                {
                    return 1;
                }else
                {
                    return 0;
                }
            }else
            {
                return false;
            }

        }

        // UPDATE FUNCTION
        public function update($table, $params = array(), $where=null)
        {
            if($this->tableExist($table))
            {
                $args= array();
                foreach($params as $key => $value)
                {
                    $args[] = "$key =  '$value'";
                }

                $sql = "UPDATE $table SET " . implode(", ", $args);

                if($where != null)
                {
                    $sql .= " WHERE $where";
                }
            if($this->mysql->query($sql))
            {
                return 1;
            }else
            {
                return 0;
            }

            }else
            {
                return false;
            }
        }

        // DELETE FUNCTION
        public function delete($table, $where = null)
        {
           if($this->tableExist($table))
           {
            $sql = "DELETE FROM {$table}";

            if($where != null)
            {
                $sql .= " WHERE $where";
            }

            if($this->mysql->query($sql))
            {
                return 1;
            }else
            {
                return 0;
            }
           }
        }

        // SELECT FUNCTION
        public function select($query)
        {
            $sql = " $query ";
            $result = $this->mysql->query($sql);

            if($result)
            {
                return $result->fetch_all(MYSQLI_ASSOC);
            }else
            {
                return 0;
            }
        }


        // CHECK FOR TABLE
        private function tableExist($table)
        {
            $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
            $result = $this->mysql->query($sql);

            if($result->num_rows == 1)
            {
                return true;
            }else
            {
                return false;
            }
        }


        public function __destruct()
        {
            if($this->conn)
            {
                $this->mysql->close();
                $this->conn = false;
                return true;
            }else
            {
                return false;
            }
        }
    } 
?>