<?php

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{     
      /** @test */
      public function canGetName() {
            $user = new User;

            $user->setName('Johnny');

            $this->assertEquals($user->getName(), 'Johnny');
      }

      /** @test */
      public function canGetSurname() {
            $user = new User;

            $user->setSurname('Bianchi');

            $this->assertEquals($user->getSurname(), 'Bianchi');
      }

      /** @test */
      public function canGetFullName() {
            $user = new User;

            $user->setName('Johnny');
            $user->setSurname('Bianchi');

            $this->assertEquals($user->getFullName(), 'Johnny Bianchi');
      }

      /** @test */
      public function canGetEmail() {
            $user = new User;

            $user->setEmail('bianchi@johnny.com');

            $this->assertEquals($user->getEmail(), 'bianchi@johnny.com');
      }

      /** @test */
      public function canGetFullUser() {
            $user = new User;

            $user->setName('Johnny');
            $user->setSurname('Bianchi');
            $user->setEmail('bianchi@johnny.com');

            $this->assertEquals($user->getFullUser(), 'Johnny Bianchi bianchi@johnny.com');
      }

      /** @test */
      public function verifyTrimming() {
            $user = new User;

            $user->setName('      Johnny');
            $user->setSurname('Bianchi      ');

            $this->assertEquals($user->getName(), 'Johnny');
            $this->assertEquals($user->getSurname(), 'Bianchi');
      }
}