<?php
namespace App;

use mysqli;

class Query
{     
      protected $conn;
      protected $sql;
      protected $result;

      public function queryDb($servername, $username, $password, $dbname) {
            $this->conn = new mysqli($servername, $username, $password, $dbname);

            $this->sql = "SELECT * FROM users";

            $this->result = mysqli_query($this->conn, $this->sql);

            return $this->result;
      }
}