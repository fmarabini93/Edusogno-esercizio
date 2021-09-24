<?php
use PHPUnit\Framework\TestCase;
use App\AddUsers;

class AddUsersTest extends TestCase
{
      private $server_name = "localhost";
      private $username = "root";
      private $password = "";
      private $db_name = "edu_test";
      private $sql;

      /** @test */
      public function canUploadCsv() {
            $this->sql = new AddUsers;

            $this->assertEquals($this->sql->uploadCsv($this->server_name, $this->username, $this->password, $this->db_name), true);
      }
}