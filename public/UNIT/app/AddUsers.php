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

            $this->sql = "LOAD DATA LOCAL INFILE '/home/kidlo/Boolean/Edusogno-esercizio/public/php/utenti.csv' IGNORE INTO TABLE users
                        FIELDS TERMINATED BY ','
                        LINES TERMINATED BY '\n'
                        IGNORE 1 LINES
                        (usr_name,usr_surname,usr_email,inbox_email)";

            $this->result = mysqli_query($this->conn, $this->sql);

            if($this->result) {
                  return true;
            } else {
                  return false;
            }
      }
}