<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Administrator;
use App\Entity\Manager;
use App\Entity\Hotel;
use App\Entity\Suit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    // ...
    public function load(ObjectManager $manager)
    {
        // Créatiuon d'un User - client
        $user = new User();

        $user->setEmail('tpichon@hypnos.com')
             ->setFirstName('Theo')
             ->setLastName('Pichon');

        $password = $this->hasher->hashPassword($user, 'password');
        $user->setPassword($password);
             
        $manager->persist($user);

        $manager->flush();
    

    // Création d'un Administrateur 
    $adminHypnos = new Administrator();

    $adminHypnos->setEmail('theo.pichon.admin@gmail.com')
          ->setFirstName('John')
          ->setLastname('Hypnos');
        
        $password = $this->hasher->hashPassword($adminHypnos, 'passwordAdmin');
        $adminHypnos->setPassword($password);
        
        $manager->persist($adminHypnos);

        $manager->flush();

    // Création d'un Hotel
        $hotel = new Hotel();

        $hotel->setName('Hypton')
              ->setCity('Marrakech')
              ->setAdress('5 rue de la Koutoubia')
              ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Ut feugiat risus at quam posuere, semper venenatis diam condimentum. 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
              ->SetHomeImage('/img/hypton-home-img.jpeg');

        $manager->persist($hotel);

        $manager->flush();

   // Création d'un Gérant associé à l'Hotel
    $hotelManager = new Manager();

    $hotelManager->setEmail('theo.pichon.admin@gmail.com')
                  ->setFirstName('John')
                  ->setLastname('Hypnos')
                  ->setHotel($hotel);

        $password = $this->hasher->hashPassword($hotelManager, 'passwordAdmin');
        $hotelManager->setPassword($password);
    
        $manager->persist($hotelManager);

        $manager->flush();
        
        
    // Création d'une suite associée à l'Hotel
    $suit = new Suit();

    $suit->setName('Penthouse')
         ->setRooms(8)
         ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
         Ut feugiat risus at quam posuere, semper venenatis diam condimentum. 
         Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
         ->setPrice(800)
         ->setHomeImage('/img/hypton-home-img.jpeg')
         ->setSecondImage('/img/hypnos-penthouse-suite-02.jpg')
         ->setThirdImage('/img/hypnos-penthouse-suite-03.jpg')
         ->setHotel($hotel);
        
         $manager->persist($suit);

         $manager->flush();
    }
}
