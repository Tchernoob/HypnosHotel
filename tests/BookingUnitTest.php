<?php

namespace App\Tests;

use App\Entity\Booking;
use App\Entity\Suit;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use DateTime;

class BookingUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
      
        $booking = new Booking();
        $date= new DateTime();
        $user = new User();
        $suit = new Suit();

        $booking->setStartDateAt($date);
        $booking->setEndDateAt($date);
        $booking->setIsCancelled(true);
        $booking->setSuit($suit);
        $booking->setUser($user);

        $this->assertTrue($booking->getStartDateAt() === $date);
        $this->assertTrue($booking->getEndDateAt() === $date);
        $this->assertTrue($booking->getIsCancelled() === true);
        $this->assertTrue($booking->getSuit() === $suit);
        $this->assertTrue($booking->getUser() === $user);
    }
}
