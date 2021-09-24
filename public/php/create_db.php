<?php

$server_name = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($server_name, $username, $password); 

if ($conn->connect_error) {
      die("<h1>Connection failed: </h1>" . $conn->connect_error);
}

$sql = "CREATE DATABASE edu_test";
if ($conn->query($sql) === FALSE) {
      echo "<h1>Error creating database: </h1>" . $conn->error;
}

$db_name = 'edu_test';
$conn = new mysqli($server_name, $username, $password, $db_name);

$table1 = "CREATE TABLE events (
      id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      event_name VARCHAR(100) NOT NULL,
      event_description VARCHAR(255) NOT NULL,
      event_date DATE,
      event_hour TIME,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
      
      if ($conn->query($table1) === FALSE) {
            echo "<h1>Error creating table: </h1>" . $conn->error; 
      }

$table2 = "CREATE TABLE users (
      id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      usr_name VARCHAR(50) NOT NULL,
      usr_surname VARCHAR(100) NOT NULL,
      usr_email VARCHAR(255) NOT NULL,
      inbox_email VARCHAR(255) NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
      
      if ($conn->query($table2) === FALSE) {
            echo "<h1>Error creating table: </h1>" . $conn->error;
      }

$upload_csv = "LOAD DATA LOCAL INFILE '/home/kidlo/Boolean/Edusogno-esercizio/public/php/utenti.csv' INTO TABLE users
            FIELDS TERMINATED BY ','
            OPTIONALLY ENCLOSED BY '\"'
            LINES TERMINATED BY '\n'
            IGNORE 1 LINES
            (usr_name,usr_surname,usr_email,inbox_email)";

$upload_users = mysqli_query($conn, $upload_csv);