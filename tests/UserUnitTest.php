<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail('true@test.com')
             ->setFirstName('Theo')
             ->setLastName('Pichon')
             ->setPassword('1230123456');
             
        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getFirstName() === 'Theo');
        $this->assertTrue($user->getLastName() === 'Pichon');
        $this->assertTrue($user->getPassword() === '1230123456');
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('true@test.com')
             ->setFirstName('Theo')
             ->setLastName('Pichon')
             ->setPassword('1230123456');

        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getFirstName() === 'false');
        $this->assertFalse($user->getLastName() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
    }
}
