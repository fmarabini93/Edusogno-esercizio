<?php
namespace App;

use mysqli;

class AddUsers
{
      protected $conn;
      protected $sql;
      protected $result;

      public function uploadCsv($servername, $username, $password, $dbname) {
            $this->conn = new mysqli($servername, $username, $password, $dbname);

            $this->sql = "LOAD DATA LOCAL INFILE '/home/kidlo/Boolean/Edusogno-esercizio/public/php/utenti.csv' INTO TABLE users
                        FIELDS TERMINATED BY ','
                        OPTIONALLY ENCLOSED BY '\"'
                        LINES TERMINATED BY '\n'
                        IGNORE 1 LINES";

            $this->result = mysqli_query($this->conn, $this->sql);

            if($this->result) {
                  return true;
            } else {
                  return false;
            }
      }
}